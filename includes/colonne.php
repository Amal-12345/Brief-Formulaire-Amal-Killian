<div id="colonne">
  <h2>Bonjour <?= $user->getPrenom() ?> !</h2>
  <ul>
    <li class="compte <?= $section == "compte" ? "actif" : "" ?>" onclick="location.href='tableau-de-bord?section=compte'">Mon compte</li>
    <li class="reservations <?= $section == "reservations" ? "actif" : "" ?>" onclick="location.href='tableau-de-bord?section=reservations'">Mes réservations</li>
    <?php if ($user->isAdmin()) { ?>
      <li class="admin" onclick="location.href='tableau-admin?section=reservations'">Administration</li>
    <?php } ?>
  </ul>
</div>
