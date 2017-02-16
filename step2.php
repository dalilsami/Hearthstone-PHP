<?php
/**
 * Created by PhpStorm.
 * User: carra_c
 * Date: 16/02/17
 * Time: 14:01
 */

function load_cards()
{
    $cards = [];
    $dir = opendir("json/paladin");
    while ($file = readdir($dir)) {
        if ($file != "." && $file != "..") {
            $card = new card;
            $card->create_card("paladin", "$file");
            $cards[] = $card;
        }
    }
}