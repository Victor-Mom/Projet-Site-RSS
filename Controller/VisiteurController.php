<?php

	class VisiteurController
	{

		function __construct()
		{
			global $rep, $vues, $action, $con;
			$dVueErreur = array();
			try {
				switch ($action) {
					case 'Login':
						require($rep.$vues['login']);
						break;
					case 'connexion':
						$verif = verification::connexionAdmin();
						if ($verif == true){
							$news = new FluxGateway();
							$data = $news->getAllFlux();
							require($rep.$vues['admin']);
						}else {
							$taberr = "Utilisateur inconnu";
							require($rep . $vues['login']);
						}
					break;
					case 'creer un compte' :
					    require($rep.$vues['compteNouv']);
						break;
                    case 'Valider':

                        $Ag = new AdminGateway($con);
                        if($Ag->addUser() == true){
                            ?>
                                <script>
                                    alert("<?php echo htmlspecialchars('Votre compte est crée', ENT_QUOTES); ?>")
                                </script>
                            <?php
                            $_SESSION['role'] = 'admin';
                            $_SESSION['pseudo'] = $_POST['Pseudo'];
                            $news = new FluxGateway();
                            $data = $news->getAllFlux();
                            require($rep.$vues['admin']);
                        }else {
                            $taberr = "Vos mot de passe ne correspondent pas";
                            require($rep . $vues['compteNouv']);
                        }
                        break;
					default:
						$news = new FluxGateway();
						$data = $news->getAllFlux();
						require ($rep.$vues['acc']);
						break;
				}
			} catch (PDOException $e) {
				$dVueErreur[] = "Erreur base de données !";
				require($rep . $vues['erreur']);
			} catch (Exception $e) {
				$dVueErreur[] = "Erreur générale !";
				require($rep . $vues['erreur']);
			}
		}



	}