<?php require_once("./sqlRequete/db.php");
if ($_SESSION) {
    include('./headerLogOn.php');
} else {
    include('./header.php');
}
?>
<div class="form">
    <div class="wrapper">
        <h2> Connexion </h2>
        <form action="sqlRequete/login.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Your password..">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p> Pas de compte ? <a href="./créerUtilisateur.php">Créer un utilisateur</a>.</p>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>