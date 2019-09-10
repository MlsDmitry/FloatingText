<?php


namespace mlsdmitry\FloatingText\task;


use mlsdmitry\FloatingText\FloatingText;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\level\Position;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class FTParticleUpdater extends Task {
    private $data = [];
    public function __construct() {
        $this->data = FloatingText::getInstance()->getFTConfig()->getAll();
    }

    public function onRun(int $currentTick) {
        foreach ($this->data as $name => $info) {
            $level = Server::getInstance()->getLevel($info['levelId']);
            if ($level) $level->loadChunk($info['coords'][0] >> 4, $info['coords'][2] >> 4);
            $floatText = new FloatingTextParticle(new Position($info['coords'][0], $info['coords'][1], $info['coords'][2], $level), strval($info['title']), strval($info['text']));
            if ($level) $level->addParticle($floatText);
        }
    }
    public function cancel () {
        $this->getHandler()->cancel();
    }
}