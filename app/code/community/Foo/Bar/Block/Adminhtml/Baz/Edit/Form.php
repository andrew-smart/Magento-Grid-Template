<?php

class Foo_Bar_Block_Adminhtml_Baz_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
	protected function _prepareForm (){
		$model = Mage::registry('baz_data');
		
		$form = new Varien_Data_Form(array(
			'id' => 'edit_form',
			'action' => $this->getUrl("*/*/save", array('id' => $this->getRequest()->getParam('id'))),
			'method' => 'post'
		));
		
        $fieldset = $form->addFieldset('baz_form', array(
			'legend' => Mage::helper('foo_bar')->__('Baz information')
		));
		
		$fieldset->addField('name', 'text', array(
			'label'     => Mage::helper('foo_bar')->__('Name'),
			'class'     => 'required-entry',
			'required'  => true,
			'name'      => 'name',
		));
		
		if ($model->getId()){
			$fieldset->addField('id', 'hidden', array(
				'name' => 'id',
            ));
		}
		
		$form->setUseContainer(true);
		$form->setValues($model->getData());
		$this->setForm($form);
		
		return parent::_prepareForm();
	}
}