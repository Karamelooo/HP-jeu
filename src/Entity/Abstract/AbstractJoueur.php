<?php

namespace App\Entity\Abstract;
use App\Interface\AtoutInterface;
use App\Entity\Partie;

abstract class AbstractJoueur implements AtoutInterface
{
	protected string $nom;
	protected array $main;
	protected int $score = 0;
	protected string $atout;
	protected bool $premier = false;
	protected bool $dernier = false;

	public function __construct(string $nom)
	{
		$this->nom = $nom;
	}

    public function getNom() : string
    {
        return $this->nom;
    }

    public function getMain() : array
    {
        return $this->main;
    }

    public function getScore() : int
    {
        return $this->score;
    }

    public function getAtout() : string
    {
        return $this->atout;
    }

    public function setMain() : self
    {
		$main = $this->atout();
		if($this->premier)
		{// Si le joueur est premier, retire 1 carte
			array_pop($main);
		}
		else if($this->dernier)
		{ // Si le joueur est dernier, ajoute 1 carte
			array_push($main, rand(1,6));
		}
        $this->main = $main;
		$this->setScore($main);
        return $this;
    }

    public function setScore(array $main) : self
    {
        $this->score += array_sum($main);
        return $this;
    }

    public function setPremier(bool $premier) : self
    {
        $this->premier = $premier;
        return $this;
    }

    public function setDernier(bool $dernier) : self
    {
        $this->dernier = $dernier;
        return $this;
    }
}