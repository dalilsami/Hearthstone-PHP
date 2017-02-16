<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 09:03
 */

require_once "player.php";
require_once "step1.php";

function pick_a_deck($player)
{
    $player->init_deck($player);
}

function my_hearthstone($argv)
{
    echo "\n=== MY HEARTHSTONE ===\n\n";
    $player = init($argv);
    if (!$player)
        return;
    $player->display();
    pick_a_deck($player);
}

if (isset($argv[3]))
    echo "my_hearthstone: trop d'arguments\n";
else
    my_hearthstone($argv);