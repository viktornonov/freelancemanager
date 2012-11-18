<?php
/* TemplateMilestone Test cases generated on: 2011-07-28 13:13:09 : 1311847989*/
App::import('Model', 'TemplateMilestone');

class TemplateMilestoneTestCase extends CakeTestCase {
	var $fixtures = array('app.template_milestone', 'app.template');

	function startTest() {
		$this->TemplateMilestone =& ClassRegistry::init('TemplateMilestone');
	}

	function endTest() {
		unset($this->TemplateMilestone);
		ClassRegistry::flush();
	}

}
?>