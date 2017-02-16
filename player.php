<?php

/**
 * Created by PhpStorm.
 * User: dalil_s
 * Date: 16/02/17
 * Time: 09:41
 */
class deck
{
    private $deck_cards = 10;
}

class card
{
    private $card_name = "name";
    private $type = "type";
    private $class = "Dummy";
    private $mana = 0;
    private $atk = 0;
    private $hp = 0;
    private $desc = "desc";

    public function create_card()
    {
        if ($dir = opendir("json/$this->p_class")) {
            while (($file = readdir($dir)) !== false) {
                if ($file != "." && $file != "..") {
                    $file_contents = file_get_contents("json/$this->p_class/$file") . "\n";
                    preg_match('/nom":\s+"([^"]+)/', $file_contents, $card_name);
                    echo "$card_name[1]\n";
                }
            }
            closedir($dir);
        }
    }
}

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

    public function init_deck()
    {
        echo("Pick a card\n");
        readline();
    }
    public function display()
    {
        echo "Votre pseudo : $this->p_name\n";
        echo "Votre classe : $this->p_class\n";
    }
}