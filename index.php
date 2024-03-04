<?php
session_start();

if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
  // abort
  header('location:tableau-de-bord.php');
  die;
}

$code_erreur = null;
if (isset($_GET['erreur'])) {
  $code_erreur = (int) $_GET['erreur'];
}

include "includes/header.php";
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Vercos Festival</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="icon" href="./medias/favicon-32x32.png" />
</head>
<body>
    <form action="src/traitement.php" id="inscription" method="POST">
        <fieldset id="reservation">
            <legend>Réservation</legend>
            <h3>Nombre de réservation(s) :</h3>
            <input type="number" name="nombrePlaces" id="NombrePlaces" min="1" max="15" placeholder="Nombre de personnes" required>
            <p id="choisirPlaces" class="echec">Veuillez definir le nombre de réservations</p>
            <h3>Réservation(s) en tarif réduit</h3>
            <input type="checkbox" name="tarifReduit" id="tarifReduit" value="TarifReduit">
            <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

            <h3>Choisissez votre formule :</h3>

            <div class="choixJour">
                <input type="radio" name="passSelection" id="pass1jour" value="40€ pour un jour">
                <label for="pass1jour">Pass 1 jour : 40€</label>
            </div>

            <section class="tarifsReduit">
                <input type="radio" name="passSelection" id="pass1jourreduit" value="25€ pour un jour (Tarif réduit)">
                <label for="pass1jourreduit">Pass 1 jour : 25€</label><br>
            </section>

            <!-- Si case cochée, afficher le choix du jour -->
            <section id="pass1jourDate">
                <input type="radio" name="passSelectionDate" id="choixJour1" value="le 01/07">
                <label for="choixJour1">Pass pour la journée du 01/07</label>
                <input type="radio" name="passSelectionDate" id="choixJour2" value="le 02/07">
                <label for="choixJour2">Pass pour la journée du 02/07</label>
                <input type="radio" name="passSelectionDate" id="choixJour3" value="le 03/07">
                <label for="choixJour3">Pass pour la journée du 03/07</label>

            </section>
            <div class="choixJour">
                <input type="radio" name="passSelection" id="pass2jours" value="70€ pour deux jours">
                <label for="pass2jours">Pass 2 jours : 70€</label>
            </div>

            <!-- Si case cochée, afficher le choix des jours -->
            <section class="tarifsReduit">
                <input type="radio" name="passSelection" id="pass2joursreduit" value="50€s pour deux jour  (Tarif réduit)">
                <label for="pass2joursreduit">Pass 2 jours : 50€</label><br>
            </section>

            <section id="pass2joursDate">
                <input type="radio" name="passSelectionDate" id="choixJour12" value="le 01/07 au 02/07">
                <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
                <input type="radio" name="passSelectionDate" id="choixJour23" value="le 02/07 au 03/07">
                <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
            </section>

            <div class="choixJour">
                <input type="radio" name="passSelection" id="pass3jours" value="100€ pour trois jours">
                <label for="pass3jours">Pass 3 jours : 100€</label>
            </div>

            <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
            <section class="tarifsReduit">
                <input type="radio" name="passSelection" id="pass3joursreduit" value="65€ pour trois jours (Tarif réduit)">
                <label for="pass3joursreduit">Pass 3 jours : 65€</label>
            </section>
            <p id="choisirJour" class="echec">Veuillez définir le nombre de jour(s) et/ou les dates</p>
            <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->
            <input type="button" id="boutonRetour" onclick="retour()" value="Retour" disabled>
            <input type="button" id="boutonSuivant" onclick="suivant()" value="Suivant">

       </fieldset>
        <fieldset id="options">
            <legend>Options</legend>
            <h3>Réserver un emplacement de tente : </h3>
            <input type="checkbox" id="tenteNuit1" name="tenteNuit" value="un emplacement de tente pour la première nuit (5€)">
            <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
            <input type="checkbox" id="tenteNuit2" name="tenteNuit" value="un emplacement de tente pour la seconde nuit (5€)">
            <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
            <input type="checkbox" id="tenteNuit3" name="tenteNuit" value="un emplacement de tente pour la troisième nuit (5€)">
            <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
            <input type="checkbox" id="tente3Nuits" name="tenteNuit" value="un emplacement de tente pour les trois nuits (12€)">
            <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

            <h3>Réserver un emplacement de camion aménagé : </h3>
            <input type="checkbox" id="vanNuit1" name="vanNuit" value="un emplacement de van pour la première nuit (5€)">
            <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
            <input type="checkbox" id="vanNuit2" name="vanNuit" value="un emplacement de van pour la seconde nuit (5€)">
            <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
            <input type="checkbox" id="vanNuit3" name="vanNuit" value="un emplacement de van pour la troisième nuit (5€)">
            <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
            <input type="checkbox" id="van3Nuits" name="vanNuit" value="un emplacement de van pour les trois nuits (12€)">
            <label for="van3Nuits">Pour les 3 nuits (12€)</label>

            <h3>Venez-vous avec des enfants ?</h3>
            <input type="radio" name="enfants" id="enfantsOui" value="avec enfant(s)"><label for="enfantsOui">Oui</label>
            <input type="radio" name="enfants" id="enfantsNon" value="sans enfant(s)"><label for="enfantsNon">Non</label>

            <!-- Si oui, afficher : -->
            <section id="casqueEnfant">
                <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
                <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
                <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" min="0" max="15" value="0">
                <p>*Dans la limite des stocks disponibles.</p>
            </section>

            <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>
            <label for="nombreLugesEte">Nombre de descentes en luge d'été (5€) :</label>
            <input type="number" name="nombreLugesEte" id="nombreLugesEte" min="0" max="10" value="0">
            <br>
            <input type="button" id="boutonRetour" onclick="retour()" value="Retour">
            <input type="button" id="boutonSuivant" onclick="suivant()" value="Suivant">
        </fieldset>
        <fieldset id="coordonnees">
            <legend>Coordonnées</legend>
            <div class="input-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
            </div>
            <div class="input-group">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required>
            </div>
            <div class="input-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email">
            <?php if ($code_erreur === 1) { ?>
    <div class="message echec">
      L'Email n'est pas valide.
    </div>
  <?php } ?>
            </div>
            <div class="input-group">
    <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password" >
  <?php if ($code_erreur === 2) { ?>
    <div class="message echec">
      Le mot de passe doit contenir au moins 8 caractères.
    </div>
  <?php } ?>
            </div>
            <div class="input-group">
  <label for="password2">Vérifier le mot de passe :</label>
  <input type="password" id="password2" name="password2" >
  <?php if ($code_erreur === 3) { ?>
    <div class="message echec">
      Les mots de passes ne se correspondent pas.
    </div>
  <?php } ?>
                </div>
                    <div class="input-group">
            <label for="telephone">Téléphone :</label>
            <input type="text" name="telephone" id="telephone" required>
            <?php if ($code_erreur == 4) { ?>
    <div class="message echec">
      Le numéro de téléphone n'est pas valide.
    </div>
  <?php } ?>
            </div>
            <div class="input-group">
            <label for="adressePostale">Adresse Postale :</label>
            <input type="text" name="adressePostale" id="adressePostale" required>
                        </div>
            <br>
            <div class="input-group">
            <input type="button" id="boutonRetour" onclick="retour()" value="Retour">
            <input type="button" id="boutonSuivant" onclick="suivant()" value="Suivant" disabled>
            </div>
            <br>
            <input type="submit" name="soumission" class="bouton" value="Réserver">
        </fieldset>
    </form>
    <script src="./assets/script.js"></script>
</body>

</html>
