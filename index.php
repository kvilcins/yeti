<?php
// Подключение файлов functions.php и items.php
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

// Подключение шаблона main.php
$page_content = include_template('main.php', ['categories' => $categories, 'ads' => $ads]);

// Подключение шаблона layout.php
$layout_content = include_template('layout.php', [
        'content' => $page_content,
        'title' => 'Главная страница',
        'categories' => $categories,
        'ads' => $ads,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar
]);

print($layout_content);