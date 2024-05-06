<?php
// Подключение файлов
require_once('includes/functions.php');
require_once('config/categories.php');
require_once('config/items.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Данные
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// Подключение шаблонов
$head = include_template('head.php', ['title' => 'Главная страница']);
$header = include_template('header.php', ['is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar]);
$footer = include_template('footer.php', ['categories' => $categories, 'ads' => $ads]);

// Подключение шаблона main.php
$main_content = include_template('main.php', ['categories' => $categories, 'ads' => $ads]);

// Подключение шаблона layout.php
$layout = include_template('layout.php', [
    'head' => $head,
    'header' => $header,
    'content' => $main_content,
    'categories' => $categories,
    'ads' => $ads,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'footer' => $footer,
]);

print($layout);