<?php

declare(strict_types=1);

use App\Services\Enigma;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Enigma.php';

class EnigmaTest extends TestCase
{
  private Enigma $enigma;

  protected function setUp(): void
  {
    $this->enigma = new Enigma();
  }

  public function testEncryptAndDecryptSingleCharacter()
  {
    $char = 'A';
    $encrypted = $this->enigma->encryptCharacter($char);
    $decrypted = $this->enigma->decryptCharacter($encrypted);

    $this->assertEquals($char, $decrypted, "Le caractère déchiffré ne correspond pas au caractère original");
  }

  public function testEncryptAndDecryptString()
  {
    $string = "HelloWorld";
    $encrypted = $this->enigma->enigmify($string);
    $decrypted = $this->enigma->denigmify($encrypted);

    $this->assertEquals($string, $decrypted, "La chaîne déchiffrée ne correspond pas à la chaîne originale");
  }

  public function testEncryptCharacter()
  {
    $char = 'B';
    $encrypted = $this->enigma->encryptCharacter($char);

    $this->assertNotEmpty($encrypted, "Le caractère chiffré ne doit pas être vide");
    $this->assertNotEquals($char, $encrypted, "Le caractère chiffré ne doit pas être identique au caractère original");
  }

  public function testDecryptCharacter()
  {
    $char = 'H';
    $encrypted = $this->enigma->encryptCharacter($char);
    $decrypted = $this->enigma->decryptCharacter($encrypted);

    $this->assertEquals($char, $decrypted, "Le caractère déchiffré ne correspond pas au caractère original");
  }

  public function testCustomMachineCreation()
  {
    $machine = $this->enigma->make(3);

    $this->assertNotEmpty($machine, "La machine personnalisée ne doit pas être vide");
    $this->assertIsArray($machine, "La machine personnalisée doit être un tableau");
    $this->assertArrayHasKey('rotors', $machine, "La machine doit contenir des rotors");
  }

  public function testEncryptDecryptWithCustomMachine()
  {
    $this->enigma->make(3);
    $string = "EnigmaTest";
    $encrypted = $this->enigma->enigmify($string);
    $decrypted = $this->enigma->denigmify($encrypted);

    $this->assertEquals($string, $decrypted, "La chaîne déchiffrée ne correspond pas à la chaîne originale avec la machine personnalisée");
  }

  // The test est en FAIL volontairement car le programme ne respecte pas le fonctionnement inital de la machine
  public function testRandomisationWithRotor()
  {
    $string = "HelloWorld";
    $encrypted = $this->enigma->enigmify($string);
    $encrypted2 = $this->enigma->enigmify($string);

    $this->assertNotEquals($encrypted, $encrypted2, "2 chaînes chiffrées avec la même machine ne doivent pas être identiques");
  }
}
