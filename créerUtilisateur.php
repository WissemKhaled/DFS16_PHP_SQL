<?php require_once("./sqlRequete/db.php");
if ($_SESSION) {
    include('./headerLogOn.php');
} else {
    include('./header.php');
} ?>

<div class="form">
    <div class="wrapper">
        <h2>Créer ton compte</h2>
        <form action="sqlRequete/firstConnexion.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>As-tu déjà un compte ? <a href="identifier.php">Connecte-toi ici</a>.</p>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>