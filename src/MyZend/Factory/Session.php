<?php
namespace MyZend\Factory;

use MyZend\Core\Object;
use Zend\Session\Container;

class Session extends Object
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