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
<link rel="stylesheet" href="assets/style-connex.css">
  <form action="src/authentication.php" method="post" onsubmit=" return ValidationConnexion()">
  <fieldset id="connexion">
    <h1>Connexion</h1>
    <div class="input-group1">
    <label for="mail">Mail :</label>
    <input type="email" class="input-group1" name="mail" id="mail" required>
    </div>
    <div class="input-group1">
    <label for="password">Mot de passe :</label>
    <input type="password" class="input-group1" name="password" id="password" required>
    </div>
    <div id="message"></div>
    <?php if ($echec) { ?>
      <div class="message echec">
        Mot de passe ou email invalide.
      </div>
    <?php } ?>
<button class="bouton">Se connecter</button> 
 </form>
</fieldset>
  </html>