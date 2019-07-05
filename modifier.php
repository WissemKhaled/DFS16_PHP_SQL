<?php require_once("./sqlRequete/db.php");
    if ($_SESSION) {
        include('./headerLogOn.php');
    } else {
        include('./header.php');
    }
    $id = $_GET['idPost'];
    $user = 'root';
    $pass = '0000';
    $connect = new PDO('mysql:host=localhost;dbname=website', $user, $pass);
    $requete = $connect->prepare("SELECT * FROM post WHERE idPost='$id'");
    $requete->execute();
    $uniquePost = $requete->fetch(PDO::FETCH_ASSOC);
?>
<div class="form">
    <!-- Page Content -->
    <div class="container ajouter_style">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="addCss">
                <form action="sqlRequete/update.php?idPost=<?= $uniquePost['idPost'] ?>" method="POST" enctype="multipart/form-data">
                    <p>Titre de l'article:</p>
                    <input name="title" value="<?= $uniquePost['title'] ?>">
                    <input type="file" name="my_file" value="<?= $uniquePost['photo'] ?>">
                    <br /><br />
                    <textarea rows="10" cols="50" name="commentaire"><?= $uniquePost['commentaire'] ?></textarea>
                    <br /><br />
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('./footer.php') ?>