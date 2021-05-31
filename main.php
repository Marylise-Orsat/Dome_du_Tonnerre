<?
//include_once('./Models/Human.php');

$folder = scandir("./Models");

foreach($folder as $file) {
    $path = './Models/' . $file;
    if(is_file($path)) include_once($path);
}


$toto = new Human(new Warrior());
$tutu = new Dwarf(new Paladine());
var_dump($toto, $tutu);
//echo "PV : " . $marylise->health . "\n";