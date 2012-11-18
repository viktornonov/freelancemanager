<?php
/* Tasks Test cases generated on: 2011-07-28 13:17:49 : 1311848269*/
App::import('Controller', 'Tasks');

class TestTasksController extends TasksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TasksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.task', 'app.milestone', 'app.project', 'app.contact', 'app.email', 'app.phone', 'app.attached_files', 'app.tag', 'app.contacts_tag', 'app.template', 'app.template_milestone', 'app.projects_file', 'app.contacts_project', 'app.projects_tag');

	function startTest() {
		$this->Tasks =& new TestTasksController();
		$this->Tasks->constructClasses();
	}

	function endTest() {
		unset($this->Tasks);
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