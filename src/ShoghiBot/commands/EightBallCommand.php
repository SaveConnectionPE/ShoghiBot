<?php
namespace ShoghiBot\commands;
use ShoghiBot\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\Player;

class EightBallCommand extends Command {
    private $plugin;
    public function __construct(Main $plugin){
        parent::__construct("8ball", "Consults the legendary 8Ball", "/8ball", ["8ball","eightball","8"]);
        $this->setPermission("shoghibot.command.eightball");
        $this->plugin = $plugin;
    }
    
    public function execute(CommandSender $sender, $alias, array $args){
        if ($this->getPlugin()->getMainConfig()->get("EightBall") == true){
        $jsonUrl = file_get_contents("https://8ball.delegator.com/magic/JSON/blank");
        
        $GetEightball = json_decode($jsonUrl, true);        
        $EightType = $GetEightball['magic']['type'];
        $EightAnswer = $GetEightball['magic']['answer'];

        $sender->sendMessage(Main::Prefix . $EightType . ": " . $EightAnswer);
        
        return true;
    } else {
            $sender->sendMessage(Main::Prefix . "§cThis command has been disabled!");
        }
    }
    public function getPlugin(){
	   return $this->plugin;
	}
}