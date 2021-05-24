<?php

//gen
	$rep=__DIR__.'/../';

// liste des modules à inclure


// NOMBRE NEWS
	$nbN = 10;

//BD
	$dsn="mysql:host=localhost;dbname=info";
	$login="victor";
	$passwd="pass123";

	$con = new Connection($dsn, $login, $passwd);

//Vues
	$vues['acc']='View/Accueil.php';
	$vues['verif']='Controller/verification.php';
	$vues['erreur']='View/erreur.php';
	$vues['login']='View/login.php';
	$vues['loginErr']='View/login.php?=erreur1';
	$vues['compteNouv']='View/creaCompte.php';

	$vues['admin']='View/Admin.php';
?>