<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorials extends CI_Controller {

	public function index() {

		$data = loadBackendData();

		$data['rows'] = $this->backend->get_all_records('tutorials');
		echo backendView($this->uri->segment(2), 'index', $data);

	}

}
