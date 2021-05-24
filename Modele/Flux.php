<?php


	class Flux
	{
		private $nom;
		private $url;

		public function __construct(String $nom, String $url){
			$this->nom = $nom;
			$this->url = $url;

		}

		// SETTERS
		public function setNom($nom){
			if (is_string($nom)){
				$this->nom = $nom;
			}
		}

		public function setUrl($url){
			if(is_string($url)){
				$this->url = $url;
			}
		}

		//GETTERS
		public function getNom()
		{
			return $this->nom;
		}



		public function getUrl()
		{
			return $this->url;
		}
	}

