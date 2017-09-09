<?php
namespace ShoghiBot\commands;
use ShoghiBot\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class SayCommand extends Command{ 
    private $plugin;
    public function __construct(Main $plugin) {
        parent::__construct("shoghisay", "Sends a message out loud as ShoghiBot", "/say <message>", ["shoghisay","ss"]);
        $this->setPermission("shoghibot.command.say");
        $this->plugin = $plugin;
    }

    public function execute(CommandSender $sender, $label, array $args){
        if ($this->getPlugin()->getMainConfig()->get("Say") == true){
            $sender->getServer()->broadcastMessage(Main::Prefix . $this->getMessagefromArray($args));
            return true;
        } else {
            $sender->sendMessage(Main::Prefix . "§cThis command has been disabled!");
        }
    }
    public function getMessagefromArray($array){
		unset($array[-1]);
		return implode(' ', $array);
	}
    public function getPlugin(){
	   return $this->plugin;
	}
}