<?php
namespace ShoghiBot\commands;
use ShoghiBot\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class xyzCommand extends Command{ 
    private $plugin;
    public function __construct(Main $plugin) {
        parent::__construct("xyz", "Displays the user's coordinates.", "/xyz", ["xyz","zyx"]);
        $this->setPermission("shoghibot.command.xyz");
        $this->plugin = $plugin;
    }

    public function execute(CommandSender $sender, $label, array $args){
        if ($this->getPlugin()->getMainConfig()->get("XYZ") == true){
            if($sender instanceof Player){
					$playerX = $sender->getX();
                	$playerY = $sender->getY();
                	$playerZ = $sender->getZ();
                    $sender->sendMessage(Main::Prefix . "§bYour coordinates are:");
                    $sender->sendMessage(Main::Prefix . "§bx:§7 " . $playerX . "    §by:§7 " . $playerY . "    §bz:§7 " . $playerZ);
            } else {
                 $sender->getServer()->broadcastMessage(Main::Prefix . "This command can only be used by a player.");
            }
            return true;
        } else {
            $sender->sendMessage(Main::Prefix . "§cThis command has been disabled!");
        }
    }
    
    public function getPlugin(){
	   return $this->plugin;
	}
}