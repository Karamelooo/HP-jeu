<?php

namespace App\Entity;

use App\Entity\Abstract\AbstractJoueur;

final class Regulier extends AbstractJoueur {

    public function __construct(string $nom)
    {
        $this->nom = $nom;
		$this->atout = "Régulier";
    }

	public function atout() : array
	{
		$main = [rand(0,1),rand(0,1),rand(0,1)];
		for($i = 0; $i <= count($main)-1; $i++)
		{
			if($main[$i] === 0)
			{
				$main[$i] = 1;
			}
			else if($main[$i] === 1)
			{
				$main[$i] = 6;
			}
		}
		return $main;
	}
}