<?php
class PhonesController extends AppController {

	var $name = 'Phones';
	var $helpers = array('Javascript');
	var $componenets = array('RequestHandler');

	function index() {
		$this->Phone->recursive = 0;
		$this->set('phones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid phone', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('phone', $this->Phone->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Phone->create();
			if ($this->Phone->save($this->data)) {
				$this->Session->setFlash(__('The phone has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phone could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid phone', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Phone->save($this->data)) {
				$this->Session->setFlash(__('The phone has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phone could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Phone->read(null, $id);
		}
	}

	function delete($id = null) {
		$this->autoRender = false;
		if($this->RequestHandler->isAjax()) {
			$id = $this->params['form']['id'];
			$this->Phone->delete($id);
		}
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for phone', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Phone->delete($id)) {
			$this->Session->setFlash(__('Phone deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Phone was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>