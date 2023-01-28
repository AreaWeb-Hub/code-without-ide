<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use ArrayHelpers\Arr;
use App\Services\RegisterService;

(new RegisterService())
	->handle(
		Arr::get($_POST, 'name'),
		Arr::get($_POST, 'email'),
		Arr::get($_POST, 'phone'),
		Arr::get($_POST, 'password'),
		Arr::get($_POST, 'password_confirmation')
	);


