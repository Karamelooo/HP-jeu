<?php
namespace App\Entity;

use App\Entity\Abstract\AbstractJoueur;
use App\Interface\AtoutInterface;

final class Joueur extends AbstractJoueur implements AtoutInterface {

    public function __construct(string $nom)
    {
        $this->nom = $nom;
		$this->atout = "Joueur";
    }

	public function atout() : array
	{
		$main = [rand(1,6),rand(1,6),rand(1,6)];
		return $main;
	}
}