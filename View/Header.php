
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="View/css/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="View/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-md bg-dark navbar-dark">
	<a class=" h1 text-decoration-none ms-3 text-warning" href="index.php">Accueil</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	</div>
	<?php if(!isset($_SESSION['pseudo'])){ ?>
	<form method="post">
	<input type="submit"  value="Login" class="navbar-text btn btn-sm btn-outline-secondary me-3">
	<input name="action" value="Login" type="hidden">
	</form>
	<?php }
    if(isset($_SESSION['pseudo']) && $_SESSION['role'] == 'admin' && isset($_REQUEST['action']) != 'admin' ){ ?>
    <form method="post">
        <input type="submit" value="Admin" class="navbar-text btn btn-sm btn-outline-secondary me-3">
        <input name="action" value="Admin" type="hidden">
    </form>
    <?php }
    if(isset($_SESSION['pseudo']) && $_SESSION['role'] == 'admin'){ ?>
	<form method="post">
		<input type="submit"  value="Logout" class="navbar-text btn btn-sm btn-outline-secondary me-3">
		<input name="action" value="Logout" type="hidden">
	</form>
	<?php } ?>
</nav>

</body>
</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>