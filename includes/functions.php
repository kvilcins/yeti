<?php
function include_template($template_name, $data, $template_path = 'templates/') {
    $template_name = $template_path . $template_name;
    $result = '';
    
    // Проверка существования файла
    if (!file_exists($template_name)) {
        return $result;
    }
    
    // Использование буферизации вывода для захвата содержимого шаблона
    ob_start();
    extract($data);
    require $template_name;
    
    // Возвращение итогового содержимого шаблона
    $result = ob_get_clean();
    
    return $result;
}

function formatPrice($price) {
    $price = ceil($price);
    if ($price >= 1000) {
        $price = number_format($price, 0, '.', ' ');
    }
    return $price . ' ₽';
}

function time_to_midnight() {
    // Установка часового пояса в московское время
    date_default_timezone_set('Europe/Moscow');
    
    // Получение временных меток для текущего времени и полуночи
    $now = time();
    $midnight = strtotime('tomorrow');
    
    // Вычисление количества секунд до полуночи
    $seconds_till_midnight = $midnight - $now;
    
    // Перевод секунд в часы и минуты
    $hours = floor($seconds_till_midnight / 3600);
    $minutes = floor(($seconds_till_midnight % 3600) / 60);
    
    // Форматирование времени в формат "Ч:М"
    $time_till_midnight = sprintf('%02d:%02d', $hours, $minutes);
    
    return $time_till_midnight;
}
