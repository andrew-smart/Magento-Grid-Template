<?php

class Foo_Bar_Block_Adminhtml_Baz_Grid extends Mage_Adminhtml_Block_Widget_Grid {
	public function __construct (){
		parent::__construct();
		
		$this->setId('foo_bar_baz_grid');
		$this->setDefaultSort('id');
		$this->setDefaultDir('asc');
		$this->setSaveParametersInSession(true);
	}
	
    protected function _prepareCollection (){
		$collection = Mage::getModel('foo_bar/baz')->getCollection();
		$this->setCollection($collection);
		
		return parent::_prepareCollection();
	}
	
	protected function _prepareColumns (){
		$this->addColumn('name', array(
			'header' => Mage::helper('foo_bar')->__('Name'),
			'index' => 'name'
		));
	}
	
	protected function _prepareMassaction (){
		$this->setMassactionIdField('id');
		$this->getMassactionBlock()->setFormFieldName('baz');

		$this->getMassactionBlock()->addItem('delete', array(
			'label'    => Mage::helper('foo_bar')->__('Delete'),
			'url'      => $this->getUrl('*/*/massDelete'),
			'confirm'  => Mage::helper('foo_bar')->__('Are you sure?')
		));
		
		return parent::_prepareMassaction();
	}
	
	public function getRowUrl ($row){
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}
}