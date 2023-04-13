<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorials extends CI_Controller {

	public function index() {

            $data = loadFrontendData(); 
			$data['rows'] = $this->backend->get_user_tutorials('tutorials', $_SESSION['id']);
			echo frontView('list_tutorials', $data);

	}

	public function form($type, $id = '') {

			$data = loadFrontendData();
            if($id != '') {
			    $data['value'] = $this->backend->get_one_record('tutorials', $id);
            }
			echo frontView('form_tutorial', $data);

	} 

	public function action($type, $table, $id = '') {

			$this->form_validation->set_rules('book_title', 'Tytuł poradnika', 'min_length[2]|trim|required');
			$this->form_validation->set_rules('body', 'Opis poradnika', 'min_length[2]|trim|required');

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
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 0;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			foreach ($_POST as $key => $value) {

				if (!$this->db->field_exists($key, $table)) {
					$this->database->create_column($table, $key);
				}

				if($key == 'name_photo_1') {
					if ($this->upload->do_upload('photo_1')) {
						$data = $this->upload->data();
                        $insert['photo'] = $now.'/'.$data['file_name'];
                        if($data['image_width'] > 1440) {
							resizeImg($data['file_name'], $now, '1440');
						}
					} elseif($value == 'usunięte') {
						$insert['photo'] = '';
					}
				} else {
					$insert[$key] = $value; 
				}
            }
            if($type == 'insert') {
                $insert['user_id'] = $_SESSION['id'];
				$this->backend->insert($table, $insert);
			    $this->session->set_flashdata('flashdata_success', 'Rekord został dodany!');
            } else {
				$this->backend->update($table, $insert, $id);
			    $this->session->set_flashdata('flashdata_success', 'Rekord został zaktualizowany!');   
            }

			redirect('tutorials');

		}

    }
}
