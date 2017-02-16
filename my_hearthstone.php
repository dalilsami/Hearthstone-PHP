<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 09:03
 */

require_once "player.php";
require_once "step1.php";

function load_cards()
{
    $cards = [];
    $dir = opendir("json/paladin");
    while ($file = readdir($dir)) {
        if ($file != "." && $file != "..") {
            $card = new card;
            $card->create_card("paladin", "$file");
            $cards[] = $card;
            $card->display();
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
        return;
    }
}

if (isset($argv[3]))
    echo "my_hearthstone: trop d'arguments\n";
else
    my_hearthstone($argv);