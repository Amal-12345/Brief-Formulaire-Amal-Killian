<?php
session_start();

if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
  // 
  header('location:tableau-admin.php');
  die;
}

$succes = null;
$echec = null;
if (isset($_GET['succes']) && $_GET['succes'] === "inscription") {
  $succes = true;
}
if (isset($_GET['erreur'])) {
  $echec = true;
}

include "includes/header.php";
?>
<link rel="stylesheet" href="./assets/style.css">
  <form action="src/authentication.php" method="post" onsubmit=" return ValidationConnexion()">
    <h1>Connexion</h1>
    <?php if ($succes) { ?>
      <div class="message succes">
        Votre réservation est validée ! <br>
        Maintenant vous pouvez vous connecter pour consulter toutes vos réservations.
      </div>
    <?php } ?>
    <div class="input-group">
    <label for="mail">Mail :</label>
    <input type="email" class="input-group" name="mail" id="mail" required>
    </div>
    <div class="input-group">
    <label for="password">Mot de passe :</label>
    <input type="password" class="input-group" name="password" id="password" required>
    </div>
    <div id="message"></div>
    <?php if ($echec) { ?>
      <div class="message echec">
        Mot de passe ou email invalide.
      </div>
    <?php } ?>
    <input type="submit" value="Se connecter">
  </form>
  </html>