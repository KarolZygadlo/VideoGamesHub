<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Write_tutorials extends CI_Controller {

	public function book($id) {

		$data = loadFrontendData();
		$data['rows'] = $this->backend->get_chapters('write_tutorials', $id);
		$data['tutorial'] = $this->backend->get_one_record('tutorials', $id);
		$this->session->set_userdata('book_id', $id);
            
		echo frontView('list_chapters', $data);

	}

	public function form($type, $id = '') {
			
		$data = loadFrontendData();
        if($id != '') {
			$data['value'] = $this->backend->get_one_record('write_tutorials', $id);
        }
		echo frontView('form_chapters', $data);

	} 

	public function action($type, $table, $id = '') {

			$this->form_validation->set_rules('chapter_title', 'Tytuł rozdziału', 'min_length[2]|trim|required');
			$this->form_validation->set_rules('chapter_content', 'Treść rozdziału', 'min_length[2]|trim|required');

			$this->form_validation->set_message('min_length', 'Pole %s ma za mało znaków');
			$this->form_validation->set_message('required', 'Pole %s Jest wymagane');

			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('flashdata_false', validation_errors());
				redirect($_SERVER['HTTP_REFERER']);
			} else {

		
			foreach ($_POST as $key => $value) {

				if (!$this->db->field_exists($key, $table)) {
					$this->database->create_column($table, $key);
				}
				$insert['book_id'] = $_SESSION['book_id'];
				$insert[$key] = $value; 

			}

            if($type == 'insert') {
				$this->backend->insert($table, $insert);
			    $this->session->set_flashdata('flashdata_success', 'Rekord został dodany!');
            } else {
				$this->backend->update($table, $insert, $id);
			    $this->session->set_flashdata('flashdata_success', 'Rekord został zaktualizowany!');   
            }
			redirect('write_tutorials/book/' .  $_SESSION['book_id']);
		}
    }
}