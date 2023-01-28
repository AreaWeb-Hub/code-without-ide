<?php

namespace App\Services;

class RegisterService
{
	public function handle(?string $name, ?string $email, ?string $phone, ?string $password, ?string $passwordConfirmation)
	{

		if (!$this->registerValidation($name, $email, $phone, $password, $passwordConfirmation)) {
			return;
		}

		$query = "INSERT INTO users (name, email, phone, password) VALUE (:name, :email, :phone, :password)";
		$params = [
			":name" => $name,
			":email" => $email,
			":phone" => $phone,
			":password" => password_hash($password, PASSWORD_DEFAULT),
		];

		$stmt = db()->prepare($query);
		$stmt->execute($params);

		header('Location: /?message=Аккаунт успешно создан');
	}

	private function registerValidation(?string $name, ?string $email, ?string $phone, ?string $password, ?string $passwordConfirmation) 
	{
		$errors = [];

		if (empty($name) || !is_string($name)) {
			$errors[] = ['name' => 'Имя', 'message' => 'Некорректное имя пользователя'];
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = ['name' => 'E-mail', 'message' => 'Некорректное формат почты'];
                }

		if (!$this->isUniqueEmail($email)) {
                        $errors[] = ['name' => 'E-mail', 'message' => 'Адрес электронной почты уже существует'];
                }

		if (empty($phone) || !is_string($phone)) {
                        $errors[] = ['name' => 'Номер телефона', 'message' => 'Некорректный номер телефона'];
                }

		if (empty($password) || !is_string($password) || strlen($password) < 6) {
                        $errors[] = ['name' => 'Пароль', 'message' => 'Пароль должен состоять из 6 символов'];
                }

		if ($password !== $passwordConfirmation) {
                        $errors[] = ['name' => 'Подтверждение пароля', 'message' => 'Пароли не совпадают'];
                }

		if (!empty($errors)) {
			$this->showErrors($errors);
			return false;
		}

		return true;
	}

	private function showErrors(array $errors)
	{
		?>
		<p class="errors">Ошибка валидации</p>
		<ul class="errors">
		<?php
		foreach ($errors as $error) {
			echo "<li><b>{$error['name']}:</b> {$error['message']}</li>";
		}
		?>
		</ul>
		<?php
	}

	private function isUniqueEmail($email): bool
	{
		$stmt = db()->prepare("SELECT id FROM users WHERE email = ?");
		$stmt->execute([$email]);
		return !$stmt->fetch();
	}
}
