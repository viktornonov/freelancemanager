<?php
App::import('Controller', 'AttachedFiles');
class ContactsController extends AppController {

	var $name = 'Contacts';
	var $helpers = array('Time', 'Session');
	var $components = array('RequestHandler');

	function index() {
		$this->Contact->recursive = 1;
		$this->set('contacts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid contact', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contact', $this->Contact->read(null, $id));
		$this->set('tag', $this->Contact->Tag->find('list'));
	}

	function add() {
		if (!empty($this->data)) {
			//debug($this->data);
			$this->Contact->create();
			if ($this->Contact->save($this->data)) {
				$contactId = $this->Contact->id;
				$newTagsFields = $this->data['Contact']['new_tags'];
				if($newTagsFields != '') {
					$tags = preg_split("/,/", $newTagsFields);
					$this->Contact->Tag->addNewTagsToContact($tags, $this->Contact->id);
				}
				if(!empty($this->data['Email'])) {
					$this->addEmailsToContact($this->data['Email'], $contactId);
				}
				if(!empty($this->data['Phone'])) {
					$this->addPhonesToContact($this->data['Phone'], $contactId);
				}
				if(!empty($this->data['File'])) {
					$this->addFilesToContact($this->data['File'], $contactId);
				}
				$this->Session->setFlash(__('The contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
			}
		}
		$this->set('tags', $this->Contact->Tag->find('list'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid contact', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//debug($this->data);
			if ($this->Contact->save($this->data)) {
				$contactId = $this->Contact->id;
				if(!empty($this->data['Email'])) {
					$this->addEmailsToContact($this->data['Email'], $contactId);
				}
				if(!empty($this->data['Phone'])) {
					$this->addPhonesToContact($this->data['Phone'], $contactId);
				}
				if(!empty($this->data['File'])) {			
					$this->addFilesToContact($this->data['File'], $contactId);
				}
				$newTagsFields = $this->data['Contact']['new_tags'];
				if($newTagsFields != '') {
					$tags = preg_split("/,/", $newTagsFields);
					$this->Contact->Tag->addNewTagsToContact($tags, $this->Contact->id);
				}
				$this->Session->setFlash(__('The contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Contact->read(null, $id);
			$this->set('tags', $this->Contact->Tag->find('list'));
			$this->set('emails', $this->Contact->Email->find('list', array('order'=>'Email.id ASC')));
			$this->set('phones', $this->Contact->Phone->find('list', array('order'=>'Phone.id ASC')));
			$this->set('files', $this->Contact->AttachedFiles->find('list', array('order'=>'AttachedFiles.id ASC')));
		}
	}

	function addPhonesToContact($phones, $contactId) {
		foreach($phones as $phone) {
			$phone = trim($phone);
			if($phone != '') {
				$results = $this->Contact->Phone->findByContactIdAndPhone($contactId, $phone); 
				if(empty($results)) {
					$this->Contact->Phone->create();
					$phoneArray['Phone']['phone'] = $phone;
					$phoneArray['Phone']['contact_id'] = $contactId;
					$this->Contact->Phone->save($phoneArray);
				}
			}
		}
	}
	
	function addEmailsToContact($emails, $contactId) {
		
		foreach($emails as $email) {
			$email = trim($email);
			$results = $this->Contact->Email->findByContactIdAndEmail($contactId, $email); 
			if(empty($results)) {
				if($email != '') {
					$this->Contact->Email->create();
					$emailArray['Email']['email'] = $email;
					$emailArray['Email']['contact_id'] = $contactId;
					$this->Contact->Email->save($emailArray);
				}
			}
		}
		
	}

	function addFilesToContact($files, $contactId) {
		foreach($files as $postfile) {
			if($postfile != NULL) {
				$this->Contact->AttachedFiles->create();
				//making filename	
				$file =& new File($postfile['name']);
				$ext = $file->ext();
				$filename = $file->name().'_'.md5(rand() * time()).'.'.$ext;
				//reading uploaded file
				$file =& new File($postfile['tmp_name']);
				$data = $file->read();
				$file->close();
				//creating folder
				$url = WWW_ROOT.'/files/'.$contactId.'_contact/';
				$folder = new Folder($url, true);
				//writing readed data to destination file
				$file =& new File($url.$filename, true, '0777');
				$file->write($data);
				$file->close();
				//update db
				$fileArray['AttachedFiles']['file_url'] = $filename;
				$fileArray['AttachedFiles']['name'] = $postfile['name'];
				$fileArray['AttachedFiles']['contact_id'] = $contactId;
				$this->Contact->AttachedFiles->save($fileArray);
			}
		}
	}

	function delete($id = null) {
		if($this->RequestHandler->isAjax()) {
			$id = $this->params['form']['id'];
			$contact = $this->Contact->read(null, $id);
			$this->AttachedFiles =& new AttachedFilesController; /*Loads the class*/
			$this->AttachedFiles->constructClasses();
			foreach($contact['AttachedFiles'] as $file) {
				$this->AttachedFiles->delete($file['id']);
			}
			$this->Contact->delete($id);
		}
		else {
			$contact = $this->Contact->read(null, $id);
			debug($contact);
			$this->AttachedFiles =& new AttachedFilesController; /*Loads the class*/
			$this->AttachedFiles->constructClasses();
			foreach($contact['AttachedFiles'] as $file) {
				debug($contact['AttachedFiles']);
				$this->AttachedFiles->delete($file['id']);
			}
			/*
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for contact', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Contact->delete($id)) {
				$this->Session->setFlash(__('Contact deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Contact was not deleted', true));
			$this->redirect(array('action' => 'index'));
			*/
		}
	}
}
?>
