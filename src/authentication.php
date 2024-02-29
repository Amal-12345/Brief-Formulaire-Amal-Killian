<?php
session_start();
require 'classes/Database.php';
require 'classes/User.php';
$Database = new Database();

// Formulaire de connexion soumis :
if (isset($_POST['mail']) && isset($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['password'])) {

  $mail = htmlspecialchars($_POST['mail']);

  $userAvecCeMail = $Database->getThisUtilisateurByMail($mail);

  if ($userAvecCeMail) {
    if (password_verify($_POST['password'], $userAvecCeMail->getPassword())) {
      $_SESSION['connecté'] = TRUE;
      $_SESSION['user'] = serialize($userAvecCeMail);
      header('location: ../tableau-de-bord.php');
      die;
    }
  }

}

// Si on arrive là c'est que quelque chose s'est mal passé.
// Afin d'éviter de donner des indications sur la nature de l'échec à l'utilisateur,
// on lui renvoie une erreur générale.
header('location: ../connexion.php?erreur');
die;
