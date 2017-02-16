<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 14:01
 */

include_once "my_classes.php";

function see($player, $nb_card)
{
    $card = null;
    echo("Quelle carte regarder ?\n");
    $card_name = readline();
    foreach (load_cards() as $tmp_card) {
        if ($card_name === $tmp_card->get_c_name())
            $card = $tmp_card;
    }
    if ($card != null) {
        echo "ok\n";
    } else
        echo "Cette carte n'existe pas\n";
    return $nb_card;
}

function quit()
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
    }

}

function add($player, $nb_card)
{
    $card = null;
    echo("Quelle carte ajouter ?\n");
    $card_name = readline();
    foreach (load_cards() as $tmp_card) {
        if ($card_name === $tmp_card->get_c_name())
            $card = $tmp_card;
    }
    if ($card != null) {
        $player->add_card_to_deck($card, $nb_card);
        $nb_card++;
    } else
        echo "Cette carte n'existe pas";
    return $nb_card;
}

function deck($player, $nb_card)
{
    $player->display_deck();
}

function load_cards()
{
    $cards = [];
    $classes = [
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
    foreach ($classes as $class) {
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
            echo "- " . $card->get_c_name() . "\n";
    }
}