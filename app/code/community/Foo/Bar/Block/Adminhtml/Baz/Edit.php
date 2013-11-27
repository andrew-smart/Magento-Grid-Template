<?php

class Foo_Bar_Block_Adminhtml_Baz_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
	public function __construct (){
		$this->_blockGroup = 'foo_bar';
		$this->_controller = 'adminhtml_baz';
		
		parent::__construct();
	}
	
	public function getHeaderText (){
		return $this->__('Baz');
	}
}