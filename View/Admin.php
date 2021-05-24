<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap-5.0.0-beta1-dist/css/bootstrap.css">
	<link rel="stylesheet" href="css/nouveauLogin.css">
	<title>Form</title>
</head>

<body class="bg-dark">
<?php require_once "Header.php";
	global $action; ?>
<div class="container">
	<div class="col-lg-10 col-xl-5 mx-auto">
        <h1 class="h2 text-capitalize text-center text-warning">Paramètre</h1>
		<div class=" col card flex-row my-4">
			<div class="card-body">


				<!-- NOMBRE DE NEWS-->
				<h2 class="h2">Affichage</h2>
				<form class="form-signin mt-4" method="post">
					<label class="form-label text-decoration-underline">Nombre de news affichées actuellement :
                        <?php
                            if(isset($_COOKIE['nbNews'])){
                                echo $_COOKIE['nbNews'];
                            }else echo "10";

						?></label><br>
					<label class="form-label">Nombre de News a afficher</label>
					<input name="nbNews" id="nbNews" class="form-control" placeholder=" 0 - 1000" required autofocus>
                    <div class="text-center">
					<input class="btn btn-primary mt-2" type="submit" name="action" value="Mettre à jour">
					<input name="action" value="maj" type="hidden">
                    </div>
				</form>
				<hr>

				<!-- AJOUT DE FLUX -->
				<h2 class="h2">Ajout de Flux</h2>
				<form class="form-signin" method="post">
					<div class="form-label-group text-center">
						<label class="form-label"></label>
						<input class="form-control" id="AjoutFNom" placeholder="Ex : Netflix" name="AjoutFNom" required>
						<label class="form-label mt-2"></label>
						<input class="form-control" placeholder="Url Flux" name="AjoutFUrl" required>
						<input class="btn btn-primary mt-2" type="submit" name="action" value="Inserer le flux">
						<input name="action" value="insert" type="hidden">

					</div>
				</form>
			</div>
		</div>


		<!-- TABLEAU AVEC POSSIBILITE SUPRESSION NEWS -->
		<div class="col">
			<h2 class="text-warning text-center">Flux actifs</h2>

			<table class="table table-dark table-hover">
				<thead>
				<th scope="col">Titre</th>
				<th scope="col">Url du Flux</th>
				</thead>
				<?php
					global $nbN, $action;
					if(isset($data)){
					foreach ($data as $flux) { ?>
						<tr>
							<td><?php echo $flux->getNom(); ?></td>
							<td><?php echo $flux->getUrl(); ?></td>
						</tr>
					<?php }} ?>
			</table>
			<h4 class="text-warning text-center">Pour supprimer un flux, entrez son nom puis appuyer sur le bouton de supression.</h4>
			<form class="form-signin" method="post">
				<div class="form-label-group text-center">
					<label class="form-label">Supprimer un flux</label>
					<input class="form-control" id="AjoutFNom" placeholder="Ex : Netflix" name="SupprFlux" required>
					<input class="btn btn-danger mt-2" type="submit" name="action" value="Supprimer le flux">
					<input class="mt-5" name="action" value="SupprimerFlux" type="hidden">

				</div>
			</form>

		</div>
	</div>
</div>
</body>
