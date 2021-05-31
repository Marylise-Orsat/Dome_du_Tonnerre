<?

/**
 * Les classes des Types possèdent les valeurs aux attributs à modifier
 */
class Paladine {
    public $force;
    public $agility;
    public $endurance;

    public function __construct() {
        $this->force = 2;
        $this->agility = 5;
        $this->endurance = 20;
    }

}