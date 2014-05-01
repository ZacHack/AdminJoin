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
		console(TextFormat::GREEN . "onEnable() has been called");
	}
	
	public function onDisable(){
		console(TextFormat::GREEN . "onDisable() has been called");
	}
	
	public function onJoin(PlayerJoinEvent $event){
		console(TextFormat::YELLOW . 
		"its working!");
		Server::getInstance()->broadcastMessage("its working!");
		$player = $event->getPlayer();
		if(isOp($player) == true){
			Server::getInstance()->broadcastMessage("Server Admin:".$event->getplayer()->getDisplayName()."");
		}
	}
}
