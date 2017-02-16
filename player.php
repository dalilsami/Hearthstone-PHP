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
    private $p_deck = [];
    public function init_player($name, $class)
    {
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
        $this->p_name = $name;
        $this->p_class = $array[$class];
    }

    public function init_deck($player)
    {
        echo("\n=== PICK A DECK ===\n\n");
        echo("Constituez un deck de 10 cartes pour affronter vos ennemis.");
        if ($dir = opendir("json/$player->p_class")) {
            while (($file = readdir($dir)) !== false) {
                if ($file != "." || $file != "..")
                    echo "filename: $file \n";
            }
            closedir($dir);
        }
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