<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 09:03
 */

require_once "my_classes.php";
require_once "step1.php";
require_once "step2.php";
require_once "step3.php";
require_once "step4.php";

function my_hearthstone($argv)
{
    echo "\n=== MY HEARTHSTONE ===\n\n";
    $player = init($argv);
    $game = 0;
    if (!$player)
        return ;
    echo("\n=== PICK A DECK ===\n\n");
    echo("Constituez un deck de 10 cartes pour affronter vos ennemis.\n");
    echo("Cartes : \n");
    $quit = init_deck($player);
    if ($quit == -42)
        return ;
    $player->deck_shuffle();
    $ia = init_ia("Callaghan");
    echo "\n=== Un nouvel adversaire apparait ! Il s'agit de " . $ia->get_p_name() . ", un puissant " . $ia->get_p_class() . " ===\n";
    $player->beginning_shuffle();
    init_game();
}

if (isset($argv[3]))
    echo "my_hearthstone: trop d'arguments\n";
else
    my_hearthstone($argv);