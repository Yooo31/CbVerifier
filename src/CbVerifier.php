<?php

namespace App\Services;

class CbVerifier
{
    function Luhn($numero, $longueur)
    {
        if (strlen($numero) == $longueur)
        {
            return true;
        } else {
            return false;
        }
    }
}
