<?php

require 'src/CbVerifier.php';

use App\Services\CbVerifier;

$verifier = new CbVerifier();

// $numero = '1234567890123456';
$numero = '4603433767975432';
$longueur = 16;

if ($verifier->Luhn($numero, $longueur)) {
    echo 'N° de carte valide';
} else {
    echo 'N° de carte invalide';
}
