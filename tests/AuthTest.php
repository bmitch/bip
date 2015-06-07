<?php

class AuthTest extends TestCase {

	/** @test */
	public function it_logs_user_in_and_out()
	{	
		// Register
		$credentials = ['email' => 'foo@example.com'];
		$this->register($credentials)
			 ->verifyInDatabase('users', $credentials)
			 ->andSeePageIs('posts/create');

		// Logout
		$this->click('Logout')
			 ->andSeePageIs('auth/login')
			 ->andSee('Login');
		
		// Login
		$credentials['password'] = 'password';
		$this->visit('auth/login')
			 ->andSubmitForm('Login', $credentials)
			 ->andSeePageIs('posts/create');
	}


	/** @test */
	public function it_registers_a_user()
	{
		$credentials = ['email' => 'foo@example.com'];
		$this->register($credentials)
			 ->verifyInDatabase('users', $credentials)
			 ->andSeePageIs('posts/create');
	
	}

	/** @test */
	public function it_notifies_a_user_of_registration_errors()
	{
		// Missing email
		$credentials = ['email' => ''];
		$this->register($credentials)
			 ->andSeePageIs('auth/register')
			 ->andSee('The email field is required.');

		// Missing name
		$credentials = ['name' => ''];
		$this->register($credentials)
			 ->andSeePageIs('auth/register')
			 ->andSee('The name field is required.');

		// Missing password
		$credentials = ['password' => ''];
		$this->register($credentials)
			 ->andSeePageIs('auth/register')
			 ->andSee('The password field is required.');

	}

}
