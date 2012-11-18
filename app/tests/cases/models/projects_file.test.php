<?php
/* ProjectsFile Test cases generated on: 2011-07-12 13:53:24 : 1310468004*/
App::import('Model', 'ProjectsFile');

class ProjectsFileTestCase extends CakeTestCase {
	var $fixtures = array('app.projects_file', 'app.project', 'app.contact', 'app.email', 'app.phone', 'app.attached_files', 'app.tag', 'app.contacts_tag', 'app.template', 'app.contacts_project', 'app.projects_tag');

	function startTest() {
		$this->ProjectsFile =& ClassRegistry::init('ProjectsFile');
	}

	function endTest() {
		unset($this->ProjectsFile);
		ClassRegistry::flush();
	}

}
?>