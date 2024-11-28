<?php

require 'src/Enigma.php';

use App\Services\Enigma;

$enigma = new Enigma();

// Test d'encryptage
$text = "Hey";
$encrypted = $enigma->enigmify($text);
echo "Texte encrypté : $encrypted\n";
$encrypted = $enigma->enigmify($text);
echo "Texte encrypté : $encrypted\n";
$encrypted = $enigma->enigmify($text);
echo "Texte encrypté : $encrypted\n";

// Test de décryptage
$decrypted = $enigma->denigmify($encrypted);
echo "Texte décrypté : $decrypted\n";
