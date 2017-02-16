<?php

/**
 * Created by PhpStorm.
 * User: dalil_s
 * Date: 16/02/17
 * Time: 09:41
 */

class player
{
    private $p_name = "Dummy";
    private $p_class = "Dummy";
    private $p_hp = 15;
    private $p_mp = 0;
    private $p_deck;
    public function init_player($name, $class)
    {
        $array = [
            1 => "Mage",
            2 => "Chasseur",
            3 => "Druide",
            4 => "Paladin",
            5 => "Prêtre",
            6 => "Voleur",
            7 => "Chaman",
            8 => "Démoniste",
            9 => "Guerrier",
        ];
        $this->p_name = $name;
        $this->p_class = $array[$class];
    }
    public function display()
    {
        echo "Votre pseudo : $this->p_name\n";
        echo "Votre classe : $this->p_class\n";
    }
}

class deck
{
    private $deck_cards = 10;
}