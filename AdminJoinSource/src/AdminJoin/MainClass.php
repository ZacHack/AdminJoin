<?php

namespace AdminJoin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\permission\ServerOperator;

class MainClass extends PluginBase implements Listener{

	public function onEnable(){
		$this->getserver()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onDisable(){
	}
	
	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$name = $player->getDisplayName();
		if($player->isOp()){
			Server::getInstance()->broadcastMessage("Server Op: ".$name."");
		}
	}
}
