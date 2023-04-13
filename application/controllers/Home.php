<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();	
		if(!isset($_SESSION['lang'])){
			$_SESSION['lang'] = 'pl';
		}
	}

	public function index()
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['news'] = $this->backend->get_newest_articles('news');
			echo frontView('index', $data);
		else: 
			redirect('logowanie');
		endif;
		
	}

	public function news()
	{

		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['news'] = $this->backend->get_all_records('news');
			echo frontView('news_listing', $data);
		else: 
			redirect('logowanie');
		endif;
	}

	public function tutorials()
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['tutorials'] = $this->backend->get_all_records('tutorials');
			echo frontView('tutorials_listing', $data);
		else: 
			redirect('logowanie');
		endif;

	}

	public function reviews()
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['reviews'] = $this->backend->get_all_records('reviews');
			echo frontView('reviews_listing', $data);
		else: 
			redirect('logowanie');
		endif;

	}

	public function review($title, $id)
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['entry'] = $this->backend->get_one_record('reviews', $id);
			$data['gallery'] = $this->backend->get_images('gallery', 'reviews', $id);
			echo frontView('review_view', $data);
		else: 
			redirect('logowanie');
		endif;
	}

	public function tutorial_view($title, $id)
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['tutorial'] = $this->backend->get_one_record('tutorials', $id);
			$data['average_grade'] = $this->backend->average_tutorial_grade('tutorials_comments', $id);
			echo frontView('tutorial_view', $data);
		else: 
			redirect('logowanie');
		endif;

	}

	public function read_ebook($title, $id)
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['tutorial'] = $this->backend->get_one_record('tutorials', $id);
			$data['read_ebook'] = $this->backend->get_chapters('write_tutorials', $id);
			echo frontView('read_ebook', $data);
		else: 
			redirect('logowanie');
		endif;

	}

	public function gamezone()
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['games'] = $this->backend->get_all_records('gamezone');
			echo frontView('games_listing', $data);
		else: 
			redirect('logowanie');
		endif;

	}

	public function game($title, $id)
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['game'] = $this->backend->get_one_record('gamezone', $id);
			echo frontView('game_view', $data);
		else: 
			redirect('logowanie');
		endif;
	}

	public function entry($title, $id)
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['entry'] = $this->backend->get_one_record('news', $id);
			$data['gallery'] = $this->backend->get_images('gallery', 'news', $id);
			echo frontView('news_entry', $data);
		else: 
			redirect('logowanie');
		endif;
	}

	public function user_profile($title, $id)
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['profile_data'] = $this->backend->get_one_record('users', $id);
			$data['user_tutorials'] = $this->backend->get_user_data_from_table('tutorials', $id);
			$data['reviews'] = $this->backend->get_user_data_from_table('reviews', $id);
			$data['library'] = $this->backend->get_user_data_from_table('library', $id);
			echo frontView('profile_page', $data);
		else: 
			redirect('logowanie');
		endif;
	}

	public function post($id)
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['post'] = $this->backend->get_one_record('posts', $id);
			$data['user_data'] = $data['post']->user_id;
			echo frontView('post_view', $data);
		else: 
			redirect('logowanie');
		endif;
	}

	public function posts()
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();

		$data['rows'] = $this->backend->get_all_posts('posts');
		$paging = $this->uri->segment(2);
		$perPage = 10;
		$data['posts'] = $this->backend->get_orderBy_pagging('posts', $perPage, $paging);
		$this->load->library('pagination');
		$config['base_url'] = base_url('wszystkie-posty');
		$config['total_rows'] = count($data['rows']);
		$config['per_page'] = $perPage;
		$config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
		$config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
		$config['first_link'] = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>';
		$config['last_link'] = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';
		$this->pagination->initialize($config);

		echo frontView('posts', $data);

		else: 
			redirect('logowanie');
		endif;
	}

	public function helpdesk()
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			$data['help_center'] = $this->backend->get_all_records('help_center');
			echo frontView('helpdesk', $data);
		else: 
			redirect('logowanie');
		endif;

	}

	public function contact()
	{
		if ($_SESSION['login'] ?? null):
			$data = loadFrontendData();
			echo frontView('contact', $data);
		else: 
			redirect('logowanie');
		endif;

	}

	public function change($lang){
		$_SESSION['lang'] = $lang;
	}

}
