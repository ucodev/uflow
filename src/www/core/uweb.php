<?php

class UW_Config {
	private $_use_session = false;
	private $_use_cookies_encrypted = false;

	public function set_session($variable, $value) {
		//$this->_use_session = $state;
	}

	public function get_session($variable) {
		//return $this->_use_session;
	}

	public function set_cookies_encrypted($state = false) {
		$this->_use_cookies_encrypted = $state;
	}

	public function get_cookies_encrypted() {
		return $this->_use_cookies_encrypted;
	}
}

class UW_Core {
	public $config = null;

	public function __construct() {
		$this->config = new UW_Config;
	}
}

