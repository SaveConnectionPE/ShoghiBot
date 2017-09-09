<?php
namespace ShoghiBot\commands;
use ShoghiBot\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\Player;

class SplashCommand extends Command {
    private $plugin;
    public function __construct(Main $plugin){
        parent::__construct("splash", "Prints a random Minecraft Pocket Edition (v1.0.0) Splash", "/splash", ["splash","splashes"]);
        $this->setPermission("shoghibot.command.splash");
        $this->plugin = $plugin;
    }
    
    public function execute(CommandSender $sender, $alias, array $args){
        if ($this->getPlugin()->getMainConfig()->get("MinecraftSplash") == true){
            $jsonUrl = file_get_contents("https://raw.githubusercontent.com/willtheorangeguy/Minecraft-Splashes/master/Normal%20Splashes.json");
            $GetSplashesJson = json_decode($jsonUrl, true);
            $GetSplashes = $GetSplashesJson['splashes'];            
            $GetRandomSplash = $GetSplashes[mt_rand(0, count($GetSplashes) - 1)];
            $sender->sendMessage(Main::Prefix . "§e" . $GetRandomSplash);    
            return true;
    } else {
            $sender->sendMessage(Main::Prefix . "§cThis command has been disabled!");
        }
    }
    public function getPlugin(){
	   return $this->plugin;
	}
}