<?php

namespace ShoghiBot\events;

use ShoghiBot\Main;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

class playerEvents implements Listener{
    
    public $plugin;
    
    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
    
    public function onJoin(PlayerJoinEvent $event) {
        if ($this->getPlugin()->getMainConfig()->get("PlayerJoinEvent") == true){
            $player = $event->getPlayer()->getName();
            $event->setJoinMessage(Main::Prefix . "§e" . $player . " joined the game.");
        }
    }
    public function onQuit(PlayerQuitEvent $event) {
        if ($this->getPlugin()->getMainConfig()->get("PlayerQuitEvent") == true){
            $player = $event->getPlayer()->getName();
            $event->setQuitMessage(Main::Prefix . "§e" . $player . " left the game.");
        }
    }
    public function onDeath(PlayerDeathEvent $event) {
        if ($this->getPlugin()->getMainConfig()->get("PlayerDeathEvent") == true){
            $player = $event->getPlayer()->getName();
            $event->setDeathMessage(Main::Prefix . "§e" . $player . " died.");
        }
    }
    
    public function getPlugin(){
	   return $this->plugin;
	}
}