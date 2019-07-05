<?php
require_once("./sqlRequete/db.php");

include('./headerLogOn.php');
$id = "";
$user = 'root';
$pass = '0000';
$connect = new PDO('mysql:host=localhost;dbname=website', $user, $pass);
$requete = $connect->prepare("SELECT * FROM users   ");
$requete->execute();
$allUsers = $requete->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $onUser = $connect->prepare("SELECT * FROM users INNER JOIN role ON users.idType = role.idType WHERE idUser = '$id'");
    $onUser->execute();
    $userUnique = $onUser->fetch(PDO::FETCH_ASSOC);
}

?>


<div class="form">
    <div class="row_spe">
        <form action="" method="POST" class="form-admin">
            <fieldset>
                <legend>Choisissez un utilisateur</legend>
                <div class="form-group">
                    <select class="form-control" id="id" name="id">
                        <?php foreach ($allUsers as $user) : ?>
                            <option value="<?= $user['idUser'] ?>"><?= $user['username'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
        <?php if (isset($_POST['id'])) : ?>
            <div class="form-admin">
                <div class="card mb-4">
                    <h3 class="card-title"> <?= $userUnique['username'] ?> </h3>
                    <form action="sqlRequete/switchRole.php" method="POST" class="form_style">
                        <fieldset class="form-group">
                            <legend>Modifier Rôle</legend>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" <?php if ($userUnique['type'] == 'admin') : ?>checked="" <?php endif ?>>
                                    administrateur
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" <?php if ($userUnique['type'] === 'modo') : ?>checked="" <?php endif ?>>
                                    modérateur
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" <?php if ($userUnique['type'] == 'user') : ?>checked="" <?php endif ?>>
                                    utilisateur classique
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>








<?php include('./footer.php') ?>