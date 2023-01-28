<?php

use Symfony\Component\Dotenv\Dotenv;
use ArrayHelpers\Arr;

function env(string $key)
{
	$dotenv = new Dotenv();
	$dotenv->load(__DIR__ . '/../.env');
	return Arr::get($_ENV, $key);
}

function db(): \PDO
{
	return new PDO('mysql:dbname=' . env('DB_NAME') . ';host=' . env('DB_HOST'), env('DB_USER'), env('DB_PASSWORD'));
}
