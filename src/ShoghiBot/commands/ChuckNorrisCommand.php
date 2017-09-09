<?php
namespace ShoghiBot\commands;
use ShoghiBot\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\Player;

class ChuckNorrisCommand extends Command{
    private $plugin;
    public function __construct(Main $plugin){
        parent::__construct("chucknorris", "Sends a random Chuck Norris message to player.", "/chucknorris", ["chucknorris","chuck","norris"]);
        $this->setPermission("shoghibot.command.chucknorris");
        $this->plugin = $plugin;
    }
    
    public function execute(CommandSender $sender, $alias, array $args){
        if ($this->getPlugin()->getMainConfig()->get("ChuckNorris") == true){
        $json = file_get_contents("https://api.chucknorris.io/jokes/random?category,'dev','movie','food','celebrity','science','political','sport','religion','animal','music','history','travel','career','money','fashion'");
        
        $GetChuckQuote = json_decode($json, true);
        $ChuckQuote = $GetChuckQuote['value'];
         
        $sender->sendMessage(Main::Prefix . $ChuckQuote);
        return true;
            
        }else{
            $sender->sendMessage(Main::Prefix . "§cThis command has been disabled!");
        }
    }
    public function getPlugin(){
	   return $this->plugin;
	}
}