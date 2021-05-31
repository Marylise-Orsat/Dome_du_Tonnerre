<?

/**
 * Les classes des Types possèdent les valeurs aux attributs à modifier
 */
class Archer {
    public $force;
    public $agility;
    public $endurance;

    public function __construct() {
        $this->force = -5;
        $this->agility = 15;
        $this->endurance = -20;
    }

}