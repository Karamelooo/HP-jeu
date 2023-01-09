<?php
namespace App;
require_once __DIR__ . '/../vendor/autoload.php';

use App\Tests\PartieTest;
use App\Tests\JoueurTest;
use App\Tests\TricheurTest;
use App\Tests\ChanceuxTest;
use App\Tests\RegulierTest;

use App\Entity\Abstract\AbstractJoueur;
use App\Entity\Joueur;
use App\Entity\Regulier;
use App\Entity\Tricheur;
use App\Entity\Chanceux;
use App\Entity\Partie;
use App\Controller\PartieController;

$partie = new Partie(50); // La partie s'arrête lorsqu'un joueur atteint ou dépasse l'objectif en argument

// Déclaration de chaque participant : on les ajoute directement dans notre partie. On peut en déclarer autant que l'on souhaite

// Joueur : pioche entre 1 et 6
// Régulier : pioche 1 ou 6
// Tricheur : tire 1 carte en plus mais peut être un malus (entre -6 et 6)
// Chanceux : pioche entre -3 et 10

$partie->addParticipant(new Joueur("Jean"));
$partie->addParticipant(new Regulier("Jacques"));
$partie->addParticipant(new Tricheur("Philippe"));
$partie->addParticipant(new Chanceux("Pierre"));

// Déclaration des paramètres du jeu

$partie->setMalus(true); // Accorder un malus au premier de chaque manche. "false" désactive la règle
$partie->setBonus(true); // Accorder un bonus au dernier de chaque manche. "false" désactive la règle

$partieController = new PartieController($partie); // On déclare la partie à lancer dans le contrôleur

$partie_log = $partieController->lancerJeu(); // On lance le jeu

// Tests Partie
$partieTest = new partieTest();
$partieTest->testAddParticipant();
$partieTest->testSetBonus();
$partieTest->testSetMalus();

// Teste les atouts des différents types de joueur
$joueurTest = new JoueurTest();
$joueurTest->testAtout();

$tricheurTest = new TricheurTest();
$tricheurTest->testAtout();

$chanceuxText = new ChanceuxTest();
$chanceuxText->testAtout();

$regulierTest = new RegulierTest();
$regulierTest->testAtout();

require_once('../templates/homepage.php'); // Affichage de la vue