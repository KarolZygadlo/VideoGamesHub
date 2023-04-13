<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
		parent::__construct();
		if (!$this->db->table_exists('users')){
			$this->database->create_base();
		}
	}

	public function index() {

		if ($_SESSION['login'] ?? null && $_SESSION['group'] == 'administration'): 
			redirect('backend/dashboard');
		else:
		echo loginView('index');

		endif;

	}

	public function login() {

		$this->form_validation->set_rules('login', 'Login', 'min_length[2]|trim');
		$this->form_validation->set_rules('password', 'Hasło', 'min_length[6]|trim');
		$this->form_validation->set_message('min_length', 'Pole %s ma za mało znaków');

		if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('flashdata', validation_errors());
			echo loginView('index');
		} else {
			$login = strtolower($this->input->post('login'));
        	$password = $this->input->post('password');
			if($this->authorization->check_login($login, $password)){
				redirect('backend/dashboard');
			} else {
				echo loginView('index');
			}
		}
		
	}

	public function logout() {
		$this->session->sess_destroy();
        $this->session->set_flashdata('flashdata', 'Poprawne wylogowanie');
		redirect('backend');
	}
	
}