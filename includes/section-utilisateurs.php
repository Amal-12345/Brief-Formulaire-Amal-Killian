<?php
?>
<table class="tableau-utilisateurs">
  <caption><h1>Liste des utilisateurs</h1></caption>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Mail</th>
      <th>Rôle</th>
      <th>Outils</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($utilisateurs as $utilisateur) { ?>
      <tr>
        <td><?= $utilisateur->getId() ?></td>
        <td><?= $utilisateur->getNom() ?></td>
        <td><?= $utilisateur->getPrenom() ?></td>
        <td><?= $utilisateur->getMail() ?></td>
        <td><?= $utilisateur->getRole() ?></td>
        <td><button onclick="location.href='src/suppression?suppression=<?= $utilisateur->getId() ?>'">🗑️ Supprimer</button></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
