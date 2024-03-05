<?php

class User
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;

    private $_password;

    private $_telephone;
    private $_adressePostale;
    private $_role;

    function __construct(string $nom, string $prenom, string $mail, string $password, $telephone, string $adressePostale, int|string $id = null, string $role = "user")
    {

        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setMail($mail);
        $this->setPassword($password);
        $this->setTelephone($telephone);
        $this->setAdressePostale($adressePostale);
        $this->setRole($role);
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id): void
    {
        if ($id === null) {
            $this->_id = $this->creerNouvelId();
        } else {
            $this->_id = $id;
        }
    }

    public function getNom(): string
    {
        return $this->_nom;
    }

    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->_prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->_prenom = $prenom;
    }

    public function getMail(): string
    {
        return $this->_mail;
    }

    public function setMail(string $mail): void
    {
        $this->_mail = $mail;
    }
    public function getPassword(): string
    {
        return $this->_password;
    }
    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }
    public function getTelephone()
    {
        return $this->_telephone;
    }

    public function setTelephone($telephone): void
    {
        $this->_telephone = $telephone;
    }

    public function getAdressePostale(): string
    {
        return $this->_adressePostale;
    }

    public function setAdressePostale(string $adressePostale): void
    {
        $this->_adressePostale = $adressePostale;
    }

    public function getRole(): string
    {
        return $this->_role;
    }

    public function setRole(string $role): void
    {
        $this->_role = $role;
    }

    public function isAdmin(): bool
    {
        return $this->getRole() === "admin";
    }

    private function creerNouvelId(): int
    {
        $Database = new Database();
        $utilisateurs = $Database->getAllUtilisateurs();

        // On crée un tableau dans lequel on stockera tous les ids existants.
        $IDs = [];

        foreach ($utilisateurs as $utilisateur) {
            $IDs[] = $utilisateur->getId();
        }

        // Ensuite, on regarde si un chiffre existe dans le tableau, et si non, on l'incrémente
        $i =  1;
        $unique = false;
        while (!$unique) {
            if (in_array($i, $IDs)) {
                $i++;
            } else {
                $unique = true;
            }
        }
        return $i;
    }

    public function getObjectToArray(): array
    {
        return [
            "id" => $this->getId(),
            "nom" => $this->getNom(),
            "prenom" => $this->getPrenom(),
            "mail" => $this->getMail(),
            "password" => $this->getPassword(),
            "telephone" => $this->getTelephone(),
            "adressePostale" => $this->getAdressePostale(),
            "role" => $this->getRole()
        ];
    }
}
