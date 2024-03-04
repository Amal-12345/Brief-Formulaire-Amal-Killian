<?php

class Reservation
{
    //*Reservation
    public $_nombrePlaces;
    public $_passSelection;
    public $_passSelectionDate;

    //*Options
    public $_tenteNuit;
    public $_vanNuit;
    public $_nombreCasquesEnfants;
    public $_nombreLugesEte;

    //*Coordonnées
    private $_email;

    public function __construct(int $nombrePlaces, string $passSelection, string $passSelectionDate, string $tenteNuit, string $vanNuit, int|string $nombreCasquesEnfants, int|string $nombreLugesEte,string $email)
    {
        $this->setnombrePlaces($nombrePlaces);
        $this->setpassSelection($passSelection);
        $this->setpassSelectionDate($passSelectionDate);
        $this->settenteNuit($tenteNuit);
        $this->setvanNuit($vanNuit);
        $this->setnombreCasquesEnfants($nombreCasquesEnfants);
        $this->setnombreLugesEte($nombreLugesEte);
        $this->setemail($email);
    }

    //* Getter Setter du nombre de reservation
    public function getnombrePlaces(): int
    {
        return $this->_nombrePlaces;
    }
    public function setnombrePlaces(int $nombrePlaces): void
    {
        $this->_nombrePlaces = $nombrePlaces;
    }

    //* Getter Setter du Nombre de jour

    public function getpassSelection()
    {
        return $this->_passSelection;
    }
    public function setpassSelection($passSelection): void
    {
        $this->_passSelection = $passSelection;
    }

    //* Getter Setter de la date reservée

    public function getpassSelectionDate()
    {
        return $this->_passSelectionDate;
    }
    public function setpassSelectionDate($passSelectionDate): void
    {
        $this->_passSelectionDate = $passSelectionDate;
    }

    public function gettenteNuit()
    {
        return $this->_tenteNuit;
    }
    public function settenteNuit($tenteNuit): void
    {
        $this->_tenteNuit = $tenteNuit;
    }

    public function getvanNuit()
    {
        return $this->_vanNuit;
    }
    public function setvanNuit($vanNuit): void
    {
        $this->_vanNuit = $vanNuit;
    }

    public function getnombreCasquesEnfants()
    {
        return $this->_nombreCasquesEnfants;
    }
    public function setnombreCasquesEnfants($nombreCasquesEnfants): void
    {
        $this->_nombreCasquesEnfants = $nombreCasquesEnfants;
    }

    public function getnombreLugesEte()
    {
        return $this->_nombreLugesEte;
    }
    public function setnombreLugesEte($nombreLugesEte): void
    {
        $this->_nombreLugesEte = $nombreLugesEte;
    }


    public function getemail()
    {
        return $this->_email;
    }
    public function setemail($email): void
    {
        $this->_email = $email;
    }

    public function getObjectToArray(): array
    {
        return [
            'nombrePlaces' => $this->getnombrePlaces(),
            'passSelection' => $this->getpassSelection(),
            'passSelectionDate' => $this->getpassSelectionDate(),
            'tenteNuit' => $this->gettenteNuit(),
            'vanNuit' => $this->getvanNuit(),
            'nombreCasquesEnfants' => $this->getnombreCasquesEnfants(),
            'nombreLugesEte' => $this->getnombreLugesEte(),
            'email' => $this->getemail(),

        ];
    }
}
