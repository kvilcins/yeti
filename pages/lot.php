<?php
// Подключение файлов
require_once('../includes/functions.php');
require_once('../config/categories.php');
require_once('../config/items.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Получение id лота из GET-параметров
$id = $_GET['id'] ?? null;

// Проверка наличия id в GET-параметрах
if ($id === null || !isset($ads[$id])) {
    header("HTTP/1.0 404 Not Found");
    exit;
}

$lot = $ads[$id];

// Данные
$title = $lot['title'] ?? 'Лот не найден';
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$head = include_template('head.php', ['title' => "Лот $title"], '../templates/');
$header = include_template('header.php', ['is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar], '../templates/');
$footer = include_template('footer.php', ['categories' => $categories, 'ads' => $ads, 'id' => $id], '../templates/');

// Подключение шаблона lot-content.php
$lot_content = include_template('lot-content.php', ['categories' => $categories, 'ads' => $ads, 'lot' => $lot], '../templates/');

// Подключение шаблона layout.php
$layout = include_template('layout.php', [
    'head' => $head,
    'header' => $header,
    'content' => $lot_content,
    'categories' => $categories,
    'ads' => $ads,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'footer' => $footer,
], '../templates/');

print($layout);
