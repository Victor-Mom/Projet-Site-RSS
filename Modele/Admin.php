<?php


	class Admin
	{
		function __construct()
		{
			global $con;
			$this->ag = new AdminGateway($con);
		}

		function connexion($user, $passwd)
		{
			$loginFromDataBase = $this->ag->getLogin($user);
			$passwordFromDataBase = $this->ag->getPassword($user);

			if (password_verify($passwd, $passwordFromDataBase)) {
				$_SESSION['role'] = "admin";
				$_SESSION['pseudo'] = $user;
			} else {
				$dVueErreur[] = "Login ou mot de passe incorrect";
				throw new Exception("Login ou mot de passe incorrect", 1);
			}
		}

		function deconnexion()
		{
			$_SESSION = array();
			session_unset();
			session_destroy();
		}

		function isAdmin()
		{
			if (isset($_SESSION['pseudo']) && isset($_SESSION['role'])) {
				$role = filter_var($_SESSION['role'], FILTER_SANITIZE_STRING);
				$user = filter_var($_SESSION['pseudo'], FILTER_SANITIZE_STRING);
			} else {
				return NULL;
			}
		}
	}