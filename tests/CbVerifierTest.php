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
}
