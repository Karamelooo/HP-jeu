<?php

namespace App\Entity;

use App\Entity\Abstract\AbstractJoueur;
use App\Interface\AtoutInterface;

final class Chanceux extends AbstractJoueur implements AtoutInterface{

    public function __construct(string $nom)
    {
        $this->nom = $nom;
		$this->atout = "Chanceux";
    }

	public function atout() : array
	{
		$main = [rand(-3,10),rand(-3,10),rand(-3,10)];
		return $main;
	}
}