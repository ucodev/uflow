<?php

/* Author: Pedro A. Hortas
 * Email: pah@ucodev.org
 * Date: 24/09/2014
 */

class UW_Base {
	public function base_dir() {
		return '';
	}

	public function base_url() {
		return '';
	}
}

class UW_Config extends UW_Base {
	private $_session_id = null;
	private $_session_data = array();
	private $_use_session = false;
	private $_use_cookies_encrypted = false;

	private function _session_data_serialize() {
		session_start();

		/* TODO: Encrypt session data if _session_cookies_encrypted are enabled */

		$_SESSION['data'] = json_encode($this->_session_data);

		session_write_close();
	}

	public function __construct() {
		if (session_status() == PHP_SESSION_DISABLED) {
			header("HTTP/1.1 403 Forbbiden");
			die("PHP Sessions are disabled.");
		}

		ob_start();

		session_start();

		$this->_session_id = session_id();

		/* TODO: Decrypt session data if _session_cookies_encrypted are enabled */

		if (array_key_exists('data', $_SESSION))
			$this->_session_data = json_decode($_SESSION['data'], true);

		session_write_close();
	}

	public function set_session($variable, $value) {
		$this->_session_data[$variable] = $value;

		$this->_session_data_serialize();
	}

	public function get_session($variable) {
		return $this->_session_data[$variable];
	}

	public function set_cookies_encrypted($state = false) {
		$this->_use_cookies_encrypted = $state;
	}

	public function get_cookies_encrypted() {
		return $this->_use_cookies_encrypted;
	}
}

class UW_Database extends UW_Base {
	/* TODO: */
	private $_db = null;
}

class UW_View extends UW_Base {
	public function load($file, $data) {
		extract($data, EXTR_PREFIX_SAME, "wddx");
		unset($data);

		include('views/' . $file . '.php');
	}
}

class UW_Core {
	public $config = null;
	public $db = null;
	public $view = null;

	public function __construct() {
		$this->config = new UW_Config;
		$this->db = new UW_Database;
		$this->view = new UW_View;
	}
}

