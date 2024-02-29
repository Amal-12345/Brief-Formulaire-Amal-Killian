<div id="colonne">
  <h2>Bonjour <?= $user->getPrenom() ?> !</h2>
  <ul>
    <li class="utilisateurs actif" onclick="location.href='tableau-admin?section=utiliseurs'">Liste des utilisateurs</li>
      <li class="retour" onclick="location.href='tableau-de-bord'">Tableau de bord</li>
  </ul>
</div>
