<?php

namespace AdminJoin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\permission\ServerOperator;

class MainClass extends PluginBase implements Listener{

	public function onLoad(){
		console(TextFormat::GREEN . "AdminJoin by §aZacHack has been loaded!");
	}
	public function onEnable(){
	}
	
	public function onDisable(){
	}
	
	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		if(isOp($player) == true){
			Server::getInstance()->broadcastMessage("Server Admin:".$event->getplayer()->getDisplayName()."");
		}
	}
}
