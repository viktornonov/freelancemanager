<?php
class ProjectsFilesController extends AppController {

	var $name = 'ProjectsFiles';

	function index() {
		$this->ProjectsFile->recursive = 0;
		$this->set('projectsFiles', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projects file', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectsFile', $this->ProjectsFile->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectsFile->create();
			if ($this->ProjectsFile->save($this->data)) {
				$this->Session->setFlash(__('The projects file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects file could not be saved. Please, try again.', true));
			}
		}
		$projects = $this->ProjectsFile->Project->find('list');
		$this->set(compact('projects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projects file', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectsFile->save($this->data)) {
				$this->Session->setFlash(__('The projects file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects file could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectsFile->read(null, $id);
		}
		$projects = $this->ProjectsFile->Project->find('list');
		$this->set(compact('projects'));
	}

	function delete($id = null) {
		if($this->RequestHandler->isAjax()) {
				if(isset($this->params['form']['id'])) { //if we call this method from other ajax called method there is no form
					$id = $this->params['form']['id'];
				}
				if($id) {
					$file = $this->ProjectsFile->read(null, $id);
					$filepath = WWW_ROOT.'files/projects/'.$file['ProjectsFile']['project_id'].'_project/'.$file['ProjectsFile']['file_url'];
					unlink($filepath);
					$this->ProjectsFile->delete($id);
				}
		}
		else {
			if ($id) {
				$file = $this->ProjectsFile->read(null, $id);
				debug($file);
				if ($this->ProjectsFile->delete($id)) {
					$filepath = WWW_ROOT.'files/'.$file['ProjectsFile']['project_id'].'_project/'.$file['ProjectsFile']['file_url'];
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