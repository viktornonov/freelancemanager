<?php
class MenuHelper extends AppHelper {
	
	function getMenu() {
		$menuItems = array();
		$menuItems[0] = array('Dashboard' => '#');
		$menuItems[1] = array('Contacts' => 'contacts');
		$menuItems[3] = array('Projects' => 'projects');
		return $menuItems;
	}
}
?>