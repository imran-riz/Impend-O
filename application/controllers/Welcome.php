<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $data = array("Email" => null);
        if ($this->session->has_userdata("Email")) {
            $data["Email"] = $this->session->userdata("Email");
        }

        $this->deletePastEvents();

        $this->Data["NavBar"] = $this->load->view("components/nav-bar", $data, true);
        $this->Data["Footer"] = $this->load->view("components/page-footer", array("Fixed" => false), true);
    }    

	public function index() {
		$this->load->view("welcome-page", $this->Data);
	}

    
    private function deletePastEvents() {
        $today = date("Y-m-d");
        
        $sqlQuery = "SELECT eID FROM tblEvents WHERE eDate < '$today'";
        $eventIDs = $this->db->query($sqlQuery)->result_array();

        if (!empty($eventIDs)) {
            $this->load->library("MyLib");

            $eventIDs = $eventIDs[0];

            foreach ($eventIDs as $id) {
                $this->mylib->deleteEvent($id);
            }
        }
    }
}
