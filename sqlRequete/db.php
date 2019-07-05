<?php
session_start();
// $id = $_POST['id'];


$user = 'root';
$pass = '0000';
$connect = new PDO('mysql:host=localhost;dbname=website', $user, $pass);
$requete = $connect->prepare("SELECT * FROM post");
$requete->execute();

$allPost = $requete->fetchAll(PDO::FETCH_ASSOC);




//$requete->bindParam(":id", $id);po
//$requete->bindParam(":title", $title);
