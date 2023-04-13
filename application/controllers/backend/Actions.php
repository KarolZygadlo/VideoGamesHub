<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller {

    
	public function updateAlt() {

        $insert['alt'] = $_POST['value'];
        $this->backend->update($_POST['table'], $insert, $_POST['id']);

	}

	public function photo() {

		$now = date('Y-m-d');
		if (!is_dir('uploads/'.$now)) {
			mkdir('./uploads/' . $now, 0777, TRUE);
		}
		$config['upload_path'] = './uploads/'.$now;
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload('photo_logo');
		$data = $this->upload->data();
		$insert['logo'] = $now.'/'.$data['file_name'];   
        $this->backend->update($_POST['table'], $insert, 1);

	}

	public function privace() {

		$now = date('Y-m-d');
		if (!is_dir('uploads/'.$now)) {
			mkdir('./uploads/' . $now, 0777, TRUE);
		}
		$config['upload_path'] = './uploads/'.$now;
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload('privace');
		$data = $this->upload->data();
		$insert['privace'] = $now.'/'.$data['file_name'];   
        $this->backend->update($_POST['table'], $insert, 1);

	}

	public function gallery($table, $id) {

		$data = loadBackendData();
		$data['rows'] = $this->backend->get_images('gallery', $table, $id);
		echo backendView('gallery', 'index', $data);

	}

	public function gallery_action($table, $id) {

		$now = date('Y-m-d');
        $files = $_FILES;
        $cpt = count($_FILES ['gallery'] ['name']);
        for ($i = 0; $i < $cpt; $i ++) {
			if (!is_dir('uploads/'.$now)) {
				mkdir('./uploads/' . $now, 0777, TRUE);
			}
		$config['upload_path'] = './uploads/'.$now;
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
        $name = $files ['gallery'] ['name'] [$i];
		$name = slug_photo($name);
        $_FILES ['gallery'] ['name'] = $name;
        $_FILES ['gallery'] ['type'] = $files ['gallery'] ['type'] [$i];
        $_FILES ['gallery'] ['tmp_name'] = $files ['gallery'] ['tmp_name'] [$i];
        $_FILES ['gallery'] ['error'] = $files ['gallery'] ['error'] [$i];
        $_FILES ['gallery'] ['size'] = $files ['gallery'] ['size'] [$i];
        if(!($this->upload->do_upload('gallery')) || $files ['gallery'] ['error'] [$i] !=0) {
            echo $this->upload->display_errors();
        } else {
		$data = $this->upload->data();
		$insert['photo'] = $now . '/' . $name;
		if($data['image_width'] > 1440) {
			resizeImg($data['file_name'], $now, '1440');
		}
		$insert['table_name'] = $table;
		$insert['item_id'] = $id;
		$this->backend->insert('gallery', $insert);
		}
        }
		$this->session->set_flashdata('flashdata_success', 'Rekord został dodany!');
		redirect('backend/actions/gallery/'.$table.'/'.$id);

	}

    public function delete($table, $id) {

		$this->session->set_flashdata('flashdata_success', 'Rekord został usunięty!');
		$this->backend->delete($table , $id);
		redirect($_SERVER['HTTP_REFERER']);

    }
    
	public function delete_photos($table, $id) {

		$this->session->set_flashdata('flashdata_success', 'Rekord został usunięty!');
		$this->backend->delete('gallery' , $id);
		redirect($_SERVER['HTTP_REFERER']);

	}

	


}