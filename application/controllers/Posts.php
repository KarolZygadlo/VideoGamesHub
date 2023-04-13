<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function sendPost() {

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
        $this->upload->do_upload('photo_1');
        $data = $this->upload->data();
        $insert['photo'] = $now.'/'.$data['file_name']; 
        if($data['image_width'] > 1440) {
          resizeImg($data['file_name'], $now, '1440');
        }
        $insert['user_id'] = $_POST['user_id'];
        $insert['body'] = $_POST['body'];

			$this->session->set_flashdata('post_flashdata_success', '<p class="text-success font-weight-bold mb-0">Pomyślnie dodałeś nowy post</p>');
			$this->backend->insert($_POST['table'], $insert);

		}
		
		public function loadPost() {

			$data['posts'] = $this->backend->get_all_active_posts('posts');

			$this->load->view('frontend/elements/posts', $data);

		}

    public function sendComment() {

      $insert['user_id'] = $_POST['user_id'];
      $insert['message'] = $_POST['message'];
      $insert['post_id'] = $_POST['post_id'];
  
      $this->session->set_flashdata('flashdata_success', '<p class="text-success font-weight-bold mb-0">Pomyślnie dodałeś komentarz</p>');
      $this->backend->insert('post_comments', $insert);
  
    }
    

    public function delete_post($table, $id) {

			$this->session->set_flashdata('flashdata_success', 'Post został usunięty!');
			$this->backend->delete($table , $id);
			redirect($_SERVER['HTTP_REFERER']);

    }
    
	


}
