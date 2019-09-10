<?php


namespace mlsdmitry\FloatingText\utils;


use pocketmine\Server;

class Utils {
    public static function loadFirst (string $levelName) {
        Server::getInstance()->loadLevel($levelName);
    }
}