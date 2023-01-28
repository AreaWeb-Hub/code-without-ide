<?php

namespace App\Services;

use ArrayHelpers\Arr;

session_start();

class AuthService
{
	public function check(): bool
	{
		return !is_null($this->user());
	}

	public function user(): ?array
	{
		$token = Arr::get($_SESSION, 'user_token');

		if (is_null($token)) {
			return NULL;
		}

		$stmt = db()->prepare("SELECT * FROM users WHERE token = ?");
		$stmt->execute([$token]);

		$user = $stmt->fetch(\PDO::FETCH_ASSOC);

		if (!$user) {
			return NULL;
		}

		return $user;
	}

	public function logout()
	{
		unset($_SESSION['user_token']);
		session_destroy();
		header('Location: /');
	}
}
