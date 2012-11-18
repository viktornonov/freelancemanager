<?php
class AttachedFilesController extends AppController {

	var $name = 'AttachedFiles';
	var $helpers = array('Time', 'Session', 'Javascript');
	var $components = array('RequestHandler');
	
	function index() {
		$this->AttachedFile->recursive = 0;
		$this->set('attachedFiles', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid attached file', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('attachedFile', $this->AttachedFile->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AttachedFile->create();
			if ($this->AttachedFile->save($this->data)) {
				$this->Session->setFlash(__('The attached file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attached file could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid attached file', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AttachedFile->save($this->data)) {
				$this->Session->setFlash(__('The attached file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attached file could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AttachedFile->read(null, $id);
		}
	}

	function delete($id = null) {
		if($this->RequestHandler->isAjax()) {
			if(isset($this->params['form']['id'])) { //if we call this method from other ajax called method there is no form
				$id = $this->params['form']['id'];
			}
			if($id) {
				$file = $this->AttachedFile->read(null, $id);
				$filepath = WWW_ROOT.'files/'.$file['AttachedFile']['contact_id'].'_contact/'.$file['AttachedFile']['file_url'];
				unlink($filepath);
				$this->AttachedFile->delete($id);
			}
			
		}
		else {
			if ($id) {
				$file = $this->AttachedFile->read(null, $id);
				debug($file);
				if ($this->AttachedFile->delete($id)) {
					$filepath = WWW_ROOT.'files/'.$file['AttachedFile']['contact_id'].'_contact/'.$file['AttachedFile']['file_url'];
					unlink($filepath);
					/*
					$fileObj = new File($filepath);
					if(!$fileObj->delete()) {
						echo 'File can\'t be deleted';
					}
					*/
					$this->Session->setFlash(__('Attached file deleted', true));
					//$this->redirect(array('action'=>'index'));
				}
				$this->Session->setFlash(__('Attached file was not deleted', true));
			}
		}
	}
}
?>