<?php

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

}
