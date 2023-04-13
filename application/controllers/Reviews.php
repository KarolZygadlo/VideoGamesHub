<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller {

	public function index() {

		$data = loadBackendData();

		$data['rows'] = $this->backend->get_all_records('reviews');
		echo frontView('list_reviews', $data);

	}

	public function form($type, $id = '') {

		$data = loadBackendData();

        if($id != '') {
			$data['value'] = $this->backend->get_one_record('reviews', $id);
        }
		echo frontView('form_reviews', $data);
	} 

	public function action($type, $table, $id = '') {

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
            $insert['user_id'] = $_SESSION['id'];
            if($type == 'insert') {
			    $this->backend->insert($table, $insert);
			    $this->session->set_flashdata('flashdata_success', 'Rekord został dodany!');
            } else {
			    $this->backend->update($table, $insert, $id);
			    $this->session->set_flashdata('flashdata_success', 'Rekord został zaktualizowany!');   
            }
			redirect('twoje-recenzje');

    }

}
