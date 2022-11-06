<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class SignIn extends CI_Controller {

    function __construct() {
        parent::__construct();

        $data = array("Email" => null);
        $this->Data["NavBar"] = $this->load->view("components/nav-bar", $data, true);
        $this->Data["Footer"] = $this->load->view("components/page-footer", array("Fixed" => false), true);

        $this->Data["Error"] = "";
        $this->Data['Email'] = "";
        $this->Data['Password'] = "";
    }


    public function index() {
        $this->load->view("sign-in-page", $this->Data);
    }

    public function signInToAcct() {
        $email = $this->input->post("inputEmail");
        $pass = $this->input->post("inputPassword");

        $this->Data["Email"] = $email;
        $this->Data["Password"] = $pass;

        $success = false;
        
        $sqlQuery = "SELECT sStatus FROM tblStudents 
                WHERE sEmail = '$email' AND (sPassword = '$pass' OR sPassword IS NULL)";
        
        $result = $this->db->query($sqlQuery)->result_array();

        if (empty($result)) {
            $this->Data["Error"] = "Incorrect email address or password!";
        }
        else {
            if ($result[0]["sStatus"] == "DEACTIVATED") {
                $this->Data["Error"] = "Your account is deactivated! Contact the school administrator.";
            }
            else if ($result[0]["sStatus"] == "PENDING") {
                $this->Data["Error"] = "You have signed up and your account is still pending approval. Contact the school administrator for further details.";
            } 
            else {
                $userData = array (
                    "Email" => $email
                );
                
                $this->session->set_userdata($userData);                    
                $success = true;
            }
        }        

        if ($success) {
            redirect("Explore");
        }
        else {
            $this->load->view("sign-in-page", $this->Data);
        }
    }
}
?>