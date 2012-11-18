<?php
class EmailsController extends AppController {

	var $name = 'Emails';
	var $helpers = array('Javascript');
	var $companents = array('RequestHandler');

	function index() {
		$this->Email->recursive = 0;
		$this->set('emails', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid email', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('email', $this->Email->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Email->create();
			if ($this->Email->save($this->data)) {
				$this->Session->setFlash(__('The email has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The email could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid email', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Email->save($this->data)) {
				$this->Session->setFlash(__('The email has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The email could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Email->read(null, $id);
		}
	}

	function delete($id = null) {
		$this->autoRender = true;
		if($this->RequestHandler->isAjax()) {
			$id = $this->params['form']['id'];
			$this->Email->delete($id);
		}
		/*
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for email', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Email->delete($id)) {
			$this->Session->setFlash(__('Email deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		*/
		$this->Session->setFlash(__('Email was not deleted', true));
		//$this->redirect(array('action' => 'index'));
	}
}
?>
