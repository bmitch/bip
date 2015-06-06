<?php

$factory('App\Post', [
	'content' => $faker->text(25),
]);

$factory('App\User', [
	'name' => $faker->name,
	'email' => $faker->email,
	'password' => 'password'
]);