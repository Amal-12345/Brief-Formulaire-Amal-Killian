<?php
require_once 'config.php';
require_once 'classes/Database.php';
require_once 'classes/User.php';
require 'classes/Reservations.php';
require 'classes/DBReservation.php';

$DatabaseReservation = new DatabaseReservation();
$Database = new Database();
$errorMessages = [];

if ($_POST['passSelection'] == "les trois jours pour 100€" || "les trois jours pour 65€ (Tarif reduit)") {
    $_POST['passSelectionDate'] = "trois jours";
};

if (
    isset($_POST['nombrePlaces']) &&
    isset($_POST['passSelection']) &&
    isset($_POST['passSelectionDate']) &&
    !empty($_POST['nombrePlaces']) &&
    !empty($_POST['passSelection']) &&
    !empty($_POST['passSelectionDate'])
) {

    $nombrePlaces = htmlentities($_POST['nombrePlaces']);
    $passSelection = htmlentities($_POST['passSelection']);
    $passSelectionDate = htmlentities($_POST['passSelectionDate']);

    if (isset($_POST['tenteNuit'])) {
        $tenteNuit = htmlentities($_POST['tenteNuit']);
    } else {
        $tenteNuit = 'non';
        $_POST['tenteNuit'] = "non";
    };

    if (isset($_POST['vanNuit'])) {
        $vanNuit = htmlentities($_POST['vanNuit']);
    } else {
        $vanNuit = 'non';
        $_POST['vanNuit'] = "non";
    };

    if ($_POST['nombreCasquesEnfants'] != 0) {
        $nombreCasquesEnfants = htmlentities($_POST['nombreCasquesEnfants']);
    } else {
        $nombreCasquesEnfants = 0;
        $_POST['nombreCasquesEnfants'] = "non";
    };

    if ($_POST['nombreLugesEte'] != 0) {
        $nombreLugesEte = htmlentities($_POST['nombreLugesEte']);
    } else {
        $nombreLugesEte = 0;
        $_POST['nombreLugesEte'] = "non";
    };

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST['email']);
    }


    $PrixPass = (int)filter_var($passSelection, FILTER_SANITIZE_NUMBER_INT);
    $PrixTotalPass = $PrixPass * $nombrePlaces;

    $NombreLuge = (int)filter_var($nombreLugesEte, FILTER_SANITIZE_NUMBER_INT);
    $PrixTotalLuge = $NombreLuge * 5;

    $PrixTente = (int)filter_var($tenteNuit, FILTER_SANITIZE_NUMBER_INT);
    $PrixVan = (int)filter_var($vanNuit, FILTER_SANITIZE_NUMBER_INT);
    $prixCasquesEnfants = $nombreCasquesEnfants * 2;

    $TotalAPayer = $PrixTotalPass + $PrixTotalLuge + $PrixTente + $PrixVan + $prixCasquesEnfants;

    $Reservation = new Reservation(
        $nombrePlaces,
        $passSelection,
        $passSelectionDate,
        $tenteNuit,
        $vanNuit,
        $nombreCasquesEnfants,
        $nombreLugesEte,
        $email
    );

    $retour = $DatabaseReservation->saveUtilisateur($Reservation);
};


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

// if ($retour) {
//     header('location:../connexion.php?succes=inscription');  
//       exit;
//     } else {
//     header('location:../index.php?erreur=' . ERREUR_ENREGISTREMENT);
//     die;
// //      }
 }
    
//  else {
//         header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
//         die;
// }

if (!empty($errorMessages)) {
    foreach ($errorMessages as $error) {
        echo $error . "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Document</title>
</head>

<body>
    <fieldset>
        <h2>Réservation</h2>
        <p>La réservation a bien été enregistrée pour <?= $passSelectionDate ?>.</p>
        <p>La facturation par personne est de <?= $passSelection ?>.</p>
        <p>Le prix total pour <?= $nombrePlaces ?> personne(s) sera de <?= $PrixTotalPass ?>€.</p>
        <p>l'Email de réservation est <?= $email ?> .</p>
        <h2>Options</h2>
        <?php if ($tenteNuit == "non" && $vanNuit == "non" && $nombreCasquesEnfants == "non" && $nombreLugesEte == "non") {
        ?> <p>Pas d'options choisies.</p> <?php
                                        } ?>
        <?php if ($tenteNuit != "non") { ?>
            <p>Vous avez reservé <?= $tenteNuit ?>.</p><?php }
                                                        ?>
        <?php if ($vanNuit != "non") { ?>
            <p>Vous avez reservé <?= $vanNuit ?>.</p> <?php }
                                                        ?>
        <?php if ($nombreCasquesEnfants != 0) { ?>
            <p>Vous avez reservé <?= $nombreCasquesEnfants ?> casque(s) pour enfants (2€).</p><?php }
                                                                                                ?>
        <?php if ($nombreLugesEte != 0) { ?>
            <p>Vous avez reservé <?= $nombreLugesEte ?> luge(s) d'été pour un total de <?= $PrixTotalLuge ?>€.</p><?php }
                                                                                                                    ?>
        <h2>Prix total de la réservation</h2>
        <p>total à payer sur place : <?= $TotalAPayer ?>€ (TTC)</p>
        <a href="http://briefformulaireamalkillian/connexion.php?"><button class="connect">Se connecter</button>
</a>
    </fieldset>
</body>

</html>