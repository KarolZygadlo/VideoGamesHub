<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function index($table, $id) {

		$data = loadBackendData();

        $data['rows'] = $this->backend->get_all_records($table, $id);
        $data['entry_id'] = $id;
        $data['table'] = $table;
		echo backendView($this->uri->segment(2), 'index', $data);

    }
    
    public function active_opinion() {
		$insert['active'] = $_POST['value'];
		$this->backend->update($_POST['table'], $insert, $_POST['id']);
	}

}
