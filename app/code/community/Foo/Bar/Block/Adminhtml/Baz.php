<?php

class Foo_Bar_Block_Adminhtml_Baz extends Mage_Adminhtml_Block_Widget_Grid_Container {
	public function __construct (){
		$this->_controller = 'adminhtml_baz';
		$this->_blockGroup = 'foo_bar';
		$this->_headerText = Mage::helper('foo_bar')->__('Baz Manager');
		$this->_addButtonLabel = Mage::helper('foo_bar')->__('Add Baz');
	
		parent::__construct();
	}
}