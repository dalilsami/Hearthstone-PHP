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
    if (!$player)
        return;
    $player->display();
}

if (isset($argv[3]))
    echo "my_hearthstone: trop d'arguments\n";
else
    my_hearthstone($argv);