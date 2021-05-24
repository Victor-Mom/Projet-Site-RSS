<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="View/css/nouveauLogin.css" type="text/css"/>
    <link rel="stylesheet" href="View/css/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">

</head>
<body class="bg-dark">
    <div class="bg-dark login-box" >
        <h1 class="text-warning">Login</h1>

        <div>
			<form method="POST">
                <span></span>
                <div class="user-box">
                    <input class="rounded" name="Pseudo" id="Pseudo" type="text" placeholder="Pseudo" >
                </div>
                <div class="user-box">
                    <input class="rounded" name="password" id="password" type="password" placeholder="Password" >
                </div>


                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="text-center">
                <div class="button-login">
                    <input class="form-submit-button" type="submit" name="action" value="connexion" >
                    <input class="form-submit-button" type="submit" name="action" value="creer un compte">
                    <a class="form-submit-button" href="index.php">Accueil</a>
                </div>
                </div>


				<?php
					if (isset($taberr)) {
						if (!empty($taberr)) {
							echo "<p >$taberr</p>";
						}
					}
				?>
			</form>
        </div>
	</div>
</body>
</html>