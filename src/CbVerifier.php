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
            for ($i = 0; $i < $longueur; $i++) {
                $tableauChiffresNumero[$i] = substr($numero, $i, 1);
            }

            $luhn = 0;
            for ($i = 0; $i < $longueur; $i++) {
                if ($i % 2 == 0) {
                    if (($tableauChiffresNumero[$i] * 2) > 9) {
                        $tableauChiffresNumero[$i] = ($tableauChiffresNumero[$i] * 2) - 9;
                    } else {
                        $tableauChiffresNumero[$i] = $tableauChiffresNumero[$i] * 2;
                    }
                }
                $luhn = $luhn + $tableauChiffresNumero[$i];
            }

            if ($luhn % 10 == 0) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }
}
