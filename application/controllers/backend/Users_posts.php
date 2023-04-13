<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_posts extends CI_Controller {

	public function index() {

		$data = loadBackendData();

		$data['rows'] = $this->backend->get_all_records('posts');
		echo backendView($this->uri->segment(2), 'index', $data);

	}

}