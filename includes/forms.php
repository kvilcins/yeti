<?php
// Проверка, была ли отправлена форма
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Список полей формы
    $fields = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
    
    // Проверка заполнения всех полей
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = 'Заполните это поле';
        }
    }
    
    // Проверка выбранной категории
    if (!in_array($_POST['category'], $categories)) {
        $errors['category'] = 'Выберите категорию';
    }
    
    // Проверка, что начальная цена и шаг ставки - это числа
    if (!is_numeric($_POST['lot-rate'])) {
        $errors['lot-rate'] = 'Введите число';
    }
    if (!is_numeric($_POST['lot-step'])) {
        $errors['lot-step'] = 'Введите число';
    }
    
    // Проверка загруженного файла изображения
    if (empty($_FILES['lot-img']['name'])) {
        $errors['lot-img'] = 'Вы не загрузили файл';
    } else {
        if ($_FILES['lot-img']['error'] == UPLOAD_ERR_OK && $_FILES['lot-img']['size'] > 0) {
            $tmp_name = $_FILES['lot-img']['tmp_name'];
            $path = $_FILES['lot-img']['name'];
            
            // Перемещение файла в папку img в корне проекта
            move_uploaded_file($tmp_name, __DIR__ . '/../img/' . $path);
        } else {
            $errors['lot-img'] = 'Произошла ошибка при загрузке файла';
        }
    }
    
    // Проверка наличия ошибок
    if (!empty($errors)) {
        // Если есть ошибки, показываем форму с сообщениями об ошибках
        $page_content = include_template('add-content.php', ['errors' => $errors]);
        var_dump($errors); // Выводим содержимое массива errors
    } else {
        // Если ошибок нет, показываем карточку товара
        $page_content = include_template('lot.php', ['lot' => $_POST]);
    }
}
//print_r($errors);


