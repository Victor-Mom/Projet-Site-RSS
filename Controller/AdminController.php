<?php


	class AdminController
	{
		function __construct(){
			global $rep, $vues, $action, $nbN;
			$dataVueErreur = array();
			try {
				$action = $_REQUEST['action'];
				switch($action){

					case NULL:
						break;
					case "Admin":
						break;
					case "maj":
						setcookie("nbNews", $_POST['nbNews'], time()+365243600);
						?><script>alert("<?php echo "Vous affichez maintenant " . $_POST['nbNews'] . " News"; ?>")</script><?php
						break;
					case "insert":
						$fg = new FluxGateway();

						function getLastPartOfUrl($url) {
                            return basename(parse_url($url, PHP_URL_PATH));
                        }

                        function url_exists($url_a_tester)
                        {
                            $F=@fopen($url_a_tester,"r");

                            if($F)
                            {
                                fclose($F);
                                return true;
                            }
                            else return false;

                        }
                        $urlExplode = getLastPartOfUrl(filter_var($_POST['AjoutFUrl'],FILTER_SANITIZE_URL));
                        $url=filter_var($_POST['AjoutFUrl'],FILTER_SANITIZE_URL);
                        $nom = filter_var($_POST['AjoutFNom'],FILTER_SANITIZE_STRING);

                        if(filter_var($url, FILTER_VALIDATE_URL) === false){
                            ?>
                            <script>alert("Votre url n'est pas un flux rss:\r<?php echo $_POST['AjoutFUrl']; ?>")</script>
                            <?php
                            break;
                        }
						$fg->AjoutFlux(new Flux($nom,$url));
						?><script>alert("<?php echo $nom . htmlspecialchars(' : Ajouté', ENT_QUOTES); ?>")</script><?php
						break;
					case "SupprimerFlux" :
							$fg = new FluxGateway();
							$fg->SupressionFlux($_POST['SupprFlux']);
						?><script>alert("<?php echo $_POST['SupprFlux'] . htmlspecialchars(': Supprimé', ENT_QUOTES); ?>")</script><?php
							break;
					default:

						require($rep.$vues['erreur']);
						break;
				}
				$news = new FluxGateway();
				$data = $news->getAllFlux();
				require($rep.$vues['admin']);
			}
			catch (PDOException $e) {
				$dataVueErreur[] = "erreur innatendu !!";
				require($rep . $vues['erreur']);
			} catch (Exception $e2) {
				$dataVueErreur[] = "Erreur innatendu !!";
				require($rep . $vues['erreur']);
			}
		}
	}