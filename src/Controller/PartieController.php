<?php
namespace App\Controller;
use App\Entity\Abstract\AbstractJoueur;
use App\Entity\Joueur;
use App\Entity\Regulier;
use App\Entity\Tricheur;
use App\Entity\Chanceux;

final class PartieController {

    protected object $partie;

    public function __construct(object $partie)
    {
        $this->partie = $partie;
    }

    public function LancerJeu() : array
    { // Initialise les variables qui seront modifiées durant le jeu
        $gagnant = false;
        $premier = '';
        $dernier = '';
        $manche = 1;
        $tableau_score = [];
        $partie_log = $this->JeuEnCours($gagnant, $premier, $dernier, $manche, $tableau_score);
        return $partie_log;
    }
    
    public function JeuEnCours(bool $gagnant, string $premier, string $dernier, int $manche, array $tableau_score) : array
    {
        $partie = $this->partie;
        while($gagnant === false) // La partie continue tant qu'il n'y a pas de gagnant
        {
            $manche_log[$manche] = "";
            for ($i=1; $i <= $partie->getParticipants(); $i++)
            { // Chaque participant tire ses cartes chacun son tour durant la manche
                $joueur = 'j'.$i;
                if($partie->getMalus() === true && $premier == $partie->{$joueur}->getNom())
                { // Si le participant est premier, il tire une carte de moins
                    $partie->{$joueur}->setPremier(true);
                    $manche_log[$manche] .= "<strong>".$partie->{$joueur}->getNom()."</strong> est premier, il pioche une carte de moins<br>";
                }
                if($partie->getBonus() === true && $dernier == $partie->{$joueur}->getNom())
                { // Si le participant est dernier, il tire une carte de plus
                    $partie->{$joueur}->setDernier(true);
                    $manche_log[$manche] .= "<strong>".$partie->{$joueur}->getNom()."</strong> est dernier, il pioche une carte supplémentaire<br>";
                }
                $partie->{$joueur}->setMain();
                $partie->{$joueur}->setPremier(false);
                $partie->{$joueur}->setDernier(false);
                $manche_log[$manche] .= "Main de <strong>".$partie->{$joueur}->getNom() . "</strong> : " . implode(", ", $partie->{$joueur}->getMain()) . "<br>";
                
                $manche_log[$manche] .= "<strong>".$partie->{$joueur}->getNom() ."</strong> le <em>".$partie->{$joueur}->getAtout()."</em> a obtenu un score de ". array_sum($partie->{$joueur}->getMain()) ." (Total : ".$partie->{$joueur}->getScore().")<br><br>";
            $tableau_score[$partie->{$joueur}->getNom()] = $partie->{$joueur}->getScore();
                if($partie->{$joueur}->getScore() >= $partie->getObjectif())
                {
                    $gagnant = true; // Il y a au moins 1 gagnant
                }
            }
            $premier = array_search(max($tableau_score), $tableau_score); // Définit le premier de la manche
            $dernier = array_search(min($tableau_score), $tableau_score); // Définit le dernier de la manche
            $manche++;
        }
        $manche_log[$manche] = $this->FinDuJeu($tableau_score); // Ajoute le tableau des scores dans la dernière case du tableau
        return $manche_log;
    }

    public function FinDuJeu(array $tableau_score) : array
    {
        arsort($tableau_score);
        $classement = [];
        $i=1;
        foreach($tableau_score as $joueur => $score)
        {
           $classement[$i] = "<strong>$joueur</strong> arrive sur la place n°$i avec un score de $score<br><br>";
            $i++;
        }
        return $classement;
    }
}