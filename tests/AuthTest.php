<?php

use Laracasts\TestDummy\Factory as TestDummy;

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

	
	}

	protected function register(array $overrides)
	{
		$fields = $this->getRegisterFields($overrides);
		return $this->visit('auth/register')
		    		->andSubmitForm('Register', $fields);
	}

	protected function getRegisterFields(array $overrides)
	{
		$user = TestDummy::attributesFor('App\User', $overrides);
		return $user + ['password_confirmation' => $user['password']];

	}


}
