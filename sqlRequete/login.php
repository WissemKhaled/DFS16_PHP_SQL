<?php 
    if (isset($_POST['username'])) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
    }

    $nom = $_POST['username'];
    $password = $_POST['password'];
    $checkifExiste = false;
    
    $_SESSION["username"] = $nom;
    
    $connect = new PDO('mysql:host=localhost;dbname=website', 'root', '0000');
    $requete = $connect->prepare("SELECT * FROM users INNER JOIN role ON users.idType = role.idType");
    $requete->execute();
    $users = $requete->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        if($nom == $user['username'] && md5($password) == $user['password']) {
            $checkifExiste = true; 
            session_start();
            $_SESSION['user']=$user;
            header('Location: ../index.php');
            
        }
    }
    if ($checkifExiste == false) {
        header('Location: ../identifier.php');
        echo("<script> alert('Wrong username or password'); </script>");   
    }
