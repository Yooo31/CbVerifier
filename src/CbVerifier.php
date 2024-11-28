<?php

namespace App\Services;

class CbVerifier
{
    function Luhn($numero, $longueur)
    {
        if (strlen($numero) == $longueur && preg_match(
            "#[0-9]{" . $longueur . "}#i",
            $numero
        )) {
            return true;
        } else {
            return false;
        }
    }
}
