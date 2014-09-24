<?php

/* Author: Pedro A. Hortas
 * Email: pah@ucodev.org
 * Date: 24/09/2014
 */

class UW_Hello extends UW_Core {
	public function index() {
		$data['value'] = 'Index page';

		$this->view->load('hello', $data);
	}

	public function world($value = '') {
		$data['value'] = $value;

		$this->view->load('hello', $data);
	}
}

