<?php
defined('IN_IA') or exit('Access Denied');


function chingload() {
	static $loader;
	if(empty($loader)) {
		$chingloader = new Ching_loader();
	}
	return $chingloader;
}


class Ching_loader {
	
	private $cache = array();
	
	function func($name) {
		global $_W;
		if (isset($this->cache['tgfunc'][$name])) {
			return true;
		}
		$file = CHING_CORE . 'function/' . $name . '.func.php';
		if (file_exists($file)) {
			include_once $file;
			$this->cache['tgfunc'][$name] = true;
			return true;
		} else {
			trigger_error('Invalid Helper Function '.CHING_CORE.'function/' . $name . '.func.php', E_USER_ERROR);
			return false;
		}
	}
	
	function model($name) {
		global $_W;
		if (isset($this->cache['tgmodel'][$name])) {
			return true;
		}
		$file = CHING_CORE . 'model/' . $name . '.mod.php';
		if (file_exists($file)) {
			include_once $file;
			$this->cache['tgmodel'][$name] = true;
			return true;
		} else {
			trigger_error('Invalid Model '.CHING_CORE.'model/' . $name . '.mod.php', E_USER_ERROR);
			return false;
		}
	}
	
	function classs($name) {
		global $_W;
		if (isset($this->cache['tgclass'][$name])) {
			return true;
		}
		$file = CHING_CORE . 'class/' . $name . '.class.php';
		if (file_exists($file)) {
			include_once $file;
			$this->cache['tgclass'][$name] = true;
			return true;
		} else {
			trigger_error('Invalid Class '.CHING_CORE.'class/' . $name . '.class.php', E_USER_ERROR);
			return false;
		}
	}
	
	function web($name) {
		global $_W;
		if (isset($this->cache['tgweb'][$name])) {
			return true;
		}
		$file = CHING_PATH . '/web/common/' . $name . '.func.php';
		if (file_exists($file)) {
			include_once $file;
			$this->cache['tgweb'][$name] = true;
			return true;
		} else {
			trigger_error('Invalid Web Helper '.CHING_PATH.'/web/common/' . $name . '.func.php', E_USER_ERROR);
			return false;
		}
	}
	
	function app($name) {
		global $_W;
		if (isset($this->cache['tgapp'][$name])) {
			return true;
		}
		$file = CHING_PATH . '/app/common/' . $name . '.func.php';
		if (file_exists($file)) {
			include_once $file;
			$this->cache['tgapp'][$name] = true;
			return true;
		} else {
			trigger_error('Invalid App Function '.CHING_PATH.'/app/common/' . $name . '.func.php', E_USER_ERROR);
			return false;
		}
	}
	
}
