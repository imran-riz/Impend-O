<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccount extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->has_userdata("Email")) {
            $data = array("Email" => null);
            if ($this->session->has_userdata("Email")) {
                $data["Email"] = $this->session->userdata("Email");
            }

            $this->Data["NavBar"] = $this->load->view("components/nav-bar", $data, true);
            $this->Data["Footer"] = $this->load->view("components/page-footer", array("Fixed" => false), true);
            $this->Data["UserDetails"] = $this->getUserDetails()[0];
            $this->Data["EventCards"] = $this->loadEventCards();
        }
        else {
            redirect("SignIn");
        }
    }    

	public function index() {
		$this->load->view("user-account-page", $this->Data);
	}

    public function signOut() {
        $this->session->sess_destroy();
		redirect("Welcome");
    }

    public function deleteEvent() {
        $this->load->library("MyLib");
        echo $this->mylib->deleteEvent($this->input->post("eID"));
    }

    private function getUserDetails() {
        $email = $this->session->userdata("Email");

        $sqlQuery = "SELECT * FROM tblStudents WHERE sEmail = '$email'";

        return $this->db->query($sqlQuery)->result_array();
    }

    private function loadEventCards() {
        $events = $this->getEventsPosted();

        $cards = array();

        for ($i = 0; $i < sizeof($events); $i++) {            
            $data = array (
                "event" => $events[$i],
                "editable" => true
            );

            $cards[$i] = $this->load->view("components/event-card", $data, true);
        }

        return $cards;
    }

    private function getEventsPosted() {
        $email = $this->session->userdata("Email");

        $sqlQuery = "SELECT * FROM tblEvents WHERE eEmail = '$email' ORDER BY ePostedOn";

        return $this->db->query($sqlQuery)->result_array();
    }
}
