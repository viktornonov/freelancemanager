<?php
class AttachedFile extends AppModel {
	var $name = 'AttachedFile';
	var $displayField = 'file_url';
	
	function deleteFile($id) {
		if($id) {
			$file = $this->read(null, $id);
			$filepath = WWW_ROOT.'files/'.$file['AttachedFile']['contact_id'].'_contact/'.$file['AttachedFile']['file_url'];
			unlink($filepath);
			$this->delete($id);
		}
	}
}
?>