<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 14:01
 */

include_once "my_classes.php";

function init_deck(&$p)
{
    $nb_card = 7;
    while ($nb_card < 10) {
        echo "\n= Ajouter une carte (" . ($nb_card + 1) . "/10) =\n\n";
        display_cards($p->get_p_class(), load_cards());
        echo "\nCommandes :\n- add\n- see\n- deck\n- quit\n\n";
        $command = readline();
        $commands = [
            "quit" => "quit",
            "add" => "add",
            "see" => "see",
            "deck" => "deck",
        ];
        if (isset($commands[$command])) {
            $commands[$command]($p, $nb_card);
        } else
            echo "\nCette commande n'existe pas\n";
    }
    echo "\nVous avez fini votre deck.\n";
    $p->display_deck();
    if (!keep_deck())
        init_deck($p);
}

function keep_deck()
{
    echo "\nEtes-vous sur de vouloir garder ce deck ? (Y/n)\n";
    $answer = readline();
    if ($answer == 'Y' || $answer == 'y')
        return 1;
    else if ($answer == 'N' || $answer == 'n')
        return 0;
    else {
        echo "\nRéponse invalide\n";
        return keep_deck();
    }
}

function see()
{
    $card = null;
    echo("\nQuelle carte voulez-vous regarder ?\n\n");
    $card_name = readline();
    foreach (load_cards() as $tmp_card) {
        if ($card_name === $tmp_card->get_c_name())
            $card = $tmp_card;
    }
    if ($card != null) {
        $card->display();
    } else
        echo "\nCette carte n'existe pas\n";
}

function quit()
{
    echo "\nVoulez-vous vraiment quitter My Hearthstone ? (Y/n)\n";
    $answer = readline();
    if ($answer == "Y") {
        echo "\nAu revoir !\n";
        return 1;
    } elseif ($answer == "n")
        return 0;
    else {
        echo "\nRéponse invalide\n";
    }

}

function add($player, &$nb_card)
{
    $card = null;
    echo("\nQuelle carte voulez-vous ajouter ?\n\n");
    $card_name = readline();
    foreach (load_cards() as $tmp_card) {
        if ($card_name === $tmp_card->get_c_name())
            $card = $tmp_card;
    }
    if ($card != null) {
        if ($card->get_c_class() == $player->get_p_class()) {
            $player->add_card_to_deck($card, $nb_card);
            $nb_card++;
        } else
            echo "Cette carte n'est pas disponible pour votre classe\n";
    } else
        echo "Cette carte n'existe pas\n";
}

function deck($player, $nb_card)
{
    if ($nb_card != 0)
        $player->display_deck();
    else
        echo "\n\nVous n'avez pas de cartes dans votre deck.\n\n";
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