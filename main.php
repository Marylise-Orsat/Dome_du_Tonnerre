<?
//include_once('./Models/Human.php');

$folder = scandir("./Models");

foreach($folder as $file) {
    $path = './Models/' . $file;
    if(is_file($path)) include_once($path);
}

$folder = scandir("./Core");

foreach($folder as $file) {
    $path = './Core/' . $file;
    if(is_file($path)) include_once($path);
}

/**
 * Le dome du tonnerre v1 :
 * 
 * Deux HOMMES rentrent et un HOMME sort
 * 
 * Mettre deux guerriers dans une liste nommée le DOM_DU_TONNERRE
 * 
 * Faire en sorte que :
 * - les combattants tapent à tour de role jusqu'à ce qu'un meurt -> 1er commit
 * - les combattants attaquent de manière aléatoire jusqu'à ce qu'un meurt -> 2eme commit
 * 
 * TIPS : 
 * - Les personnages possèdent une méthode attaquer qui prend en argument la cible de l'attaque.
 * - Le calcul des dégats est comme par exemple :
 *      PV -= FOR - ENDU * 0.25 + time()² %3
 * - Afficher en console un message su style :
 *      ATT_NAME à attaquer DEF_NAME et lui à donner XX de dégats.
 *      DEF_NAME se à l'article de wordpress, il lui reste XX PV.
 */

$domDuTonnerre = array (
    new Human("Human1", new Warrior()),
    new Dwarf("Dwarf1", new Paladine()),
);

var_dump($domDuTonnerre);
//echo "PV : " . $marylise->health . "\n";


/**
 * EXO 1 : les combattants tapent à tour de role jusqu'à ce qu'un meurt -:
 */
// Boucle : attaque l'un après l'autre l'adversaire
// while(true) {
//     $att = false;

//     $domDuTonnerre[$att]->attack($domDuTonnerre[!$att]);
//     if($domDuTonnerre[!$att]->health <= 0) break;
//     $domDuTonnerre[!$att]->attack($domDuTonnerre[$att]);
//     if($domDuTonnerre[$att]->health <= 0) break;

//     $att = !$att;
// }

// Fonction qui attaque de façon aléatoire
$continue = false;
// on initialise un attaquant à la valeur 0
$attaquant = 0;
// on initialise un défenseur
$defenseur = 1;

while(true) {
    $attaquant = rand(0, count($domDuTonnerre)-1);
    $defenseur = rand(0, count($domDuTonnerre)-1);

    // Phase d'attaque
    $domDuTonnerre[$attaquant]->attack($domDuTonnerre[$defenseur]);
    // on vérifie si le coup à été fatal pour le défenseur et les PV sont inférieurs à 0
    if($domDuTonnerre[$defenseur]->health <= 0) break;

    // on laisse un peu de temps entre les deux attaques
    sleep(1.5);
}

$winner = null;
foreach($domDuTonnerre as $character) {
    if($character->health > 0) $winner = $character;
}

// On affiche le vainqueur
echo "\n Fin du jeu \n" . $winner->name . " gagne ! \n";





/**
 * Le dome du tonnerre 2 :
 * 
 * Plusieurs HOMMES rentrent et un HOMME sort
 * 
 * Dans le dossier CORE nous allons implémenter une classe DomeDuTonnerre qui aura les méthodes suivants :
 *  - Ajouter un combattant
 *  - Lancer le combat // mécanique interne
 *  - Nettoyer l'arène des cadavres // mécanique interne
 *  - Indiquer le vainqueur // mécanique interne
 *  - Décrire l'action en cours
 */

$DDT = new DomeDuTonnerre();
$DDT->addFighter(
    new Elf("Elf2", new Warrior())//,
    //new Orc("Orc2", new Warrior())
);
$DDT->startFight();
var_dump($DDT);