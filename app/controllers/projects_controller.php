<?php
class ProjectsController extends AppController {
	var $helpers = array("Form2");
	var $name = 'Projects';

	function index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Project->create();
			if ($this->Project->save($this->data)) {
				$projectId = $this->Project->id;
				$newTagsFields = $this->data['Project']['new_tags'];
				if($newTagsFields != '') {
					$tags = preg_split("/,/", $newTagsFields);
					$this->Project->Tag->addNewTagsToProject($tags, $this->Project->id);
				}
				if(!empty($this->data['File'])) {			
					$this->addFilesToProject($this->data['File'], $this->Project->id);
				}
				$this->Session->setFlash(__('The project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
			}
		}
		$clients = $this->Project->Client->find('list');
		$managers = $this->Project->Manager->find('list');
		$templates = $this->Project->Template->find('list');
		$contacts = $this->Project->Contact->find('list');
		$tags = $this->Project->Tag->find('list');
		$this->set(compact('clients', 'managers', 'templates', 'contacts', 'tags'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Project->save($this->data)) {
				$newTagsFields = $this->data['Project']['new_tags'];
				if($newTagsFields != '') {
					$tags = preg_split("/,/", $newTagsFields);
					$this->Project->Tag->addNewTagsToProject($tags, $this->Project->id);
				}
				if(!empty($this->data['File'])) {			
					$this->addFilesToProject($this->data['File'], $this->Project->id);
				}
				$this->Session->setFlash(__('The project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
		$clients = $this->Project->Client->find('list');
		$managers = $this->Project->Manager->find('list');
		$templates = $this->Project->Template->find('list');
		$contacts = $this->Project->Contact->find('list');
		$tags = $this->Project->Tag->find('list');
		$files = $this->Project->ProjectsFile->find('list');
		$this->set(compact('clients', 'managers', 'templates', 'contacts', 'tags', 'files'));
	}

	function delete($id = null) {
		App::import('Controller', 'ProjectsFiles');
		if($this->RequestHandler->isAjax()) {
			$id = $this->params['form']['id'];
			$project = $this->Project->read(null, $id);
			$this->ProjectsFiles =& new ProjectsFilesController; /*Loads the class*/
			$this->ProjectsFiles->constructClasses();
			foreach($project['ProjectsFile'] as $file) {
				$this->ProjectsFiles->delete($file['id']);
			}
			$this->Project->delete($id);
		}
		else {
			$id = $this->params['form']['id'];
			$project = $this->Project->read(null, $id);
			$this->ProjectsFiles =& new ProjectsFilesController; /*Loads the class*/
			$this->ProjectsFiles->constructClasses();
			foreach($project['ProjectsFile'] as $file) {
				$this->ProjectsFiles->delete($file['id']);
			}
			$this->Project->delete($id);
		}
	}
		
	function addFilesToProject($files, $projectId) {
		$UPLOAD_DIR = WWW_ROOT.'/files/projects/';
		foreach($files as $postfile) {
			if($postfile != NULL) {
				$this->Project->ProjectsFile->create();
				//making filename	
				$file =& new File($postfile['name']);
				$ext = $file->ext();
				$filename = $file->name().'_'.md5(rand() * time()).'.'.$ext;
				//reading uploaded file
				$file =& new File($postfile['tmp_name']);
				$data = $file->read();
				$file->close();
				//creating folder
				$url = $UPLOAD_DIR.$projectId.'_project/';
				$folder = new Folder($url, true);
				//writing readed data to destination file
				$file =& new File($url.$filename, true, '0777');
				$file->write($data);
				$file->close();
				//update db
				$fileArray['ProjectsFile']['file_url'] = $filename;
				$fileArray['ProjectsFile']['name'] = $postfile['name'];
				$fileArray['ProjectsFile']['project_id'] = $projectId;
				$this->Project->ProjectsFile->save($fileArray);
			}
		}
	}
}
?>