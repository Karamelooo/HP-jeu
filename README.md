Déroulement du jeu :

	À chaque manche, tous les participants piochent des cartes pour se constituer une main. La pioche de chaque participant est différente en fonction de leurs atouts.

	Le Joueur pioche 3 cartes qui peuvent valoir entre 1 et 6/
	Le Régulier pioche 3 cartes qui peuvent valoir soit 1, soit 6.
	Le tricheur pioche 4 cartes, mais la première peut valoir entre -6 et 6.
	Le chanceux pioche 3 cartes qui peuvent valoir entre -3 et 10.

	Pour gagner, un participant doit atteindre ou dépasser le nombre de points fixé par l'objectif (argument de la classe Partie)

	Il est possible de fixer 2 règles supplémentaires :
		setMalus : accorde un malus au premier de chaque manche. Si cette règle est activée, le premier se verra retirer sa dernière carte.
		setBonus : accorde un bonus au dernier de chaque manche. Si cette règle est activée, le dernier se verra attribuer une carte supplémentaire (qui vaut entre 1 et 6).

Explications du code :

	Chaque type de joueur est une entité et donc une classe.
	Les classes de types de joueur implémentent l'interface AtoutInterface, qui les oblige à utiliser une fonction atout() pour les distinguer des autres classes et les faire fonctionner dans le jeu.
	Ces classes héritent de la classe abstraite AbstractJoueur, qui définit toutes les propriétés, getter et setter communs à tous les types de joueur.

	La partie est une entité et implémente l'interface PartieInterface, qui l'oblige à utiliser la fonction addParticipant. Car sans participant, une partie ne peut pas se jouer.

	Au lancement du script dans index.php, on déclare une nouvelle partie avec un objectif à atteindre en paramètre.
	On déclare ensuite tous les participants grâce à la fonction addParticipant de la class Partie en mettant en argument une instance d'un type de joueur.
	Cette fonction utilise les propriétés dynamiques : on ne connait pas à l'avance le nombre de joueurs, alors on déclare une propriété dans la class Partie à chaque fois que l'on déclare un nouveau joueur.

	On déclare les règles du jeu avant de lancer la partie dans le Controller.

	Dans le PartieController, on a 3 fonctions :
		LancerJeu() qui initialise les variables du jeu et qui appelle JeuEnCours()
		JeuEnCours() qui exécute le déroulement de chaque manche et encapsule les logs de la manche en cours dans le tableau $manche_log
		Lorsqu'un gagnant est détécté, elle arrête d'éxecuter le jeu et appelle la fonction FinDuJeu()
		FinDuJeu() retourne le classement final en fonction de la position de chaque joueur

	À la fin du jeu, on affiche la vue en appelant le fichier homepage.php et qui utilise les logs pour afficher le résultat et le déroulé de chaque manche
