<?php
namespace App\Entity;
use App\Interface\PartieInterface;


#[\AllowDynamicProperties] // Autorise les propriétés dynamiques ; car ne connaissant pas le nombre de participants à l'avance, il est impossible de déterminer le nombre de propriétés à déclarer
final class Partie implements PartieInterface{

	protected int $objectif;
	protected int $participants = 0;
    protected bool $bonus;
    protected bool $malus;

    public function __construct(string $objectif)
    {
        $this->objectif = $objectif;
    }

    public function getObjectif() : int
    {
        return $this->objectif;
    }

    public function getParticipants() : int
    {
        return $this->participants;
    }
    
    public function addParticipant(object $j) : object
    {
        $this->participants++;
        $joueur = 'j'.$this->getParticipants();
        return $this->{$joueur} = $j;
        
    }

    public function getBonus() : bool
    {
        return $this->bonus;
    }
    
    public function setBonus(bool $bonus) : bool
    {
        $this->bonus = $bonus;
        return $this->bonus;
    }
    public function getMalus() : bool
    {
        return $this->malus;
    }
    
    public function setMalus(bool $malus) : bool
    {
        $this->malus = $malus;
        return $this->malus;
    }
}