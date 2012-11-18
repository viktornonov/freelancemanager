<?php
/* ProjectsFiles Test cases generated on: 2011-07-12 13:53:42 : 1310468022*/
App::import('Controller', 'ProjectsFiles');

class TestProjectsFilesController extends ProjectsFilesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ProjectsFilesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.projects_file', 'app.project', 'app.contact', 'app.email', 'app.phone', 'app.attached_files', 'app.tag', 'app.contacts_tag', 'app.template', 'app.contacts_project', 'app.projects_tag');

	function startTest() {
		$this->ProjectsFiles =& new TestProjectsFilesController();
		$this->ProjectsFiles->constructClasses();
	}

	function endTest() {
		unset($this->ProjectsFiles);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>