<?php
// Подключение файлов
require_once('../includes/functions.php');
require_once('../config/categories.php');
require_once('../config/items.php');
require_once('../includes/forms.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Получение ID лота из запроса
$id = $_GET['id'] ?? null;
$lot = $ads[$id] ?? null;

// Данные
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// Подключение шаблонов
$head = include_template('head.php', ['title' => 'История просмотров', 'id' => null], '../templates/');
$header = include_template('header.php', ['is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar], '../templates/');
$footer = include_template('footer.php', ['categories' => $categories, 'ads' => $ads], '../templates/');

// Получение списка просмотренных лотов из cookies
$viewedLots = json_decode($_COOKIE['viewed_lots'] ?? '[]', true);
if (!is_array($viewedLots)) {
    $viewedLots = [];
}

// Фильтрация массива $viewedLots
$viewedLots = array_filter($viewedLots, 'is_int');

// Получение данных лотов по их индексам
$viewedLotsData = array_intersect_key($ads, array_flip($viewedLots));

// Подключение шаблона history-content.php
$history_content = include_template('history-content.php', ['categories' => $categories, 'ads' => $viewedLotsData, 'viewedLots' => $viewedLots], '../templates/');

// Подключение шаблона layout.php
$layout = include_template('layout.php', [
    'head' => $head,
    'header' => $header,
    'content' => $history_content,
    'title' => 'История просмотров',
    'categories' => $categories,
    'ads' => $ads,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'footer' => $footer,
], '../templates/');

print($layout);