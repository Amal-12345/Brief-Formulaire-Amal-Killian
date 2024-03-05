<?php
final class Database {
  private $_DB;

  public function __construct(){
    $this->_DB = __DIR__ . "/../csv/utilisateurs.csv";
  }

  public function getAllUtilisateurs(): array {
    $connexion = fopen($this->_DB, 'r');
    $utilisateurs = [];
    
    while (($user = fgetcsv($connexion, 1000, ",")) !== FALSE) {
      $utilisateurs[] = new User($user[1], $user[2], $user[3], $user[4], $user[5], $user[6], $user[0],);
    }

    fclose($connexion);

    return $utilisateurs;
  }

  public function getThisUtilisateurById(int $id) : User|bool {
    $connexion = fopen($this->_DB, 'r');
    while (($user = fgetcsv($connexion, 1000)) !== FALSE) {
      if ((int) $user[0] === $id) {
        $utilisateurs[] = new User ($user[1], $user[2], $user[3], $user[4], $user[5], $user[6], $user[0]);
        break;
      }else {
        $user = false;
      }
    }
    fclose($connexion);
    return $user;
  }

public function getThisUtilisateurByMail(string $mail) : User|bool {
    $connexion = fopen($this->_DB, 'r');
    while (($user = fgetcsv($connexion, 1000)) !== FALSE) {
      if ($user[3] === $mail) {
        $user = new User($user[1],$user[2],$user[3],$user[4],$user[0],$user[5]);
        break;
      }else {
        $user = false;
      }
    }
    fclose($connexion);
    return $user;
  }

  public function saveUtilisateur(User $user) : bool {
    $connexion = fopen($this->_DB, 'ab');

    $retour = fputcsv($connexion, $user->getObjectToArray());

    fclose($connexion);

    return $retour;
  }

  public function deleteThisUser(int $IdUser): bool {
    if ($this->getThisUtilisateurById($IdUser)) {
      $utilisateurs = $this->getAllUtilisateurs();

      $connexion = fopen($this->_DB, 'wb');
      foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur->getID() !== $IdUser) {
          $retour = fputcsv($connexion, $utilisateur->getObjectToArray());
        }
      }
      fclose($connexion);
      return true;
    } else {
      return false;
    }
  }
}