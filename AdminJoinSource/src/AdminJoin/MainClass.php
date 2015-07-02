<?php
namespace AdminJoin;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
class MainClass extends PluginBase implements Listener{
	public function onEnable(){
		$this->getserver()->getPluginManager()->registerEvents($this, $this);
		if(!is_dir($this->getDataFolder())){
			@mkdir($this->getDataFolder());
		}
		$config = new Config($this->getDataFolder()."config.yml", CONFIG::YAML, array(
			"Message" => "Server Op: {player}",
		));
	}

	/**
	 * @param PlayerJoinEvent $event
	 *
	 * @priority MONITOR
	 * @ignoreCancelled true
	 */
	public function onJoin(PlayerJoinEvent $event){
		$config = new Config($this->getDataFolder()."config.yml", CONFIG::YAML);
			if($event->getPlayer()->isOp()){
				$name = $event->getPlayer()->getDisplayName();
				$message = $config->get("Message");
				$message = str_replace("{player}", $name, $message);
				$this->getServer()->broadcastMessage(TextFormat::GREEN.$message);
			}
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "adminjoin":
				if(!isset($args[0])){
					$sender->sendMessage(TextFormat::RED."Usage: ".$command->getUsage()."");
					return true;
				}else{
					$config = new Config($this->getDataFolder()."config.yml", CONFIG::YAML);
					$args = implode(" ", $args);
					$config->set("Message", $args);
					$sender->sendMessage(TextFormat::GREEN."[AdminJoin] You have changed the message");
					return true;
				}
		}
	}
}
