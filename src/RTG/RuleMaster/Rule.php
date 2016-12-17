<?php

/**
	* All rights reserved RTGNetworkkk
	* GitHub: https://github.com/RTGNetworkkk
	* Copyrights (c)
*/

namespace RTG\RuleMaster;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

class Rule extends PluginBase implements Listener {
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
					# Rule lines!
					# You can do "" if you dont want a line!
					"Rule1" => "1) Hi",
					"Rule2" => "2) Bye",
					"Rule3" => "3) IG",
					"Rule4" => "4) IG FTW"
					"Rule5" => "5) Respect Staffs!",
					"Rule6" => "6) Hi",
					"Rule7" => "7) Bye",
					"Rule8" => "8) Cya",
					"Rule9" => "another",
					"Rule10" => "end",
		));
		$this->saveResource("config.yml");
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $param) {
		switch(strtolower($cmd->getName())) {
		
			case "r":
			if($sender->hasPermission("rules.command")) {
				if(isset($param[0])) {
					switch(strtolower($param[0])) {
					
						case "1":
							
							$sender->sendMessage(" --- Rules Page 1/2 --- ");
							$sender->sendMessage("- " . $this->cfg->get("Rules1"));
							$sender->sendMessage("- " . $this->cfg->get("Rules2"));
							$sender->sendMessage("- " . $this->cfg->get("Rules3"));
							$sender->sendMessage("- " . $this->cfg->get("Rules4"));
							$sender->sendMessage("- " . $this->cfg->get("Rules5"));
							$sender->sendMessage("");
							$sender->sendMessage("/r < 1 | 2 > for more rules!");
						
							return true;
						break;
						
						case "2":
						
							$sender->sendMessage(" --- Rules 2/2 --- ");
							$sender->sendMessage("- " . $this->cfg->get("Rules6"));
							$sender->sendMessage("- " . $this->cfg->get("Rules7"));
							$sender->sendMessage("- " . $this->cfg->get("Rules8"));
							$sender->sendMessage("- " . $this->cfg->get("Rules9"));
							$sender->sendMessage("- " . $this->cfg->get("Rules10"));
						
						
							return true;
						break;
					}
				}
				else {
					$sender->sendMessage("Usage: /r <1 | 2>");
				}
			}
			else {
				$sender->sendMessage("You have no permission to use this command!");
			}
				return true;
			break;
		}
	}
	
	public function onDisable() {
	}
	
}
