<?php

require 'yaMoneyParcer.php';

$parcer = new yaMoneyParcer();

$data = [
    'receiver' => '41001931111111'
];

$ch = curl_init('https://funpay.ru/yandex/emulator');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'x-requested-with: XMLHttpRequest',
]);


for ($i = 0; $i < 100; $i++) {
    $data['sum'] = (string) rand(1, 9950);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $string = curl_exec($ch);
    $parcer->setString($string);

    echo $string."\n\n";
    echo 'Пароль: '.$parcer->getPassword()."\n";
    echo 'Кошелек: '.$parcer->getWallet()."\n";
    echo 'Сумма: '.$parcer->getAmount()."\n\n";

    sleep(3);
}