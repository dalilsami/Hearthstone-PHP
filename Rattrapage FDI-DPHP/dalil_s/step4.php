<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 17:35
 */

function init_game()
{
    $coin = rand(1, 2);
    echo "Pile ou Face ?";
    $p_coin = readline();
    while ($p_coin != "Pile" && $p_coin != "Face") {
        echo "Pile ou Face ?";
        $p_coin = readline();
    }
    if ($coin == 1)
        $coin = "Pile";
    else
        $coin = "Face";
    if ($p_coin == $coin)
        echo "C'est $coin, vous commencez !";
    else
        echo "C'est $coin, vous jouez en deuxieme !";
}