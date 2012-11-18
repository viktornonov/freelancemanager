<?php
class TasksController extends AppController {

	var $name = 'Tasks';
	var $helpers = array('Ajax', 'Javascript');

	function index() {
		//$this->Task->recursive = 0;
		$tasks = $this->Task->generatetreelist(null, null, null, '&nbsp;&nbsp;&nbsp;');
	  	//debug ($this->data); die; 
  		//$this->set(compact('tasks')); 
		
		$this->set('tasks', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid task', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('task', $this->Task->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Task->create();
			if ($this->Task->save($this->data)) {
				$this->Session->setFlash(__('The task has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.', true));
			}
		}
		$parents[0] = "[ Top ]";
  		$tasks = $this->Task->generatetreelist(null,null,null," - ");
  		if($tasks) {
  			foreach ($tasks as $key=>$value) {
  				$parents[$key] = $value;
  			}
  		}
  		$this->set(compact('parents'));
		$milestones = $this->Task->Milestone->find('list');
		$contacts = $this->Task->Contact->find('list');
		$this->set(compact('milestones', 'contacts'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid task', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Task->save($this->data)) {
				$this->Session->setFlash(__('The task has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Task->read(null, $id);
	  		$parents[0] = "[ Top ]";
	  		$tasks = $this->Task->generatetreelist(null,null,null," - ");
	  		if($tasks) {
	  			foreach ($tasks as $key=>$value) {
	  				$parents[$key] = $value;
	  			}
	  		}
	  		$this->set(compact('parents'));
		}
		
		
		$milestones = $this->Task->Milestone->find('list');
		$contacts = $this->Task->Contact->find('list');
		$this->set(compact('milestones', 'contacts'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for task', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Task->delete($id)) {
			$this->Session->setFlash(__('Task deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Task was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>