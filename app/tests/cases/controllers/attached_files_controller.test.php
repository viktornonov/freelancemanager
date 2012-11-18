<?php
/* AttachedFiles Test cases generated on: 2011-07-11 09:08:33 : 1310364513*/
App::import('Controller', 'AttachedFiles');

class TestAttachedFilesController extends AttachedFilesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AttachedFilesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.attached_file');

	function startTest() {
		$this->AttachedFiles =& new TestAttachedFilesController();
		$this->AttachedFiles->constructClasses();
	}

	function endTest() {
		unset($this->AttachedFiles);
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