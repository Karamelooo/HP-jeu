<?php

namespace App\Tests;

use App\Entity\Abstract\AnstractJoueur;
use App\Entity\Regulier;
use App\Interface\AtoutInterface;
use PHPUnit\Framework\TestCase;

final class RegulierTest extends TestCase
{
	public function testAtout() : void
	{
		$regulier = new Regulier('Test');
		$this->assertIsArray($regulier->atout());
	}
}