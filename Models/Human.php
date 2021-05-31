<?php

// évite que ce soit inclus 2 fois, si jamais il a déjà été inclus.
include_once('Character.php');

/**
 * Un humain possède 25% de pv en plus
 */

class Human extends Character {

    public function __construct($name, $role) {

        // appel au constructor parent pour exécuter le code du constructeur de Character
        parent::__construct($name, $role);

        $this->health = intval($this->health * 1.25);

    }

}




?>