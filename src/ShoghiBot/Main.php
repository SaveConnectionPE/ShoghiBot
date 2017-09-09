<?php
namespace ShoghiBot;

use ShoghiBot\commands\SayCommand;
use ShoghiBot\commands\ChuckNorrisCommand;
use ShoghiBot\commands\EightBallCommand;
use ShoghiBot\commands\SplashCommand;
use ShoghiBot\commands\xyzCommand;
use ShoghiBot\events\playerEvents;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
    const Prefix = "§9ShoghiBot §7>§r ";
    public function onLoad(){
        $this->getLogger()->info(self::Prefix . "ShoghiBot is loading...");
    }
    
    public function onEnable(){
        $this->getLogger()->info(self::Prefix . "ShoghiBot has been activated!");
        $this->registerCommands();
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->getMainConfig = new Config($this->getdatafolder() . "config.yml", Config::YAML);
    }

    public function registerCommands(){
        $this->getServer()->getCommandMap()->register("chucknorris", new ChuckNorrisCommand($this));
        $this->getServer()->getCommandMap()->register("say", new SayCommand($this));
        $this->getServer()->getCommandMap()->register("8ball", new EightBallCommand($this));
        $this->getServer()->getCommandMap()->register("splash", new SplashCommand($this));
        $this->getServer()->getCommandMap()->register("xyz", new xyzCommand($this));
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getPluginManager()->registerEvents(new playerEvents($this), $this);
    }
    
    public function getMainConfig(){
        return $this->getMainConfig;
    }
}