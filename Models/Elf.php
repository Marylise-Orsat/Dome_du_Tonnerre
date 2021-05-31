<?php

// évite que ce soit inclus 2 fois, si jamais il a déjà été inclus.
include_once('Character.php');

/**
 * Un Elf possède 50% de pv en moins
 * et une réduction de force et endurance
 */

class Elf extends Character {

    public function __construct($role) {

        // appel au constructor parent pour exécuter le code du constructeur de Character
        parent::__construct($role);

        $this->health = intval($this->health * 1.5);
        $this->force = intval($this->force * 0.95);
        $this->endurance = intval($this->endurance * 0.95);

    }

}



?>