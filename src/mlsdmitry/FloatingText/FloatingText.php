<?php


namespace mlsdmitry\FloatingText;


use mlsdmitry\FloatingText\api\CreateFT;
use mlsdmitry\FloatingText\task\FTParticleUpdater;
use pocketmine\level\Position;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class FloatingText extends PluginBase {
    /** @var Config $floating_texts */
    private $floating_texts;
    /** @var FloatingText */
    private static $instance;
    /** @var FTParticleUpdater $ftpUpdater */
    private $ftpUpdater;

    public function onLoad() {
        self::$instance = $this;
    }

    public function onEnable() {
        $this->floating_texts = new Config($this->getDataFolder() .'texts.yml', Config::YAML);
        $this->ftpUpdater = $this->getScheduler()->scheduleRepeatingTask(new FTParticleUpdater(), 20);
        CreateFT::create('bw' , new Position(100, 100, 100, $this->getServer()->getLevelByName('bw')), 'TEST', 'TITLE', "TEXT\n line 1\n line 2\n");
    }

    public function getFTConfig () : Config {
        return $this->floating_texts;
    }
    public function getFTPTask () {
        return $this->ftpUpdater;
    }

    public static function getInstance () : FloatingText {
        return self::$instance;
    }
}