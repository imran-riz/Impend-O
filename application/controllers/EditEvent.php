<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditEvent extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->eventID = $this->input->get("id");

        if ($this->session->has_userdata("Email")) {
            $data = array("Email" => null);
            if ($this->session->has_userdata("Email")) {
                $data["Email"] = $this->session->userdata("Email");
            }

            $this->Data["NavBar"] = $this->load->view("components/nav-bar", $data, true);
            $this->Data["Footer"] = $this->load->view("components/page-footer", array("Fixed" => false), true);
            
            $event = $this->loadEventDetails();
            
            if (empty($event)) {
                $this->NotFound = true;
            }
            else {
                $this->NotFound = false;

                $event = $event[0];
                
                $this->Data["Id"] = $this->eventID;
                $this->Data["Title"] = $event["eTitle"];
                $this->Data["Date"] = $event["eDate"];
                $this->Data["Venue"] = $event["eVenue"] == "ONLINE" ? "" : $event["eVenue"];
                $this->Data["Description"] = $event["eDescription"];
                $this->Data["Filename"] = $event["eFilename"];
                $this->Data["Error"] = "";
    
                $this->Data["ChangeImg"] = 'false';
            }
        }
        else {
            redirect("SignIn");
        }
    }    

	public function index() {
        if ($this->NotFound) {
            $data = array(
                        "heading" => "Page Not Found",
                        "message" => "The event chosen to edit was not found!");

            $this->load->view("errors/cli/error_404", $data);
        }
        else {
            $this->load->view("edit-event-page", $this->Data);
        }
	}

    public function saveEdits() {
        $this->Data["Title"] = $this->input->post("inputTitle");
        $this->Data["Date"] = $this->input->post("inputDate");
        $this->Data["Venue"] = $this->input->post("inputVenue");
        $this->Data["Description"] = $this->input->post("txtDescription");
        $imgStatus = $this->input->post("inputImgStatus");

        $eID = $this->eventID;
        $eTitle = $this->Data["Title"] ;
        $eDate = $this->Data["Date"] ;
        $eVenue = empty(trim($this->Data["Venue"])) ? "ONLINE" : trim($this->Data["Venue"]) ;
        $eDescription = $this->Data["Description"] ;

        $succeeded = false;

        $this->load->library("MyLib");
        
        
        if (!empty($_FILES["inputImg"]["name"])) {          // if the user has uploaded an image file
            $validationErr = $this->mylib->validImageFile();
            
            if ($validationErr == "") {    
                if ($imgStatus == "REMOVE") {         
                    $this->mylib->deletePoster($this->Data['Filename']);        // delete the existing poster in the uploads folder
                }

                $uploadImgErr = $this->mylib->uploadImage($eID);

                if ($uploadImgErr == "") {
                    $eFilename = $_FILES["inputImg"]["name"] ;

                    $sqlQuery = "UPDATE tblEvents SET 
                                 eTitle = '$eTitle', 
                                 eDate = '$eDate', 
                                 eDescription = '$eDescription',
                                 eVenue = '$eVenue',
                                 eFilename = '$eFilename'
                                 WHERE eID = '$eID'";                    
                    
                    $_FILES["inputImg"]["name"] = null;

                    if ($this->db->query($sqlQuery)) {
                        $succeeded = true;                        
                    }
                    else {
                        $this->Data["Error"] = "ERROR: failed to save edits -> " . $this->db->error_string();
                    }
                }
                else {
                    $this->Data["Error"] = $uploadImgErr;
                }
            }
            else {
                $this->Data["Error"] = $validationErr;
            }
        }
        else {
            $sqlQuery = "UPDATE tblEvents SET 
                         eTitle = '$eTitle', 
                         eDate = '$eDate', 
                         eDescription = '$eDescription',
                         eVenue = '$eVenue'
                         WHERE eID = '$eID'";

            if ($this->db->query($sqlQuery)) {
                $succeeded = true;

                if ($imgStatus == "REMOVE") {
                    $this->mylib->deletePoster($this->Data['Filename']);

                    $sqlQuery = "UPDATE tblEvents SET
                                 eFilename = NULL
                                 WHERE eID = '$eID'";

                    $this->db->query($sqlQuery);
                }
            }
            else {
                $this->Data["Error"] = "ERROR: failed to update event -> " . $this->db->error_string();
            }
        }        

        if ($succeeded) {
            $this->Data["Error"] = "SUCCESS";
        }        

        $this->load->view("edit-event-page", $this->Data);
    }


    public function deletePoster() {
        $eID = $this->input->post('eID');

        $sqlQuery = "UPDATE tblEvents SET eFilename = NULL WHERE eID = '$eID'";
        
        $response = "";

		if (!$this->db->query($sqlQuery)) {
			$response = "ERROR -> " . $this->db->error();
		}

		echo $response ;
    }


    private function loadEventDetails() {
        $sqlQuery = "SELECT * FROM tblEvents WHERE eID = '$this->eventID'";

        return $this->db->query($sqlQuery)->result_array();
    }
}
