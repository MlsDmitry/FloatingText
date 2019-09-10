<?php


namespace mlsdmitry\FloatingText;


use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class FloatingText extends PluginBase {
    /** @var Config $floating_texts */
    private $floating_texts;
    public function onEnable() {
        $this->floating_texts = new Config($this->getDataFolder() .'texts.yml', Config::YAML);
    }
}