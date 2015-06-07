<?php

use Laracasts\TestDummy\Factory as TestDummy;

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;


class TestCase extends Laracasts\Integrated\Extensions\Laravel {

	use DatabaseTransactions;

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	/**
	 * Registers a new user.
	 */
	protected function register(array $overrides = [])
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
