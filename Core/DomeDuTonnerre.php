<?

class DomeDuTonnerre {
    // on ne veut pas que la propriété soit modifiée en dehors
    private $arena;

    public function __construct() {
        $this->arena = array();     // ou juste []
    }


    public function addFighter($fighter) {
        // si le combattant existe on ne l'ajoute pas, sinon on l'ajoute
        //if(!array_key_exists($fighter, $this->arena)) {
            array_push($this->arena, $fighter);
        //}
    }

    // Facultatif : si on veut ajouter tous les combattants d'un coup avec une liste
    public function addFighters($fighters) {
        array_merge($this->arena, $fighters);
    }

    public function startFight() {
        while(count($this->arena) > 1) {
            $this->executeAction();
        }
    }

    private function executeAction() {
        // on choisit l'attaquant et le défenseur 
        $fighter = $this->getFighter();
        $defender = $this->getFighter();
        
        // Effectuer l'attaque
        $result = $fighter->attack($defender);

        // Décrire l'action en cours
        $this->sendMessage($fighter, $defender, $result);

        // On affiche le vainqueur
        $this->endGame();

        // On nettoie l'arène
        $this->clearArena();
    }

    private function getFighter() {
        // retourne aléatoirement 1 combattant
        $rand = rand(0, count($this->arena)-1);
        $fighter = $this->arena[$rand];
        return $fighter;
    }

    private function clearArena() {
        foreach($this->arena as $fighter) {
            if($fighter->health <= 0) {
            array_splice($this->arena, array_search($fighter, $this->arena), 1);
            }
        }
    }

    public function endGame() {
        echo $this->$fighter[0]->name . "a gagné \n";
    }

    private function sendMessage($fighter, $defender, $result) {
        echo $fighter->name . "a infliché " . $this->damage . " de dégats contre ". $defender->name;
    }

}

