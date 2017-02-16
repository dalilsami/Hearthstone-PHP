<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 09:03
 */

require_once "my_classes.php";
require_once "step1.php";

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
                print_r($cards);
            }
        }
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
    while ($game == 0) {
        load_cards();
    }
}

if (isset($argv[3]))
    echo "my_hearthstone: trop d'arguments\n";
else
    my_hearthstone($argv);