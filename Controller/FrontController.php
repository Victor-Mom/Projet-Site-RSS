<?php

	class FrontController
	{
		function __construct()
		{
			global $rep, $vues, $action, $nbN;

			//ACTIONS ADMIN
			$listeAction_Admin = array('Logout','Admin', 'maj', 'insert', 'SupprimerFlux');


			session_start();
			if(!isset($_COOKIE['nbNews'])){
				$nbN = 20;
			}else
				$nbN = $_COOKIE['nbNews'] -1;
			// TABLEAU D'ERREURS
			$dataVueErreur = array();
			//$action = $_REQUEST['action'];
			try {
				//$isAdmin = new Admin();
				if (isset($_POST['action'])) {
					$action = $_REQUEST['action'];
				} else {
					$action = '';
				}
				if(isset($_SESSION['role']) && $action == "Logout" && $_SESSION['role'] == 'admin'){
					session_unset();
					$action = '';
				}
				if(in_array($action, $listeAction_Admin)){
					if($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])){
						require($rep.$vues['login']);
					}else{
						$admin = new AdminController();
					}
				}else{
					$user = new VisiteurController();
				}

			} catch (PDOException $e) {
				$dataVueErreur[] = "erreur innatendu !!";
				require($rep . $vues['erreur']);
			} catch (Exception $e2) {
				$dataVueErreur[] = "Erreur innatendu !!";
				require($rep . $vues['erreur']);
			}
		}
	}