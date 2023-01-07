
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Jeu de hasard en POO par Hugo PETIT">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Hugo PETIT">
		<link rel="stylesheet" href="css/style.css">
		<title>Jeu de hasard en POO par Hugo PETIT</title>
	</head>
	<body>
		<header id="global-header">
		</header>
		<main id="main-homepage">
			<section id="manche">
<?php for ($i = 1; $i <= sizeOf($partie_log); $i++)
			{
				if(is_string($partie_log[$i]))
				{?>
			<div>
				<h2>Manche <?= $i ?>:</h2>
				<?= $partie_log[$i] ?>
			</div>
<?php
				}
				else
				{
?>
			<div id="classement">
				<h2>Classement :</h2>
<?php				foreach ($partie_log[$i] as $key => $value)
					{
				echo $value;
					}?>
			</div>
<?php
				}
			}
			?>
			</section>
		</main>
		<footer id="global-footer">
		</footer>
	</body>
</html>