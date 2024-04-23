<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('users');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
	
	public function index()
	{
		$this->load->view('login');
	}

    public function process() {
        // Validating input values
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        // if Validation fails❌
        if ($this->form_validation->run() == FALSE) {
            $data['validation_errors'] = validation_errors();
            $this->load->view('login', $data);
        } else {
            // If Validation succeed ✔
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // get_user function from users model
            $user = $this->users->get_user($username, $password);
            
            if ($user) { // If Login success
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('username', $user['username']);    
                redirect('crud');
            } else {
             // If login failed
                $data['error'] = 'Invalid username or password';
                $this->load->view('login', $data);
            }
        }
    }
}
