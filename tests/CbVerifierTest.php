<?php

declare(strict_types=1);

use App\Services\CbVerifier;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/CbVerifier.php';

class CbVerifierTest extends TestCase
{
  private CbVerifier $verifier;

  protected function setUp(): void
  {
    $this->verifier = new CbVerifier();
  }

  public function testLength(): void
  {
    $this->assertTrue($this->verifier->Luhn('1234567890123456', 16));
    $this->assertFalse($this->verifier->Luhn('123456789012345', 16));
  }

  public function testCharacter(): void
  {
    $this->assertTrue($this->verifier->Luhn('1234567890123456', 16));
    $this->assertFalse($this->verifier->Luhn('1234567890aaaaaa', 16));
  }

  public function testValidCard(): void
  {
    $this->assertTrue($this->verifier->Luhn('4603433767975432', 16));
    $this->assertFalse($this->verifier->Luhn('1234567890123456', 16));
  }
}
