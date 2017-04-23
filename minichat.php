<?php
session_start();


try {
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'phpmyadmin','simplon');
} catch (Exception $e) {
  print "Erreur!:" .$e->getMessage() . "<br>";
  die();
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TP MINI CHAT</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <img class="chaton" src="chat.jpg" alt="chaton">
      <h1>MINI CHAT</h1>
    </header>
    <section class="container1">
      <form class="" action="minichat_post.php" method="post">
        <fieldset>
          <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo'] ?>" placeholder="pseudo"> <br> <br>
          <textarea name="message" rows="8" cols="80" placeholder="votre message ici"></textarea>
          <input type="submit" name="" value="SUBMIT">
        </fieldset>
      </form>
    </section>
    <section class="container2">
      <div class="titre_commentaire">
        <h2>DERNIERS COMMENTAIRES</h2>
      </div>
<?php
    $reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_creation, "%d/%m/%Y %Hh%imin%ss") AS date_creation FROM minichat ORDER BY ID DESC LIMIT 0, 10');
      while ($donnees = $reponse->fetch()) { ?>
        <div class="commentaires">
          <div class="date_pseudo">
            <div class="date">
                <?php echo htmlspecialchars($donnees['date_creation']) ?>
            </div>
            <div class="pseudo">
              <?php echo htmlspecialchars($donnees['pseudo']) ?>
            </div>
          </div>
          <div class="message">
            <?php echo htmlspecialchars($donnees['message'])?>
          </div>
        </div>
        <?php
      }
?>
<div class="titre_commentaire">
  <h2> 1-10 > </h2>
</div>
    </section>
  </body>
</html>
