<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="View/css/nouveauLogin.css" type="text/css"/>
    <link rel="stylesheet" href="View/css/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">

</head>
<body class="bg-dark">
<div class="bg-dark login-box" >
    <h1 class="text-warning">Registration</h1>

    <div>
        <form method="POST" autocomplete="off">
            <span></span>
            <div class="user-box">

                <input class="rounded" name="Pseudo" type="text" required placeholder="Pseudo">
                <input class="rounded" name="password" type="password" required placeholder="Password"  autocomplete="new-password" >
                <input class="rounded" name="passwordConfirm" type="password" required placeholder="Confirm Password" >
                <input class="rounded " name="email" type="email" required placeholder="Email">

            </div>



            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <div class="text-center">
            <div class="button-login">
                <input class="form-submit-button" type="submit" name="action" value="Valider">
                <br/>
                <a class="form-submit-button" href="index.php">retour</a>
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
