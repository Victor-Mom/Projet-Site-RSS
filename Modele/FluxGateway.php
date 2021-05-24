<?php
	require_once "Connexion.php";
	require 'Flux.php';


	class FluxGateway
	{
		private $conex;

		public function __construct()
		{
			global  $con;
			$this->conex = $con;
		}

		public function AjoutFlux(Flux $f1)
		{
			$Nom = $f1->getNom();
			$Url = $f1->getUrl();
			$this->conex->executeQuery("INSERT INTO `flux`(`nom`, `url`) VALUES ('$Nom','$Url')");
		}

		public function Supressionflux(string $name){

			$req = $this->conex->prepare("DELETE FROM flux WHERE nom = :name");
			$req->bindParam(':name', $name, PDO::PARAM_STR);
			$req->execute();
		}

		public function getAllFlux()
		{
			$this->conex->executeQuery("SELECT * FROM flux");
			$results = $this->conex->getResults();
			$tab_Flux = [];
			foreach ($results as $row) {
				$tab_Flux[] = new Flux($row['nom'], $row['url']);
			}
			return $tab_Flux;

		}
	}