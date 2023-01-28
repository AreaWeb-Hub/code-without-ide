<?php

use Symfony\Component\Dotenv\Dotenv;
use ArrayHelpers\Arr;
use App\Services\AuthService;

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

function randomStr($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function auth(): AuthService
{
	return new AuthService();
}
