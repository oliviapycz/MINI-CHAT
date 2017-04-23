<?php
session_start();
if (isset($_POST['pseudo'])) {
  $_SESSION['pseudo'] = $_POST['pseudo'];
}
$pseudo = $_POST['pseudo'];
$message = $_POST['message'];

try {
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'phpmyadmin','simplon');
} catch (Exception $e) {
  print "Erreur!:" .$e->getMessage() . "<br>";
  die();
}

$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_creation) VALUES(:pseudo, :message, NOW())');
$req->execute(array(
  'pseudo' => $pseudo,
  'message' => $message
));
header('Location:http://localhost/~olivia/mini_chat/minichat.php');
?>
