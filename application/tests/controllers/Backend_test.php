<?php

if (!isset($_SESSION)) $_SESSION = array();

class Backend_test extends TestCase
{

	public static $shared_session = array();
	protected $backupGlobalsExcludeList = array('_SESSION');

	public function setUp(): void
	{

		$_SESSION = Backend_test::$shared_session;
		$this->resetInstance();
	}

	public function tearDown(): void
	{
		Backend_test::$shared_session = $_SESSION;
	}

	public function test_session()
	{
		$_SESSION['foo'] = 'bar';
		$this->assertEquals('bar', $_SESSION['foo']);
		$this->request('POST', 'Users/login', ['login' => 'raistlin313@gmail.com', 'password' => '79x)PI711']);
	}

	public function test_news_list()
	{
		$output = $this->request('GET', 'backend/news/index');
		$this->assertStringContainsString('<a href="" class="white-text mx-3">Lista aktualności</a>', $output);
	}

	public function test_gamezone_list()
	{
		$output = $this->request('GET', 'backend/gamezone/index');
		$this->assertStringContainsString('<a href="" class="white-text mx-3">Lista gier</a>', $output);
	}

	public function test_help_center_list()
	{
		$output = $this->request('GET', 'backend/help_center/index');
		$this->assertStringContainsString('<a href="" class="white-text mx-3">Lista pytań FAQ</a>', $output);
	}

	public function test_tutorials_list()
	{
		$output = $this->request('GET', 'backend/tutorials/index');
		$this->assertStringContainsString('<a href="" class="white-text mx-3">Lista poradników</a>', $output);
	}

	public function test_users_posts_list()
	{
		$output = $this->request('GET', 'backend/users_posts/index');
		$this->assertStringContainsString('<a href="" class="white-text mx-3">Lista postów</a>', $output);
	}

	public function test_reviews_list()
	{
		$output = $this->request('GET', 'backend/reviews/index');
		$this->assertStringContainsString('<a href="" class="white-text mx-3">Lista recenzji</a>', $output);
	}

	public function test_mails_list()
	{
		$output = $this->request('GET', 'backend/mails/index');
		$this->assertStringContainsString('<a href="" class="white-text mx-3">Lista wiadomości email</a>', $output);
	}
	
}
