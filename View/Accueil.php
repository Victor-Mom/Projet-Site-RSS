<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css"/>
	<link rel="stylesheet" href="css/footer.css">
    <title></title>

</head>
<body class="bg-dark" >
<?php require_once "Header.php"; ?>
<div class="container-fluid bg-white bg-gradient p-5">
	<div class="row">
		<h2>BIENVENUE</h2>
		<h4>Retrouvez sur ce site toutes les dernières news de vos sites préférés.</h4>
	</div>
	<div class="row">
				<?php require "Modele/XMLParser.php"?>
	</div>
	</div>
</body>

<footer class="site-footer text-warning">
    <div class="container">
        <div class="row">

        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by Victor Mommalier</p>

            </div>
        </div>
    </div>
</footer>
</html>