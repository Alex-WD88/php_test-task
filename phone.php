<?php
$phoneCodes = json_decode(file_get_contents('phone-codes.json'), true);
if (!$phoneCodes) {
    die('Не удалось загрузить данные из phone-codes.json');
}


function cleanPhoneNumber($number) {
    return preg_replace('/[\+\s\-()]+/', '', $number);
}

function findCountryByPhoneNumber($number, $codes) {
    $cleanNumber = cleanPhoneNumber($number);
    foreach ($codes as $codeData) {
        $cleanPattern = cleanPhoneNumber($codeData['mask']);
        $pattern = '/^' . str_replace(['+', '#', '(', ')'], ['\+', '\d', '\(', '\)'], $cleanPattern) . '$/';
        if (preg_match($pattern, $cleanNumber)) {
            return $number . ' - ' . $codeData['name_ru'] . ', ' . $codeData['name_en'] . '<br>';
        }
    }

    return 'Страна не найдена';
}

$phoneNumber = $_POST['phoneNumber'] ?? null;
if ($phoneNumber) {
    echo findCountryByPhoneNumber($phoneNumber, $phoneCodes) . PHP_EOL;
} else {
    echo 'Введите номер телефона';
}