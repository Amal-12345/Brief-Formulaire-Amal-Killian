<?php
final class DatabaseReservation
{
    private $_DB;

    public function __construct()
    {
        $this->_DB = __DIR__ . "/../csv/reservation.csv";
    }

    public function getAllUtilisateurs(): array
    {
        $connexion = fopen($this->_DB, 'r');
        $utiliseurs = [];

        while (($reservation = fgetcsv($connexion, 1000, ",")) !== FALSE) {
            $utiliseurs[] = new Reservation($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6], $reservation[7]);
        }

        fclose($connexion);

        return $utiliseurs;
    }
    public function getThisUtilisateurByMail(string $mail): Reservation|bool
    {
        $connexion = fopen($this->_DB, 'r');
        while (($reservation = fgetcsv($connexion, 1000)) !== FALSE) {
            if ($reservation[7] === $mail) {
                $reservation = new Reservation($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6], $reservation[7]);
                break;
            } else {
                $reservation = false;
            }
        }
        fclose($connexion);
        return $reservation;
    }

    public function saveUtilisateur(Reservation $reservation): bool
    {
        $connexion = fopen($this->_DB, 'ab');

        $retour = fputcsv($connexion, $reservation->getObjectToArray());

        fclose($connexion);

        return $retour;
    }
}