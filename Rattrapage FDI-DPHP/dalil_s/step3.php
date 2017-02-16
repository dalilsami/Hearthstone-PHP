<?php
/**
 * Created by PhpStorm.
 * User: dalil_s
 * Date: 16/02/17
 * Time: 15:33
 */

require_once "step2.php";

function init_ia($ia_name)
{
    $computer = new player();
    $computer->init_player($ia_name, rand(1, 9));
    init_deck_ia($computer);
    $computer->deck_shuffle();
    return $computer;
}

function init_deck_ia(&$comp)
{
    $cards = load_cards();
    $i = 0;
    while ($i < 10) {
        $rn = rand(0, count($cards) - 1);
        if ($cards[$rn]->get_c_class() === $comp->get_p_class())
            $comp->add_card_to_deck($cards[$rn], $i);
        $i++;
    }
}