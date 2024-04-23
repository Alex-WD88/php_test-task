<?php

// Загрузка данных из JSON-файла
$phoneCodes = json_decode(file_get_contents('phone-codes.json'), true);
if (!$phoneCodes) {
    die('Не удалось загрузить данные из phone-codes.json');
}

// Функция для очистки номера телефона от специальных символов
function cleanPhoneNumber($number) {
    return preg_replace('/[\+\s\-()]+/', '', $number);
    //echo $number;
}

// Функция для поиска страны по номеру телефона
function findCountryByPhoneNumber($number, $codes) {
    $cleanNumber = cleanPhoneNumber($number);
    //echo $cleanNumber;
    foreach ($codes as $codeData) {
        // Замена символа # на \d для обозначения цифры
        $cleanPattern = preg_replace('/[\+\s\-()]+/', '', $codeData['mask']);
        $pattern = '/^' . str_replace(['+', '#', '(', ')'], ['\+', '\d', '\(', '\)'], $cleanPattern) . '$/';
        if (preg_match($pattern, $cleanNumber)) {
            return $number . ' ' . $codeData['name_ru'] . ' ' . $codeData['name_en'] . '<br>';
        }
    }

    return 'Страна не найдена';
}

// Примеры номеров телефонов для проверки
$phoneNumbers = [
    '+375(29)123-45-67',
    '+7 (495) 123 45 67',
    '7 777 123-45-67',
    ];
    
    // Проверка номеров телефонов и вывод страны
    foreach ($phoneNumbers as $phoneNumber) {
    echo findCountryByPhoneNumber($phoneNumber, $phoneCodes) . PHP_EOL;
    }

?>