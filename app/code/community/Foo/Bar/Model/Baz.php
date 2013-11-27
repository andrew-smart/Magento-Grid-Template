<?php

class Foo_Bar_Model_Baz extends Mage_Core_Model_Abstract {
	public function _construct (){
		parent::_construct();
		$this->_init('foo_bar/baz');
	}
}