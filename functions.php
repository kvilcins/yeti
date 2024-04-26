<?php
function include_template($template_name, $data) {
    $template_name = 'templates/' . $template_name;
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