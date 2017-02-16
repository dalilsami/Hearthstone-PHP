<?php
/**
 * Created by PhpStorm.
 * User: dalil_s
 * Date: 16/02/17
 * Time: 09:41
 */
class card
{
    private $c_name = "name";
    private $c_type = "type";
    private $c_class = "Dummy";
    private $c_atk = 0;
    private $c_hp = 0;
    private $c_mp = 0;
    private $c_desc = "desc";

    public function create_card($class, $card)
    {
        if (fopen("json/$class/$card", "r")) {
            $file_contents = file_get_contents("json/$class/$card");
            preg_match('/"nom":\s+"([^"]+)"/', $file_contents, $card_name);
            $this->c_name = $card_name[1];
            preg_match('/"attaque":\s+"([^"]+)"/', $file_contents, $card_atk);
            $this->c_atk = $card_atk[1];
            preg_match('/"vie":\s+"([^"]+)"/', $file_contents, $card_hp);
            $this->c_hp = $card_hp[1];
            preg_match('/"mana":\s+"([^"]+)"/', $file_contents, $card_mp);
            $this->c_mp = $card_mp[1];
            preg_match('/"type":\s+"([^"]+)"/', $file_contents, $card_type);
            $this->c_type = $card_type[1];
            preg_match('/"classe_joueur":\s+"([^"]+)"/', $file_contents, $card_class);
            $this->c_class = $card_class[1];
            preg_match('/"description":\s+"([^"]+)"/', $file_contents, $card_desc);
            $this->c_desc = $card_desc[1];
        }
    }

    public function display()
    {
        echo "$this->c_name\n";
        echo "$this->c_type\n";
        echo "$this->c_class\n";
        echo "$this->c_atk\n";
        echo "$this->c_hp\n";
        echo "$this->c_mp\n";
        echo "$this->c_desc\n";
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

    public function get_p_name()
    {
        return $this->p_name;
    }

    public function get_p_class()
    {
        return $this->p_class;
    }
}