<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 14:01
 */

include_once "my_classes.php";

function quit($nb_card)
{
    echo "Voulez-vous vraiment quitter My Hearthstone ? (Y/n)\n";
    $answer = readline();
    if ($answer == "Y") {
        echo "Au revoir !\n";
        return 1;
    } elseif ($answer == "n")
        return 0;
    else {
        echo "Réponse invalide\n";
        return $nb_card;
    }

}

function add($nb_card)
{
    echo("Quelle carte ajouter ?");
    $card = readline();
    $player->p_deck[$nb_card] = $card;
    $nb_card++;
    return $nb_card;
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