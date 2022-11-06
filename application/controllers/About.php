<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $data = array("Email" => null);
        if ($this->session->has_userdata("Email")) {
            $data["Email"] = $this->session->userdata("Email");
        }

        $this->Data["NavBar"] = $this->load->view("components/nav-bar", $data, true);
        $this->Data["Footer"] = $this->load->view("components/page-footer", array("Fixed" => true), true);
    }

    public function index() {
        $this->load->view("about-page", $this->Data);
    }    
}
?>