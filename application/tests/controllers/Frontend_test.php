<?php

if (!isset($_SESSION)) $_SESSION = array();

class Frontend_test extends TestCase
{

	public static $shared_session = array();
	protected $backupGlobalsExcludeList = array('_SESSION');

	public function setUp(): void
	{

		$_SESSION = Frontend_test::$shared_session;
		$this->resetInstance();
	}

	public function tearDown(): void
	{
		Frontend_test::$shared_session = $_SESSION;
	}

	public function test_session()
	{
		$_SESSION['foo'] = 'bar';
		$this->assertEquals('bar', $_SESSION['foo']);
	}

	public function test_login()
	{
		$output = $this->request('GET', 'Users/index');
		$this->assertStringContainsString('<input type="text" id="login" class="form-control" name="login">', $output);
		$this->request('POST', 'Users/login', ['login' => 'raistlin313@gmail.com', 'password' => '79x)PI711']);
	}

	public function test_profile_edit()
	{
		$output = $this->request('GET', 'Users/edit_profile/test/1');
		$this->assertStringContainsString('<h3 class="font-weight-bold black-text text-center">Edycja profilu</h3>', $output);
	}

	public function test_index_news()
	{
		$output = $this->request('GET', 'Home/index');
		$this->assertStringContainsString('<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Aktualności</h3>', $output);
	}

	public function test_index_posts()
	{
		$output = $this->request('GET', 'Home/index');
		$this->assertStringContainsString('<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Dodaj wpis</h3>', $output);
	}

	public function test_index_posts_form()
	{
		$output = $this->request('GET', 'Home/index');
		$this->assertStringContainsString('<textarea id="postBody" class="md-textarea form-control" rows="5" name="body"></textarea>', $output);
	}

	public function test_index_posts_list()
	{
		$output = $this->request('GET', 'Home/index');
		$this->assertStringContainsString('<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Najnowsze wpisy użytkowników</h3>', $output);
	}

	public function test_news_list()
	{
		$output = $this->request('GET', 'Home/news');
		$this->assertStringContainsString('<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Najnowsze wpisy na blogu</h3>', $output);
	}

	public function test_tutorials_list()
	{
		$output = $this->request('GET', 'Home/tutorials');
		$this->assertStringContainsString('<h3 class="font-weight-bold mb-5">Poradniki do gier</h3>', $output);
	}

	public function test_reviews_list()
	{
		$output = $this->request('GET', 'Home/reviews');
		$this->assertStringContainsString('<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Najnowsze recenzje</h3>', $output);
	}

	public function test_gamezone_list()
	{
		$output = $this->request('GET', 'Home/gamezone');
		$this->assertStringContainsString('<h3 class="font-weight-bold black-text mb-4 pb-2 text-center">Nasze gry</h3>', $output);
	}

	public function test_helpdesk()
	{
		$output = $this->request('GET', 'Home/helpdesk');
		$this->assertStringContainsString('<h3 class="font-weight-bold black-text mb-4 pb-2 text-center">Najczęściej zadawane pytania</h3>', $output);
	}

	public function test_contact()
	{
		$output = $this->request('GET', 'Home/contact');
		$this->assertStringContainsString('<h3 class="font-weight-bold mb-4">Masz jakieś pytania? Nie wahaj się skontaktować z nami bezpośrednio.</h3>', $output);
	}


}

