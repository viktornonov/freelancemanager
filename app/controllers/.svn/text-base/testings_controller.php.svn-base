<?php
class TestingsController extends AppController {

	var $name = 'Testings';
	var $helpers = array('Javascript');

	function index() {
		$this->Testing->recursive = 0;
		$this->set('testings', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid testing', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('testing', $this->Testing->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Testing->create();
			if ($this->Testing->save($this->data)) {
				$this->Session->setFlash(__('The testing has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testing could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid testing', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Testing->save($this->data)) {
				$this->Session->setFlash(__('The testing has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testing could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Testing->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for testing', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Testing->delete($id)) {
			$this->Session->setFlash(__('Testing deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Testing was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>