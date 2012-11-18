<?php
class Phone extends AppModel {
	var $name = 'Phone';

	
	function findByContactIdAndPhone($contactId, $phone) {
		return $this->query('select * from phones where contact_id='.$contactId.' and phone=\''.$phone.'\'');
	}
}
?>