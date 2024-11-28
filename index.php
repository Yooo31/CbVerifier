<?php

require 'src/CbVerifier.php';

use App\Services\CbVerifier;

$verifier = new CbVerifier();

$cards = [
    '4603433767975432',
    '1234567890123456'
];
$length = 16;

foreach ($cards as $numero) {
    if ($verifier->Luhn($numero, $length)) {
        echo 'N° de carte ' . $numero . ' valide';
    } else {
        echo 'N° de carte ' . $numero . ' invalide';
    }
    echo PHP_EOL;
}
