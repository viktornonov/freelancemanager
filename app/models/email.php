<?php
class Email extends AppModel {
	var $name = 'Email';
	
	function findByContactIdAndEmail($contactId, $email) {
		return $this->query('select * from emails where contact_id='.$contactId.' and email=\''.$email.'\'');
	}
}
?>