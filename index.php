<?php
require_once __DIR__ . '/vendor/autoload.php';
use ArrayHelpers\Arr;

if (auth()->check()) {
        header('Location: /profile.php');
        die();
}

?>

<html lang="ru">
<?php include_once __DIR__ . '/resources/components/head.php' ?>
<body>
<?php include_once __DIR__ . '/resources/components/header.php' ?>

<div class="wrapper">
<?php 
if (Arr::has($_GET, 'message')) {
?>
<h2><?php echo Arr::get($_GET, 'message') ?></h2>
<?php
}
?>
</div>

<main>
        <div class="wrapper">
                <form class="form" action="/app/Actions/login.php" method="post">
                        <label for="email">Адрес электронной почты</label>
                        <input type="email" name="email" id="email" placeholder="Адрес электронной почты">
                        <label for="password">Введите пароль</label>
                        <input type="password" name="password" id="password" placeholder="Пароль">
                        <button type="submit">Войти</button>
                </form>
        </div>
</main>
</body>
</html>
