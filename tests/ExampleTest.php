<?php

use Laracasts\TestDummy\Factory as TestDummy;

class ExampleTest extends TestCase {

	/** @test */
	public function it_displays_all_posts()
	{

		TestDummy::create('App\Post', ['content' => 'Some content.']);

		$this->visit('posts')->andSee('Some content.');
	
	}

	/** @test */
	public function it_publishes_a_post()
	{

		$post = TestDummy::attributesFor('App\Post');

		$this->visit('posts/create')
			 ->submitForm('Publish Post', $post)
			 ->verifyInDatabase('posts', $post)
			 ->see($post['content'])
			 ->onPage('posts');
	
	}

}
