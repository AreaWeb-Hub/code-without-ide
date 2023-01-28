<?php
require_once __DIR__ . '/vendor/autoload.php';

if (auth()->check()) {
        header('Location: /profile.php');
        die();
}
?>

<html lang="ru">
<?php include_once __DIR__ . '/resources/components/head.php' ?>
<body>
<?php include_once __DIR__ . '/resources/components/header.php' ?>
<main>
	<div class="wrapper">
		<form class="form" action="/app/Actions/register.php" method="post">
			<label for="name">Ваше полное имя</label>
			<input type="text" name="name"  id="name" placeholder="Имя">
			<label for="email">Адрес электронной почты</label>
                	<input type="email" name="email" id="email" placeholder="Адрес электронной почты">
			<label for="phone">Номер телефона</label>
                        <input type="text" name="phone" id="phone" placeholder="Номер телефона">
			<label for="password">Введите пароль</label>
                        <input type="password" name="password" id="password" placeholder="Пароль">
			<label for="password_confirmation">Подтверждение пароля</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтверждение">
			<button type="submit">Создать аккаунт</button>
		</form>
	</div>
</main>
</body>
</html>
