<?php


namespace mlsdmitry\FloatingText;


use mlsdmitry\FloatingText\utils\Utils;
use pocketmine\level\Position;
use pocketmine\Player;

class FTData {
    public function __construct(string $levelName, Position $position, string $name, string $title, string $text, bool $new = true) {
        Utils::loadFirst($levelName);
        if ($new) $this->init($position, $name, $title, $text);
        return FloatingText::getInstance()->getFTConfig()->getNested($name);
    }

    private function init(Position $position, string $name, string $title, string $text): void {
        $data =
            [
                'levelId' => $position->getLevel()->getId(),
                'levelName' => $position->getLevel()->getName(),
                'coords' => [$position->getFloorX(), $position->getFloorY(), $position->getFloorZ()],
                'title' => $title,
                'text' => $text,
            ];
        FloatingText::getInstance()->getFTConfig()->setNested($name, $data);
        FloatingText::getInstance()->getFTConfig()->save();
    }
}