<?php

class Foo_Bar_Model_Resource_Baz extends Mage_Core_Model_Resource_Db_Abstract {
	public function _construct (){
		$this->_init('foo_bar/baz', 'id');
	}
}