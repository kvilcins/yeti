<?php
// Подключение файла functions.php
require_once('functions.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Данные
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$categories = [
        [
                "name" => "Доски и лыжи",
                "class" => "boards"
        ],
        [
                "name" => "Крепления",
                "class" => "attachment"
        ],
        [
                "name" => "Ботинки",
                "class" => "boots"
        ],
        [
                "name" => "Одежда",
                "class" => "clothing"
        ],
        [
                "name" => "Инструменты",
                "class" => "tools"
        ],
        [
                "name" => "Разное",
                "class" => "other"
        ]
];
$ads = [
        [
                "title" => "2014 Rossignol District Snowboard",
                "category" => "Доски и лыжи",
                "price" => 10999,
                "img" => "img/lot-1.jpg"
        ],
        [
                "title" => "DC Ply Mens 2016/2017 Snowboard",
                "category" => "Доски и лыжи",
                "price" => 159999,
                "img" => "img/lot-2.jpg"
        ],
        [
                "title" => "Крепления Union Contact Pro 2015 года размер L/XL",
                "category" => "Крепления",
                "price" => 8000,
                "img" => "img/lot-3.jpg"
        ],
        [
                "title" => "Ботинки для сноуборда DC Mutiny Charocal",
                "category" => "Ботинки",
                "price" => 10999,
                "img" => "img/lot-4.jpg"
        ],
        [
                "title" => "Куртка для сноуборда DC Mutiny Charocal",
                "category" => "Одежда",
                "price" => 7500,
                "img" => "img/lot-5.jpg"
        ],
        [
                "title" => "Маска Oakley Canopy",
                "category" => "Разное",
                "price" => 5400,
                "img" => "img/lot-6.jpg"
        ]
];

// Подключение шаблона index.php
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