<?php

namespace App\Tests;

use App\Entity\Partie;
use App\Entity\Joueur;
use PHPUnit\Framework\TestCase;

final class PartieTest extends TestCase
{
	public function testAddParticipant() : void
	{
		$partie = new partie(100);
		$joueur = new Joueur('Jean');
		$this->assertInstanceOf(Joueur::class, $partie->addParticipant($joueur));
	}

	public function testSetBonus() : void
	{
		$partie = new Partie(100);
		$this->AssertTrue($partie->setBonus(true));
	}

	public function testSetMalus() : void
	{
		$partie = new Partie(100);
		$this->AssertTrue($partie->setMalus(true));
	}
}