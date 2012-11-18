<div class="projects form">
<?php echo $this->Form2->create('Project', array('enctype'=>'multipart/form-data'));?>
	<fieldset>
		<legend><?php __('Edit Project'); ?></legend>
	<?php
		echo $this->Form2->input('id');
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
		//uploading files
		echo '<div id="dialog-confirmFile" class="dialog-confirms" title="Delete this file?">
					<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This file will be permanently deleted.</p>
					</div>';
		$counterFiles = 1;
		echo '<label for="ContactFile">File</label>';
		echo '<div id="inputFile1" class="clonedInputFile">';
		echo '<input name="data[File][0]" type="file" id="ContactFile">';
		echo '</div>';
		if(!empty($this->data['ProjectsFile'])) {
			foreach	($this->data['ProjectsFile'] as $file) {
				echo '<div id="inputFile'.($counterFiles+1).'" class="clonedInputFile">';
				$filedir = 'http://'.$_SERVER['HTTP_HOST'].'/files/projects/'.$this->data['Project']['id'].'_project/';
				echo $this->Html->link($file['name'], $filedir.$file['file_url'], array('target'=>'_blank'));
				echo $this->Html->link(__('Delete', true), '#', array('onclick' =>  'return false;','class' => 'delProjectFile', 'id'=>'file'.$file['id']));
				echo '</div>';
				$counterFiles++;
				echo '<br />';
			}
		}
		echo '<a href="#" onClick="addFormField(\'clonedInputFile\', \'inputFile\', \'inputFile\', \'File\'); return false;">Add new file</a>';
		echo '<br/><br/>';
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Project.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Project.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Templates', true), array('controller' => 'templates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Template', true), array('controller' => 'templates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags', true), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag', true), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>