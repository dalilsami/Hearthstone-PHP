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

    public function init_deck()
    {
        if ($dir = opendir("json/$this->p_class")) {
            while (($file = readdir($dir)) !== false) {
                if ($file != "." && $file != "..") {
                    $file_contents = file_get_contents("json/$this->p_class/$file") . "\n";
                    preg_match('/nom":\s+"([^"]+)/', $file_contents, $card_name);
                    echo "$card_name[1]\n";
                }
            }
            echo("Pick a card\n");
            $prompt = readline();

            closedir($dir);
        }
    }
    public function display()
    {
        echo "Votre pseudo : $this->p_name\n";
        echo "Votre classe : $this->p_class\n";
    }
}

class card
{
    private $c_name = "name";
    private $c_type = "type";
    private $c_class = "Dummy";
    private $c_mana = 0;
    private $c_atk = 0;
    private $c_hp = 0;
    private $c_desc = "desc";
}