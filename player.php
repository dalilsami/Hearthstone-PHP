<?php

/**
 * Created by PhpStorm.
 * User: dalil_s
 * Date: 16/02/17
 * Time: 09:41
 */

class player
{
    private $p_name = "derp";
    private $p_class = 0;
    private $p_hp = 15;
    private $p_mp = 0;
    private $p_deck;
    public function init_player($name, $class)
    {
        $this->p_name = $name;
        $this->p_class = $class;
    }
    public function display()
    {
        echo "$this->p_name\n";
        echo "$this->p_class\n";
    }
}

class deck
{
    private $deck_cards = 10;
}