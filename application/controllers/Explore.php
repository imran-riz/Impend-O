<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Explore extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $data = array("Email" => null);
        if ($this->session->has_userdata("Email")) {
            $data["Email"] = $this->session->userdata("Email");
        }

        $this->Data["EventCards"] = $this->loadEventCards();

        $this->Data["NavBar"] = $this->load->view("components/nav-bar", $data, true);
        $this->Data["Footer"] = $this->load->view("components/page-footer", array("Fixed" => $this->footerFixed()), true);
    }

	public function index() {
		$this->load->view("explore-page", $this->Data);
	}

    private function loadEventCards() {
        $events = $this->loadEvents(); 

        $cards = array();

        for ($i = 0; $i < sizeof($events); $i++) {
            $e = $events[$i];

            $data = array(
                "event" => $e,
                "editable" => false
            );

            $cards[$i] = $this->load->view("components/event-card", $data, true);            
        }

        return $cards;
    }
    
    private function loadEvents() {
        $sqlQuery = "SELECT * FROM tblEvents ORDER BY eDate";

        return $this->db->query($sqlQuery)->result_array();
    }

    private function footerFixed() {
        $events = $this->loadEvents();

        if (empty($events)) {
            return true;
        }
        else {

            if (sizeof($events) > 1) {
                return !($events[0]["eFilename"] != NULL || $events[1]["eFilename"] != NULL);
            }
            else {
                return !$events[0]["eFilename"] != NULL;
            }
        }

    }
}
