<?php

	class verification
	{
		static function connexionAdmin(): bool
		{
			global $rep, $vues, $dsn, $login, $passwd;
			$taberr = array();

			// connexion à la base de données
			 // pas filter

			try {
				$db = new PDO($dsn, $login, $passwd);

				if (isset($_POST['Pseudo'], $_POST['password']) || $_POST['Pseudo'] != ""){
					$user =  filter_var($_POST['Pseudo'],FILTER_SANITIZE_STRING);
					$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
					$requete = "SELECT * FROM users where 
              user = '" . $user . "'";
					$stmt = $db->prepare($requete);
					$stmt->execute();
					$result = $stmt->fetchAll();
					foreach ($result as $r)
					{
						if (password_verify($password,$r['passwd']))
						{
							$_SESSION['role'] = 'admin';
							$_SESSION['pseudo'] = $user;
							return true;
						}
					}
				}
			} catch
			(PDOException $e) {
				require($rep.$vues['login']);
			}
		return false;
	}

	}


