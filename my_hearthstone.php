<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 09:03
 */

require_once "player.php";

function class_invalide()
{
    echo "Veuillez entrer votre pseudonyme puis une classe valide.\n";
    echo "Classes :\n";
    echo "- Mage\n";
    echo "- Chasseur\n";
    echo "- Druide\n";
    echo "- Paladin\n";
    echo "- Prêtre\n";
    echo "- Voleur\n";
    echo "- Chaman\n";
    echo "- Démoniste\n";
    echo "- Guerrier\n\n";
    return 0;
}

function pick_class($class)
{
    $classes = [
        "Mage" => 1,
        "mage" => 1,
        "Chasseur" => 2,
        "chasseur" => 2,
        "Hunter" => 2,
        "hunter" => 2,
        "Druide" => 3,
        "druide" => 3,
        "Druid" => 3,
        "druid" => 3,
        "Paladin" => 4,
        "paladin" => 4,
        "Prêtre" => 5,
        "prêtre" => 5,
        "Pretre" => 5,
        "pretre" => 5,
        "Priest" => 5,
        "priest" => 5,
        "Voleur" => 6,
        "voleur" => 6,
        "Chaman" => 7,
        "chaman" => 7,
        "Shaman" => 7,
        "shaman" => 7,
        "Démoniste" => 8,
        "Demoniste" => 8,
        "démoniste" => 8,
        "demoniste" => 8,
        "Warlock" => 8,
        "warlock" => 8,
        "Guerrier" => 9,
        "guerrier" => 9,
        "Warrior" => 9,
        "warrior" => 9,
    ];
    if (isset($classes["$class"]))
        return $classes[$class];
    else
        return 0;
}

function init($argv)
{
    if (isset($argv[1]) && isset($argv[2])) {
        $username = $argv[1];
        $class = pick_class($argv[2]);
        if ($class != 0) {
            $player = new player();
            $player->init_player($username, $class);
            return $player;
        } else
            return class_invalide();
    } else
        return class_invalide();
}

function my_hearthstone($argv)
{
    echo "\n=== MY HEARTHSTONE ===\n\n";
    $player = init($argv);
    if (!$player)
        return 0;
    $player->display();
}

if (isset($argv[3]))
    echo "my_hearthstone: trop d'arguments";
else
    my_hearthstone($argv);