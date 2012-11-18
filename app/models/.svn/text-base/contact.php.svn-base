<?php
class Contact extends AppModel {
		var $name = 'Contact';
		var $displayField = 'name';
		var $hasMany = array(
					'Email' => array(
						'dependent' => true
					), 
					'Phone' => array (
						'dependent' => true
					),
					'AttachedFiles' => array(
						'dependent' => true
					)	
				);
		var $hasAndBelongsToMany = array(
			'Tag' => array(
				'className' => 'Tag',
				'joinTable' => 'contacts_tags',
				'foreignKey' => 'contact_id',
				'associationForeignKey' => 'tag_id',
				'unique' => true,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'finderQuery' => '',
				'deleteQuery' => '',
				'insertQuery' => ''
			)
		);
		var $validate = array(
			'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Name can\'t be empty.',
					//'allowEmpty' => false,
					'required' => true,
				),
			),
		);
		
}
?>