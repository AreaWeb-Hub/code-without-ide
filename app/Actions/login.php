<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use ArrayHelpers\Arr;
use App\Services\LoginService;

(new LoginService())
        ->handle(
                Arr::get($_POST, 'email'),
                Arr::get($_POST, 'password'),
        );
