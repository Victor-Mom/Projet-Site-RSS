<?php
	class AdminGateway {
		private $con;

		public function __construct(Connection $con) {
			$this->con = $con;
		}

		public function addUser(){
			$user = filter_var($_POST['Pseudo'], FILTER_SANITIZE_STRING);
			$password = password_hash(filter_var($_POST['password'],FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);

            if(strcmp(filter_var($_POST['password'],FILTER_SANITIZE_STRING),filter_var($_POST['passwordConfirm'],FILTER_SANITIZE_STRING)) !== 0){return false;}
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){return false;}
            else{
			    $query = "INSERT INTO `users`(`user`, `passwd`) VALUES ('$user','$password')";
			    try {
				    $_SESSION['role'] = 'admin';
				    $_SESSION['pseudo'] = $user;
				    $this->con->executeQuery($query, array(
					    ':user' => array($user, PDO::PARAM_STR)
				    ));
				    return true;
			    }catch (Exception $e){
				    return false;
			    }
            }
		}
		public function getLogin($user) {
			$query="SELECT user FROM users WHERE user=:user";
			$this->con->executeQuery($query,array(
				':user' => array($user, PDO::PARAM_STR)
			));

			$results=$this->con->getResults();
			return $results;
		}

		public function getPassword($user) {
			$query="SELECT passwd FROM users WHERE user=:user";
			$this->con->executeQuery($query,array(
				':user' => array($user, PDO::PARAM_STR)
			));

			$results=$this->con->getResults();
			return $results;
		}
	}
