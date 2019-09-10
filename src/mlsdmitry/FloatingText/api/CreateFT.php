<?php


namespace mlsdmitry\FloatingText\api;


use mlsdmitry\FloatingText\FloatingText;
use mlsdmitry\FloatingText\FTData;
use mlsdmitry\FloatingText\task\FTParticleUpdater;
use pocketmine\level\Position;

class CreateFT {
    public static function create (string $levelName, Position $position, string $name, string $title, string $text) {
        new FTData($levelName, $position, $name, $title, $text);
        FloatingText::getInstance()->getFTPTask()->cancel();
        FloatingText::getInstance()->getScheduler()->scheduleRepeatingTask(new FTParticleUpdater(), 20);

    }
}