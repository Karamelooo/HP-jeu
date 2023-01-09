<?php

namespace App\Tests;

use App\Entity\Abstract\AnstractJoueur;
use App\Entity\Joueur;
use App\Interface\AtoutInterface;
use PHPUnit\Framework\TestCase;

final class JoueurTest extends TestCase
{
	public function testAtout() : void
	{
		$joueur = new Joueur('Test');
		$this->assertIsArray($joueur->atout());
	}
}