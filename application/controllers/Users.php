<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index() {

		if ($_SESSION['login'] ?? null):
			redirect('strona-glowna');
		else: 
			echo frontAuthView('login');
		endif;
	}


	public function login() {

		$this->form_validation->set_rules('login', 'Login', 'min_length[2]|trim');
		$this->form_validation->set_rules('password', 'Hasło', 'min_length[6]|trim');
		$this->form_validation->set_message('min_length', 'Pole %s ma za mało znaków');

		if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('flashdata_false', validation_errors());
			echo frontAuthView('login');
		} else {
			$login = strtolower($this->input->post('login'));
        	$password = $this->input->post('password');
			if($this->authorization->check_login($login, $password)){
				redirect('strona-glowna');
			} else {
				echo frontAuthView('login');
			}
		}
	}

	public function register_regulations() {

		$data['settings'] = $this->backend->get_one_record('settings', 1);
		echo frontAuthView('register_regulation', $data);

	}

	public function register_view() {

		if ($_SESSION['login'] ?? null):
			redirect('strona-glowna');
		else: 
			$data['settings'] = $this->backend->get_one_record('settings', 1);
			echo frontAuthView('register', $data);
		endif;
	}

	public function register() {
		$this->form_validation->set_rules('email', 'Adres e-mail', 'min_length[2]|trim|is_unique[users.email]|required');
		$this->form_validation->set_rules('password', 'Hasło', 'min_length[6]|trim|required');
		$this->form_validation->set_rules('first_name', 'Imie', 'min_length[2]|trim|required');
		$this->form_validation->set_rules('last_name', 'Nazwisko', 'min_length[2]|trim|required');
		$this->form_validation->set_message('min_length', 'Pole %s ma za mało znaków');
		$this->form_validation->set_message('required', 'Pole %s Jest wymagane');
		$this->form_validation->set_message('is_unique', 'Dany adres e-mail jest już w użyciu');

		if ($this->form_validation->run() == FALSE) {
			$data['settings'] = $this->backend->get_one_record('settings', 1);
			echo frontAuthView('login', $data);
		} else {
			if ($this->authorization->register($_POST)) {
				$this->session->set_flashdata('flashdata_success', '<p class="text-success font-weight-bold mb-0">Zostałeś pomyślnie zarejestrowany.</p>');
				$this->session->set_flashdata('register_success', 'Zostałeś pomyslnie zarejestrowany. Proszę potwierdź swoje konto klikając w link podany w wiadomości e-mail.');
				redirect('logowanie');
			} else {
				$this->session->set_flashdata('flashdata_false', '<p class="text-danger font-weight-bold mb-0">Wystąpił problem podczas rejestracji Twojego konta. Prosimy spróbować później.</p>');
				redirect('rejestracja');
			}
		}
	}

	public function forgot_password() {
		
		if ($_SESSION['login'] ?? null):
			redirect('strona-glowna');
		else: 
			$this->form_validation->set_rules('login', 'Login', 'required|min_length[2]|trim');
			$this->form_validation->set_rules('email', 'Adres e-mail', 'required|min_length[2]|valid_email|trim');
			$this->form_validation->set_message('min_length', 'Pole "%s" ma za mało znaków');
			$this->form_validation->set_message('required', 'Pole "%s" jest wymagane');
			$this->form_validation->set_message('valid_email', 'Pole "%s" nie jest poprawnym adresem');

			if ($this->form_validation->run() == FALSE) {
				echo frontAuthView('forgot_password');
			} else {
				if ($this->authorization->reset_password($_POST)) {
					$this->session->set_flashdata('flashdata_success', '<p class="text-success font-weight-bold mb-0">Twoje hasło zostało pomyślnie zmienione.</p>');
					$this->session->set_flashdata('register_success', 'Twoje nowe hasło zostało wysłane na Twój adres e-mail.');
					redirect('logowanie');
				} else {
					$this->session->set_flashdata('flashdata_false', '<p class="text-danger font-weight-bold mb-0">Podane dane są nieprawidłowe.</p>');
					redirect('zapomnialem_hasla');
				}
			}
		endif;
	}
	

	public function edit_profile($name, $id) {

		$data = loadFrontendData();
		echo frontView('edit_profile', $data);

	}

	public function logout() {
		$this->session->sess_destroy();
        $this->session->set_flashdata('flashdata_success', 'Poprawne wylogowanie');
		redirect('');
	}
	
	public function active_account($secret_key) {
		$insert['active'] = 1;
		if($this->authorization->active_account('users', $insert, $secret_key)) {
			$this->session->set_flashdata('register_success', 'Twoje konto zostało pomyślnie zweryfikowane! Teraz możesz się zalogować.');
		} else {
			$this->session->set_flashdata('flashdata_false', 'Wystąpił nieznany błąd podczas aktywacji konta. Prosimy skontaktować się naszą infolinią. Przepraszamy.');
		}
		redirect('logowanie');
	}

	public function update_client() {

			$this->form_validation->set_rules('first_name', 'Imię', 'min_length[2]|trim|required');
			$this->form_validation->set_rules('last_name', 'Nazwisko', 'min_length[2]|trim|required');
			$this->form_validation->set_rules('description', 'Opis', 'min_length[2]|trim|required');

			$this->form_validation->set_message('min_length', 'Pole %s ma za mało znaków');
			$this->form_validation->set_message('required', 'Pole %s Jest wymagane');

			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('flashdata_false', validation_errors());
				redirect($_SERVER['HTTP_REFERER']);
			} else {

			$now = date('Y-m-d');
			if (!is_dir('uploads/'.$now)) {
				mkdir('./uploads/' . $now, 0777, TRUE);
			}
			$config['upload_path'] = './uploads/'.$now;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 0;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			foreach ($_POST as $key => $value) {
				if (!$this->db->field_exists($key, 'users')) {
					$this->database->create_column('users', $key);
				}

				if($key == 'name_photo_2') {
					if ($this->upload->do_upload('photo_2')) {
						$data = $this->upload->data();
						$insert['photo'] = $now.'/'.$data['file_name'];
						if($data['image_width'] > 1440) {
							resizeImg($data['file_name'], $now, '1440');
						}
					} elseif($value == 'usunięte') {
						$insert['photo'] = '';
					}
				}
				else if($key == 'name_photo_1') {
					if ($this->upload->do_upload('photo_1')) {
						$data = $this->upload->data();
						$insert['background_photo'] = $now.'/'.$data['file_name'];
						if($data['image_width'] > 1440) {
							resizeImg($data['file_name'], $now, '1440');
						}
					} elseif($value == 'usunięte') {
						$insert['background_photo'] = '';
					}
			
				} elseif($key == 'password') {
					if($value != '') {
						$insert[$key] = hashPassword($value);
					}  
				} else {
					$insert[$key] = $value; 
				}
			}
		$this->backend->update('users', $insert, $_SESSION['id']);
		$this->session->set_flashdata('flashdata_success', 'Dane zostały zapisane');  

		redirect($_SERVER['HTTP_REFERER']);
		}
	}


    
}