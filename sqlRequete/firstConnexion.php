<?php 

    $nom = $_POST['username'];
    $password = md5($_POST['password']);
    $checkifExiste = false;
    
    $connect = new PDO('mysql:host=localhost;dbname=website', 'root', '0000');
    $requete = $connect->prepare("SELECT * FROM users INNER JOIN role ON users.idType = role.idType");
    $requete->execute();
    $users = $requete->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        if($nom == $user['username']) {
            $checkifExiste = true; 
            header('Location: ../créerUtilisateur.php');
        }
    }
    if( $checkifExiste == false) {
        $requete = "INSERT INTO users (username, password, idType) VALUES('$nom', '$password', '3')";
        $requete_preparee = $connect->prepare($requete);
        $requete_preparee->execute();
        session_start();
        $_SESSION['user']=$user; 
        header('Location: ../index.php');
    }
