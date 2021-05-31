<?

/**
 * Sauf pour l'endurance les valeurs maximales des autres attributs sont 50
 * + les modificateurs des races + des rôles.
 * 
 * Ajuster la valeur de l'endurance pour avoir des combats pas trop longs ni trops courts.
 * 
 * A la création d'un personnage, les valeurs des attributs principaux sont tirés aléatoirement
 * avec comme valeur totale max 50 (ou comprise entre 30 et 55).
 */


class Character {
    public $force;
    public $agility;
    public $endurance;

    public $health;

    public $role;

    public $name;


    public function __construct($name, $role) {
        $this->name = $name;
        $this->generateValues();
        $this->health = 1000;
        $this->role = $role;
        $this->force += $this->role->force;
        $this->agility +=  $this->role->agility;
        $this->endurance +=  $this->role->endurance;
    }


/**
 * Génère toutes les valeurs des attributs entre 0 et 50
 * la méthode est private parce qu'elle sera appelée que dans la classe Character (plus précisememt dans le constructeur)
 */
    private function generateValues() {
        $ok = false;
            
        do {
            //on donne un nombre aléatoire entre 0 et 50
            $this->force = rand(0, 50);
            $this->agility = rand(0, 50);
            $this->endurance = rand(0, 50);

            $total = $this->force + $this->endurance + $this->agility;

            if($total >= 30 && $total <= 50) $ok = true;

        } while($ok);
        
    }


    public function attack($cible) {
        echo $this->name . " attaque " . $cible->name . "\n il lui inflige ";
        $degats = $this->force * 10 - $cible->endurance;
        $cible->health -= $degats;
        echo $degats . " points de dégats \n" . "il reste à " . $cible->name . " " . $cible->health . " PV \n";
    }


}



?>