<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 09:03
 */

require_once "my_classes.php";
require_once "step1.php";

function quit()
{
    echo "ca marche pas\n";
}

function add()
{
    echo "add\n";
}

function load_cards()
{
    $cards = [];
    $array = [
        1 => "mage",
        2 => "chasseur",
        3 => "druide",
        4 => "paladin",
        5 => "pretre",
        6 => "voleur",
        7 => "chaman",
        8 => "demoniste",
        9 => "guerrier",
    ];
    foreach ($array as $class) {
        $dir = opendir("json/$class");
        while ($file = readdir($dir)) {
            if ($file != "." && $file != "..") {
                $card = new card;
                $card->create_card($class, "$file");
                $cards[] = $card;
            }
        }
    }
    return $cards;
}

function display_cards($class, $cards)
{
    foreach ($cards as $card) {
        if ($card->get_c_class() == "$class")
            echo $card->get_c_name() . "\n";
    }
}

function my_hearthstone($argv)
{
    echo "\n=== MY HEARTHSTONE ===\n\n";
    $player = init($argv);
    $game = 0;
    if (!$player)
        return;
    echo("\n=== PICK A DECK ===\n\n");
    echo("Constituez un deck de 10 cartes pour affronter vos ennemis.\n");
    echo("Cartes : \n");
    load_cards();
    while ($game == 0) {
        display_cards($player->get_p_class(), load_cards());
        $command = readline();
        $commands = [
            "quit" => "quit",
            "add" => "add",
        ];
        if (isset($commands[$command])) {
            echo "Cette commande existe\n";
            $commands[$command]();
        }
        else
            echo "Cette commande n'existe pas\n";
    }
}

if (isset($argv[3]))
    echo "my_hearthstone: trop d'arguments\n";
else
    my_hearthstone($argv);

?>