<?php

// évite que ce soit inclus 2 fois, si jamais il a déjà été inclus.
include_once('Character.php');

/**
 * Un Dwarf possède 25% de pv en moins
 * et une augmentaion de 2% de force et d'endurance
 */

class Dwarf extends Character {

    public function __construct($role) {

        // appel au constructor parent pour exécuter le code du constructeur de Character
        parent::__construct($role);

        $this->health = intval($this->health * 0.75);
        $this->force = intval($this->force * 1.02);
        $this->endurance = intval($this->endurance * 1.02);

    }

}


?>