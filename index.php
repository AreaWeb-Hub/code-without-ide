<?php
require_once __DIR__ . '/vendor/autoload.php';
use ArrayHelpers\Arr;
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
</body>
</html>
