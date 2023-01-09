<?php

namespace App\Tests;

use App\Entity\Abstract\AnstractJoueur;
use App\Entity\Tricheur;
use App\Interface\AtoutInterface;
use PHPUnit\Framework\TestCase;

final class TricheurTest extends TestCase
{
	public function testAtout() : void
	{
		$tricheur = new Tricheur('Test');
		$this->assertIsArray($tricheur->atout());
	}
}