<?php
namespace MyZend\Factory;

use Zend\Session\Container;

class Session
{
	private $session; 
	
	public function __construct() {
		$this->session = new Container('base');
	}

	public function set($key, $value) {
		$this->session->offsetSet($key, $value);		
	}
	
	public function get($key) {
		return $this->session->offsetGet($key);		
	}


}