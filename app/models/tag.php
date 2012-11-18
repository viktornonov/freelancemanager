<?php
class Tag extends AppModel {
	var $name = 'Tag';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Tag should not be blank',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Contact' => array(
			'className' => 'Contact',
			'joinTable' => 'contacts_tags',
			'foreignKey' => 'tag_id',
			'associationForeignKey' => 'contact_id',
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

	function addNewTagsToContact($tags, $contactId) {
		foreach($tags as $tag) {
			$tagId = $this->getTagIdByNameOrCreteIt($tag);
			$tagsInRelation = $this->query('SELECT * FROM `contacts_tags` WHERE contact_id = \''.$contactId.'\' AND tag_id = \''.$tagId.'\'');
			if(empty($tagsInRelation)) {
				$this->query('INSERT INTO contacts_tags (contact_id, tag_id) VALUES (\''.$contactId.'\', \''.$tagId.'\')');
			}
		}
	}
	
	function addNewTagsToProject($tags, $projectId) {
		foreach($tags as $tag) {
			$tagId = $this->getTagIdByNameOrCreteIt($tag);
			$tagsInRelation = $this->query('SELECT * FROM `projects_tags` WHERE project_id = \''.$projectId.'\' AND tag_id = \''.$tagId.'\'');
			if(empty($tagsInRelation)) {
				$this->query('INSERT INTO projects_tags (project_id, tag_id) VALUES (\''.$projectId.'\', \''.$tagId.'\')');
			}
		}
	}
	
	function getTagIdByNameOrCreteIt($tagName) {
		$tagName = trim($tagName);
		$tagsInDb = $this->query('SELECT * FROM tags WHERE name LIKE \''.$tagName.'\'');
		$hasAnyTags = $this->hasAny('name LIKE \''.$tagName.'\'');
		if(!$hasAnyTags) {
			$this->create();
			$tagArray['Tag']['name'] = $tagName;
			$this->save($tagArray);
			$tagId = $this->getInsertID();
		}
		else {
			$tagId = $tagsInDb[0]['tags']['id'];
		}
		return $tagId;
	}
}
?>