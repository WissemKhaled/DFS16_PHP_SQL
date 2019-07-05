<?php

require_once("./sqlRequete/db.php");
if ($_SESSION) {
  include('./headerLogOn.php');
} else {
  include('./header.php');
}
?>


<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <h1 class="my-4">Actualité</h1>
      <?php foreach ($allPost as $post) : ?>
        <div class="card mb-4">
          <h3 class="card-title"> <?= $post['title'] ?> </h3>
          <div class="image_style">
            <img src="./css/photos/<?= $post['photo'] ?>" />
          </div>
          <div class="card-body">
            <p class="card-text"> <?= $post['commentaire'] ?> </p>
            <?php if ($_SESSION && ($post['idUser'] == $_SESSION['user']['idUser']  || $_SESSION['user']["type"] == 'admin' || $_SESSION['user']["type"] == 'modérateur')) : ?>
              <a href="modifier.php?idPost=<?= $post['idPost'] ?>" class="btn btn-primary">Modifier</a>
              <a href="sqlRequete/delete.php?idPost=<?= $post['idPost'] ?>" class="btn btn-danger">Supprimer</a>
            <?php endif ?>
          </div>
          <div class="card-footer text-muted">
            <p> Posted on <?= $post['date_upload'] ?> </p>
          </div>
        </div>
      <?php endforeach ?>
      <!-- Pagination -->
    </div>
  </div>
</div>
<!-- /.container -->

<?php include('./footer.php') ?>