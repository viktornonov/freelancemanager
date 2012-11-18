<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<?= $html->css(array('cssreset', 'general', 'jquery-ui-1.8.13.custom', 'form_style'))?>
	<?= $html->script(array('jquery-1.5.1.min', 'jquery-ui-1.8.13.custom.min','jquery.form', 'decoration-script', 'addnewfields', ))?>
</head>
<body>
	<div id="container">
		<div class="controls-buts">
			<div class="controls-body">
				<p>
				Logged in as User </br>
				<a href="#"> sign out </a>
				</p>
			</div>
			<div class="controls-bottom">
			</div>
		</div>
		<ul id="navbar">
			<?php 
				//$menu = new MenuHelper();
				//debug($this);
				$menuItems = $this->Menu->getMenu();
				foreach($menuItems as $menu) {
					$desc = array_keys($menu);
					$vals = array_values($menu);
					$active = '';
					$url = Router::url($this->here, true);
					if(strpos($url, $vals[0]) !== false) {
						$active = 'id="selected"';
					}
					echo '<li '.$active.'>';
					echo '<a href="/'.$vals[0].'/">'.$desc[0].'</a>
					</li>';
				}
			?>
			<!-- 
			<li id="selected">
				<a href="#">Contacts</a>
			</li>
			<li>
				<a href="#">Contacts</a>
			</li>
			<li>
				<a href="#">Contacts</a>
			</li>
			-->
		</ul>
		
		<div id="content">
			<div class="in">
			<?=$content_for_layout?>
			</div>
			<div id="content-bottom">
			</div>
		</div>
		
		<div id="rightBar">
			<div class="sidebar">
				<div class="sidebar-center">
					16:00 GMT
				</div>
				<div class="sidebar-bottom">
				</div>
			</div>
			
			<div class="sidebar">
				<div class="sidebar-center">
					<div class="tit-head">
						<div class="tit-left"></div>
						updates
						<div class="tit-right"></div>
					</div>
					asdadas
				</div>
				<div class="sidebar-bottom">
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>