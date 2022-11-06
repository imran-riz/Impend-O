<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyLib {

    public function __construct() {
        // assign the CodeIgniter object to a variable to use CI’s classes from custom classes
        $this->CI =& get_instance();
    }

    public function uploadImage($pEventID) {
        $config["upload_path"] = "./uploads/";
        $config["allowed_types"] = "gif|jpg|png|jpeg";
        $config["max_size"] = 1550;         // in KB
        $config["max_width"] = 1084;        // in px
        $config["max_height"] = 1084;       // in px

        $fileType = substr($_FILES["inputImg"]["type"], 6);
        $_FILES["inputImg"]["name"] = $pEventID . "." . $fileType;    // update the filename to match the event ID    

        $this->CI->load->library("upload", $config);

        $err = "";

        if (!$this->CI->upload->do_upload("inputImg")) {              // if upload failed
            $error = array("error" => $this->upload->display_errors());
            
            $err = " Failed to upload image file - " . $error["error"] ;
        }

        return $err;
    }

    // The function will validated the uploaded file and return the error message/s if present
    public function validImageFile() {
        $err = "";

        if ($_FILES["inputImg"]["size"] > 0) {
            $fileType = substr($_FILES["inputImg"]["type"], 6);

            if ($fileType != "png" && $fileType != "gif" && $fileType != "jpg" && $fileType != "jpeg") {
                $err = "Invalid file type.";
            }
            else {
                $tmpFileName = $_FILES["inputImg"]["tmp_name"];
                $tmpImg = array_values(getimagesize($tmpFileName));

                list($width, $height, $t, $a) = $tmpImg;

                if ($width > 1084 || $height > 1084) {
                    $err .= " The image's width and height exceeds the allowed dimensions.";
                }

                $fileSize =  intdiv($_FILES["inputImg"]["size"], 1084);        // get size of in Bytes and convert to KB

                if ($fileSize > 1550) {
                    $err .= " The image's file size exceeds the allowed size.";
                }
            }
        }
        else {
            $err = "File not uploaded successfully to temporary location.";
        }

        return $err;
    }


    public function deleteEvent($eID) {
        $this->CI->load->helper("file");

        $sqlQuery = "SELECT eFilename FROM tblEvents WHERE eID = '$eID'";
        $filename = $this->CI->db->query($sqlQuery)->result_array()[0]["eFilename"];
        
        $response = "";
        
        $sqlQuery = "DELETE FROM tblEvents WHERE eID = '$eID'";

        if (!$this->CI->db->query($sqlQuery)) {
            $response = "Failed to delete event: " . $this->CI->db->error();
        }
        elseif ($filename != NULL) {
            $this->deletePoster($filename);
        }

        return $response;
    }

    public function deletePoster($filename) {
        unlink("./uploads/$filename");
    }
}
