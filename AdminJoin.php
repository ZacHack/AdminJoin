<?php

/*
__Pocketmine Plugin__
name=AdminJoin
version=1.0.0
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
				$this->api->addHandler("player.join", array($this, "handle"), 15);
		}
		
		public function __destruct(){
		}
		
		public function handle($data, $event){
				$username = $data->username;
				switch($event){
						case "player.join";
								if($this->api->ban->isOP($username)){
										$permission = $this->api->dhandle("get.player.permission", $username);
										if($permission === "ADMIN"){
												$this->api->chat->broadcast("Server Admin: ".$username." ");
										break;
										}
								}
				}
		}
}
