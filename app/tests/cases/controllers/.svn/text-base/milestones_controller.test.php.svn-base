<?php
/* Milestones Test cases generated on: 2011-07-28 13:17:14 : 1311848234*/
App::import('Controller', 'Milestones');

class TestMilestonesController extends MilestonesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MilestonesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.milestone', 'app.project', 'app.contact', 'app.email', 'app.phone', 'app.attached_files', 'app.tag', 'app.contacts_tag', 'app.template', 'app.template_milestone', 'app.projects_file', 'app.contacts_project', 'app.projects_tag', 'app.task');

	function startTest() {
		$this->Milestones =& new TestMilestonesController();
		$this->Milestones->constructClasses();
	}

	function endTest() {
		unset($this->Milestones);
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