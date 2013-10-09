<?php

/*
__Pocketmine Plugin__
name=AdminJoin
version=1.1.1
author=ZacHack
class=adminjoin
apiversion=10
*/

class adminjoin implements Plugin{
		private $api, $config;
		public function __construct(ServerAPI $api, $server = false){
				$this->api = $api;
		}
		
		public function init(){
				$this->api->addHandler("player.spawn", array($this, "handle"), 15);
				$this->config = new Config($this->api->plugin->configPath($this)."config.yml", CONFIG_YAML, array(
				"Owner" => "<Owner Username>",
				));
				$this->owner = $this->config->get("Owner");
		}
		
		public function __destruct(){
		}
		
		public function handle($data, $event){
				$username = $data->username;
				switch($event){
						case "player.spawn";
								if($username === $this->owner){
										$permission = $this->api->dhandle("get.player.permission", $username);
										if($permission === "ADMIN"){
												$this->api->chat->broadcast("Server Owner: ".$username." ");
										break;
										}
								}elseif($this->api->ban->isOP($username)){
										$permission = $this->api->dhandle("get.player.permission", $username);
										if($permission === "ADMIN"){
												$this->api->chat->broadcast("Server Admin: ".$username." ");
										break;
										}
								}
				}
		}
}
