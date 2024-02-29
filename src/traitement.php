<?php
require_once 'config.php';
require_once 'classes/Database.php';
require_once 'classes/User.php';

$Database = new Database();
$errorMessages = [];

if (isset($_POST['telephone']) && is_numeric($_POST['telephone']) && !empty($_POST['telephone'])) {

    if (strlen($_POST['telephone']) >= 10) {
        $telephone = htmlspecialchars($_POST['telephone']);
    } else {
        header('location:../index.php?erreur=' . ERREUR_TELEPHONE);
    die;
}

}

if(isset($_POST['password']) && isset($_POST['password2'])){
    if (!empty($_POST['password']) && !empty($_POST['password2'])){
        if ($_POST['password'] === $_POST['password2']){
            if (strlen($_POST['password'])>= 8){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }else {
                header ('location:../index.php?erreur=ERREUR_PASSWORD_TAILLE');
                die;
            }
        }else {
            header ('location:../index.php?erreur=ERREUR_PASSWORD_IDENTIQUE');
            die;
        }
    }
}

if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adressePostale']) &&   
    !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['adressePostale'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adressePostale = htmlspecialchars($_POST['adressePostale']);
      
 if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST['email']);
    } else{
        header('location:../index.php?erreur=' . ERREUR_EMAIL);
        die;
             }
             
        // Tout s'est bien passé, on peut instancier notre utilisateur :
 $user = new User($nom, $prenom, $email, $password, $telephone, $adressePostale);
 $retour = $Database->saveUtilisateur($user);

if ($retour) {
    header('location:../connexion.php?succes=inscription');  
      exit;
    } else {
    header('location:../index.php?erreur=' . ERREUR_ENREGISTREMENT);
    die;
     }
 }
    
 else {
        header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
        die;
}

if (!empty($errorMessages)) {
    foreach ($errorMessages as $error) {
        echo $error . "<br>";
    }
}
