<?php

namespace App\Services;

class LoginService
{
	public function handle($email, $password)
	{
		$stmt = db()->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->execute([$email]);
		$user = $stmt->fetch(\PDO::FETCH_ASSOC);

		if ($user === false || !password_verify($password, $user['password'])) {
			$this->invalidCredentials();
			return;
		}

		session_start();

		$_SESSION['user_token'] = $this->updateUserToken($email);

		header('Location: /profile.php');
	}

	private function invalidCredentials()
	{
		echo 'Неверный логин или пароль';
	}

	private function updateUserToken($email): string
	{
		$token = randomStr(50);

		$query = "UPDATE users SET token = :token WHERE email = :email";
		$params = [':token' => $token, ':email' => $email];

		$stmt = db()->prepare($query);
		$stmt->execute($params);

		return $token; 
	}
}
