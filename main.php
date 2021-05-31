<?
//include_once('./Models/Human.php');

$folder = scandir("./Models");

foreach($folder as $file) {
    $path = './Models/' . $file;
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


// Boucle : attaque l'un après l'autre l'adversaire
while(true) {
    $att = false;

    $domDuTonnerre[$att]->attack($domDuTonnerre[!$att]);
    if($domDuTonnerre[!$att]->health <= 0) break;
    $domDuTonnerre[!$att]]->attack($domDuTonnerre[$att]);
    if($domDuTonnerre[$att]->health <= 0) break;

    $att = !$att;
}
