<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class SignUp extends CI_Controller {

    function __construct() {
        parent::__construct();

        $data = array("Email" => null);
        $this->Data["NavBar"] = $this->load->view("components/nav-bar", $data, true);
        $this->Data["Footer"] = $this->load->view("components/page-footer", array("Fixed" => false), true);

        $this->Data["FirstName"] = "";
        $this->Data["LastName"] = "";
        $this->Data["ClassTeacher"] = "";
        $this->Data["Email"] = "";
        $this->Data["Password"] = "";
        $this->Data["Error"] = "";
    }


    public function index() {
        $this->load->view("sign-up-page", $this->Data);
    }

    public function signUp() {
        $first = trim($this->input->post("inputFirstName"));
        $last = trim($this->input->post("inputLastName"));
        $teacher = trim($this->input->post("inputTeacher"));
        $email = trim($this->input->post("inputEmail"));
        $password = trim($this->input->post("inputPassword"));

        $this->Data["FirstName"] = $first;
        $this->Data["LastName"] = $last;
        $this->Data["ClassTeacher"] = $teacher;
        $this->Data["Email"] = $email;
        $this->Data["Password"] = $password;

        // regular expressions to validate the password
        $letters = preg_match("/[A-Za-z]{2,}/", $password);
        $digits = preg_match("/[0-9]{2,}/", $password);
        $specials = preg_match("/[!@$%^&*]{2,}/", $password);
        
        $succeeded = false;

        if (empty($first) || empty($last) || empty($teacher)) {
            $this->Data["Error"] = "Please enter the required names.";
        }
        else if ($letters == 0 || $digits == 0 || $specials == 0) {
            $this->Data["Error"] = "Please enter a valid password.";
        }
        else if ($this->emailExists($email)) {
            $this->Data["Error"] = "The email address already exists.";
        }
        else {
            $name = $first . " " . $last ;

            $sqlQuery = "INSERT INTO tblStudents (sEmail, sName, sClassTeacher) VALUES 
                         ('$email', '$name', '$teacher')";
            
            if ($this->db->query($sqlQuery)) {
                $succeeded = true;
            }
            else {
                $this->Data["Error"] = "ERROR";
            }
        }

        if ($succeeded) {
            $this->sendEmailToAdmin($email, $name);
        }
        
        $this->load->view("sign-up-page", $this->Data);
    }

    private function emailExists($email) {
        $sqlQuery = "SELECT sName FROM tblStudents WHERE sEmail = '$email'";

        if (empty($this->db->query($sqlQuery)->result_array())) {
            return false;
        }

        return true;
    }


    // from Session 16 work
    private function sendEmailToAdmin($name, $email) {
        $senderName = "Web Dev Project - Info";
        $senderEmail = "info@myproject.com";
        $recipientEmail = "imranrizwan1115@gmail.com";

        $subject = "New User Signed Up";
        $body = $this->load->view("components/email-message", array("Name" => $name, "Email" => $email), true);

        $headers = "MIME-Version: 1.0\r\n";                                                         // Set the MIME version to use 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";                              // Specify the character set 
        $headers .= "From: \"$senderName\" <$senderEmail>\r\n" . "Reply-To: $senderEmail\r\n";      // Put in the sender and receiver details.

        @mail($recipientEmail, $subject, $body, $headers);          // Send the mail and make it fail safe with the @ sign
    }
}
?>