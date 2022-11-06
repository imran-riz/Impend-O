<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostEvent extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $data = array("Email" => null);
        if ($this->session->has_userdata("Email")) {
            $data["Email"] = $this->session->userdata("Email");            
            $this->Data["NavBar"] = $this->load->view("components/nav-bar", $data, true);

            $this->Data["Footer"] = $this->load->view("components/page-footer", array("Fixed" => false), true);
            
            $this->Data["Title"] = "";
            $this->Data["Date"] = "";
            $this->Data["Venue"] = "";
            $this->Data["Description"] = "";
            $this->Data["ImageFile"] = "";
            $this->Data["ImageError"] = " ";
            $this->Data["Error"] = "";
        }
        else {
            redirect("Explore");
        }
    }    

	public function index() {
		$this->load->view("post-event-page", $this->Data);
	}

    public function postEvent() {
        $this->Data["Title"] = $this->input->post("inputTitle");
        $this->Data["Date"] = $this->input->post("inputDate");
        $this->Data["Venue"] = $this->input->post("inputVenue");
        $this->Data["Description"] = $this->input->post("txtDescription");

        $eID = $this->getEventID();
        $eEmail = $this->session->userdata("Email");
        $ePostedOn = date("Y-m-d");
        $eTitle = $this->Data["Title"] ;
        $eDate = $this->Data["Date"] ;
        $eVenue = empty(trim($this->Data["Venue"])) ? "ONLINE" : trim($this->Data["Venue"]) ;
        $eDescription = $this->Data["Description"] ;

        $succeeded = false;

        if (!empty($_FILES["inputImg"]["name"])) {         // if the user has uploaded an image file
            $this->load->library("MyLib");

            $validationErr = $this->mylib->validImageFile();

            if ($validationErr == "") {
                $uploadImgErr = $this->mylib->uploadImage($eID);

                if ($uploadImgErr == "") {
                    $eFilename = $_FILES["inputImg"]["name"];

                    $sqlQuery = "INSERT INTO tblEvents (eID, eEmail, ePostedOn, eTitle, eDate, eVenue, eDescription, eFilename) VALUES
                                ('$eID', '$eEmail', '$ePostedOn', '$eTitle', '$eDate', '$eVenue', '$eDescription', '$eFilename')";

                    if ($this->db->query($sqlQuery)) {
                        $succeeded = true;                        
                    }
                    else {
                        $msg = "Failed to add event to database -> " . $this->db->error_string();
                        $this->Data["Error"] = $msg;
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
            $sqlQuery = "INSERT INTO tblEvents (eID, eEmail, ePostedOn, eTitle, eDate, eVenue, eDescription) VALUES
                         ('$eID', '$eEmail', '$ePostedOn', '$eTitle', '$eDate', '$eVenue', '$eDescription')";

            if ($this->db->query($sqlQuery)) {
                $succeeded = true;
            }
            else {
                $msg = "ERROR: failed to add event to database -> " . $this->db->error_string();
                $this->Data["Error"] = $msg;
            }
        }

        if ($succeeded) {
            $this->Data["Error"] = "SUCCESS";
        }


        $this->load->view("post-event-page", $this->Data);
    }

    // format for id: 8 characters, with 3 letter and 4 digits
    // example: ABC1234
    private function getEventID() {
        do {            
            $ltr1 = chr(rand(65, 90));
            $ltr2 = chr(rand(65, 90));
            $ltr3 = chr(rand(65, 90));
            $num1 = rand(0, 9);
            $num2 = rand(0, 9);
            $num3 = rand(0, 9);
            $num4 = rand(0, 9);
            
            $id = $ltr1 . $ltr2 . $ltr3 . $num1 . $num2 . $num3 . $num4 ;

            $sqlQuery = "SELECT eTitle FROM tblEvents WHERE eID = '$id'";
        } 
        while (!empty($this->db->query($sqlQuery)->result_array()));

        return $id;
    }
} 
