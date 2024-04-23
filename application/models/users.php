<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    // Function to check if the username and password input is correct
    public function get_user($username, $password) { 
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        return $query->row_array();
    }
}
?>
