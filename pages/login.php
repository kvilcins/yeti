<?php
// Подключение файлов
require_once('../includes/functions.php');
require_once('../config/categories.php');
require_once('../config/items.php');
require_once('../includes/forms.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Данные
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// Подключение шаблонов
$head = include_template('head.php', ['title' => 'Добавление лота'], '../templates/');
$header = include_template('header.php', ['is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar], '../templates/');
$footer = include_template('footer.php', ['categories' => $categories, 'ads' => $ads], '../templates/');

// Подключение шаблона add_content.php
$add_content = include_template('login.php', ['categories' => $categories, 'ads' => $ads, 'errors' => $errors,], '../templates/');

// Подключение шаблона layout.php
$layout = include_template('layout.php', [
    'head' => $head,
    'header' => $header,
    'content' => $add_content,
    'title' => 'Добавление лота',
    'categories' => $categories,
    'ads' => $ads,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'footer' => $footer,
], '../templates/');

print($layout);
