<?php
namespace AdminJoin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class MainClass extends PluginBase implements Listener{

	public function onEnable(){
		$this->getserver()->getPluginManager()->registerEvents($this, $this);
	}
	
	/**
	 * @param PlayerJoinEvent $event
	 * 
	 * @priority MONITOR
	 * @ignoreCancelled true
	 */
	public function onJoin(PlayerJoinEvent $event){
		if($event->getPlayer()->isOp()){
			$this->getServer()->broadcastMessage("Server Op: " . $event->getPlayer()->getDisplayName());
		}
	}
}
