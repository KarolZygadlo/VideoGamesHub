 
<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

class Authorization_m_test extends TestCase
{

	public function setUp(): void
	{
		$this->resetInstance();
		$this->CI->load->model('Authorization');
		$this->obj = $this->CI->Authorization;
	}

	public function test_check_login()
	{
		$check_if_login_fails = $this->obj->check_login('admin', '2uptgKit1');
		$this->assertEquals(false, $check_if_login_fails);
		$check_if_login_fails = $this->obj->check_login('aadmin', '3uptgKit1');
		$this->assertEquals(false, $check_if_login_fails);
		$check_if_login_fails = $this->obj->check_login('ADMIN', '3uptgKit1');
		$this->assertEquals(false, $check_if_login_fails);
		$check_if_login_fails = $this->obj->check_login('admin', '3UPTGKIT1');
		$this->assertEquals(false, $check_if_login_fails);

		$check_login = $this->obj->check_login('raistlin313@gmail.com', '79x)PI711');
		$this->assertEquals(true, $check_login);
	}
}
