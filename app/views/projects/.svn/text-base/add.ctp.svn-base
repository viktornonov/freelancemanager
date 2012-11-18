<div class="projects form">
<?php echo $this->Form2->create('Project', array('enctype'=>'multipart/form-data'));?>
	<fieldset>
		<legend><?php __('Add Project'); ?></legend>
	<?php
		echo $this->Form2->input('name');
		echo $this->Form2->input('description');
		echo $this->Form2->input('url');
		echo $this->Form2->input('start_date');
		echo $this->Form2->input('end_goal');
		echo $this->Form2->input('status');
		echo $this->Form2->input('progress');
		echo $this->Form2->input('client_id');
		echo $this->Form2->input('manager_id');
		echo $this->Form2->input('template_id');
		echo $this->Form2->input('stage');
		//file uploading
		echo '<label for="ContactFile">File</label>';
		echo '<div class="input file">';
		echo '<div id="inputFile1" class="clonedInputFile">';
		echo '<input name="data[File][0]" type="file" id="ContactFile">';
		echo '</div>';
		echo '<a href="#" onClick="addFormField(\'clonedInputFile\', \'inputFile\', \'inputFile\', \'File\'); return false;">Add new file</a>';
		
		echo $this->Form2->input('Contact');
		echo $this->Form2->input('Tag');
		echo $this->Form2->input('new_tags', array('label' => 'Add Tags (comma separated)'));
	?>
	</fieldset>
<?php echo $this->Form2->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Templates', true), array('controller' => 'templates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Template', true), array('controller' => 'templates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags', true), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag', true), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>