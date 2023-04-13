<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller {

    public function sendComment() {

		$insert['user_id'] = $_POST['user_id'];
		$insert['message'] = $_POST['message'];
		$insert['news_id'] = $_POST['news_id'];

		$this->session->set_flashdata('flashdata_success', '<p class="text-success font-weight-bold mb-0">Pomyślnie dodałeś komentarz</p>');
		$this->backend->insert('news_comments', $insert);

    }
    
    public function sendTutorialComment() {

		$insert['user_id'] = $_POST['user_id'];
		$insert['message'] = $_POST['message'];
        $insert['tutorial_id'] = $_POST['tutorial_id'];
        $insert['grade'] = $_POST['grade'];

		$this->session->set_flashdata('flashdata_success', '<p class="text-success font-weight-bold mb-0">Pomyślnie dodałeś komentarz</p>');
		$this->backend->insert('tutorials_comments', $insert);

	}

	public function sendReviewsComment() {

		$insert['user_id'] = $_POST['user_id'];
		$insert['message'] = $_POST['message'];
		$insert['review_id'] = $_POST['review_id'];

		$this->session->set_flashdata('flashdata_success', '<p class="text-success font-weight-bold mb-0">Pomyślnie dodałeś komentarz</p>');
		$this->backend->insert('reviews_comments', $insert);

    }

    public function delete($table, $id) {

		$this->session->set_flashdata('flashdata_success', 'Rekord został usunięty!');
		$this->backend->delete($table , $id);
		redirect($_SERVER['HTTP_REFERER']);

	}
	
	public function gallery($table, $id) {

		$data = loadBackendData();
		$data['rows'] = $this->backend->get_images('gallery', $table, $id);
		echo frontView('form_gallery', $data);

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
		redirect('actions/gallery/'.$table.'/'.$id);

	}
    
	


}