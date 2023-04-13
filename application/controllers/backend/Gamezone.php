<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gamezone extends CI_Controller {

	public function index() {

		if (!$this->db->table_exists($this->uri->segment(2))){
			$this->database->create_table($this->uri->segment(2));
		}

		$data = loadBackendData();

		$data['rows'] = $this->backend->get_all_records('gamezone');
		echo backendView($this->uri->segment(2), 'index', $data);

	}

	public function form($type, $id = '') {

		$data = loadBackendData();

        if($id != '') {
			$data['value'] = $this->backend->get_one_record($this->uri->segment(2), $id);
        }
		echo backendView($this->uri->segment(2), 'form', $data);
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
					$insert['user_id'] = $_SESSION['id'];
					$insert['user_name'] = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
					$insert[$key] = $value; 
				}
            }
            if($type == 'insert') {
			    $this->backend->insert($table, $insert);
			    $this->session->set_flashdata('flashdata_success', 'Rekord został dodany!');
            } else {
			    $this->backend->update($table, $insert, $id);
			    $this->session->set_flashdata('flashdata_success', 'Rekord został zaktualizowany!');   
            }
			redirect('backend/'.$table);

    }

}
