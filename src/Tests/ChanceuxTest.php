<?php

namespace App\Tests;

use App\Entity\Abstract\AnstractJoueur;
use App\Entity\Chanceux;
use App\Interface\AtoutInterface;
use PHPUnit\Framework\TestCase;

final class ChanceuxTest extends TestCase
{
	public function testAtout() : void
	{
		$chanceux = new Chanceux('Test');
		$this->assertIsArray($chanceux->atout());
	}
}