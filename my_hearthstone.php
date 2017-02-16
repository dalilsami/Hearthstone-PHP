<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 09:03
 */

require_once "player.php";
require_once "step1.php";

function my_hearthstone($argv)
{
    echo "\n=== MY HEARTHSTONE ===\n\n";
    $player = init($argv);
    $game = 0;
    if (!$player)
        return;
    $player->display();
    echo("\n=== PICK A DECK ===\n\n");
    echo("Constituez un deck de 10 cartes pour affronter vos ennemis.\n");
    echo("Cartes : \n");
    while ($game == 0) {
        $card = new card();
        $card->create_card($player->get_p_class(), "humilite.json");
    }
}

if (isset($argv[3]))
    echo "my_hearthstone: trop d'arguments\n";
else
    my_hearthstone($argv);