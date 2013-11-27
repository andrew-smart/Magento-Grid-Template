<?php

class Foo_Bar_Adminhtml_BazController extends Mage_Adminhtml_Controller_Action {
	protected function initAction (){
		$this->loadLayout()
			 ->_setActiveMenu('foo_bar/baz');
		
		return $this;
	}
	
	public function indexAction (){
		$this->initAction()
			 ->_addContent($this->getLayout()->createBlock('foo_bar/adminhtml_baz'))
			 ->renderLayout();
	}
	
	public function newAction (){
		$this->_forward('edit');
	}
	
	public function editAction (){
		$id = $this->getRequest()->getParam('id');
		
		$model = Mage::getModel('foo_bar/baz');
		if ($id){
			$model->load($id);
			
			if (!$model->getId()){
				$this->_getSession()->addError($this->__('Baz does not exist'));
				$this->_redirect('*/*/');
				return;
			}
		}
		
		Mage::register('baz_data', $model);
		
		$this->initAction()
			 ->_addContent($this->getLayout()->createBlock('foo_bar/adminhtml_baz_edit'))
			 ->renderLayout();
	}
	
	public function deleteAction (){
		$id = $this->getRequest()->getParam('id');
		if ($id){
			try {
				$model = Mage::getModel('foo_bar/baz')->load($id);
				if (!$model->getId()){
					$this->_getSession()->addError("Baz $id does not exist");
					$this->_redirect("*/*/");
					return;
				}
				
				$model->delete();
				$this->_getSession()->addSuccess($this->__('Baz deleted.'));
			} catch (Exception $e){
				$this->_getSession()->addError($e->getMessage());
			}
		}
		
		$this->_redirect("*/*/");
	}
	
	public function saveAction (){
		$data = $this->getRequest()->getPost();
		
		if ($data){
			try {
				$model = Mage::getModel('foo_bar/baz');
				$model->setData($data);
				$model->save();
				
				$this->_getSession()->addSuccess($this->__('Saved.'));
			} catch (Exception $e){
				$this->_getSession()->addError($e->getMessage());
			}
		}
		
		$this->_redirect("*/*/");
	}
	
	public function massDeleteAction (){
		$data = $this->getRequest()->getParam('baz');
		if (!is_array($data)){
			$this->_getSession()->addError(
				$this->__("Please select at least one record")
			);
		} else {
			try {
				foreach ($data as $id){
					$baz = Mage::getModel('foo_bar/baz')->load($id);
					$baz->delete();
				}
				
				$this->_getSession()->addSuccess(
					$this->__('Total of %d record(s) have been deleted.', count($data))
				);
			} catch (Exception $e){
				$this->_getSession()->addError($e->getMessage());
			}
		}
		
		$this->_redirect("*/*/");
	}
}