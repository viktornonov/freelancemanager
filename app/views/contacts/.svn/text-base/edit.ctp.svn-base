<?php echo $html->script('jquery.validate.min')?>
<?php echo $html->script('contact-form-validation')?>
<div class="contacts form">
<?php echo $this->Form->create('Contact', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
		<legend><?php __('Edit Contact'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('class'=>'required'));
		echo $this->Form->input('address');
		echo $this->Form->input('description');
		echo $this->Form->input('company');
		echo $this->Form->input('IM');
		echo '<label for="ContactEmail">Email</label>';
		$counterEmails = 0;
		//$countOfEmails = count($this);
		echo '<div id="dialog-confirm" class="dialog-confirms" title="Delete this email?">
					<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This email will be permanently deleted.</p>
					</div>';
		foreach($this->data['Email'] as $email) {
			echo '<div id="input'.($counterEmails + 1).'" class="clonedInput">';
			echo '<input name="data[Email]['.$counterEmails.']" type="text" id="ContactEmail" value="'.$email['email'].'" class="required email">';
			//echo $this->Html->link(__('Delete', true), array('controller' => 'emails','action' => 'delete', $email['id']), null, sprintf(__('Are you sure you want to remove email %s from contact?', true), $email['email']));
			if($counterEmails > 0) {
				echo $this->Html->link(__('Delete', true), '#',array('onclick' => 'return false;','class' => 'delEmail', 'id'=>'email'.$email['id']));
			}
			echo '</div>';
			$counterEmails++;
		}
		echo '<a href="#" onClick="addFormField(\'clonedInput\', \'input\',\'input\', \'Email\', '.$counterEmails.'); return false;">Add new email</a>';
		echo '<br/><br/>';
		$counterPhones = 0;
		echo '<label for="ContactPhone">Phone</label>';
		echo '<div id="dialog-confirmPhone" class="dialog-confirms" title="Delete this phone?">
					<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This phone will be permanently deleted.</p>
					</div>';
		if(empty($this->data['Phone'])) {
			echo '<div id="inputPhone1" class="clonedInputPhone">';
			echo '<input name="data[Phone][0]" type="text" id="ContactPhone">';
			echo '</div>';
		}
		else {
			foreach($this->data['Phone'] as $phone) {
				echo '<div id="inputPhone'.($counterPhones+1).'" class="clonedInputPhone">';
				echo '<input name="data[Phone]['.$counterPhones.']" type="text" id="ContactPhone" value="'.$phone['phone'].'">';
				if($counterPhones > 0) {
					echo $this->Html->link(__('Delete', true), '#', array('onclick' =>  'return false;','class' => 'delPhone', 'id'=>'phone'.$phone['id']));
				}
				echo '</div>';
				$counterPhones++;
			}
		}
		echo '<a href="#" onClick="addFormField(\'clonedInputPhone\', \'inputPhone\', \'inputPhone\', \'Phone\', '.$counterPhones.'); return false;">Add new phone</a>';
		echo '<br/><br/>';
		$counterFiles = 1;
		echo '<label for="ContactFile">File</label>';
		echo '<div id="dialog-confirmFile" class="dialog-confirms" title="Delete this file?">
					<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This file will be permanently deleted.</p>
					</div>';
		//echo '<div class="input file">';
		echo '<div id="inputFile1" class="clonedInputFile">';
		echo '<input name="data[File][0]" type="file" id="ContactFile">';
		echo '</div>';
		if(!empty($this->data['AttachedFiles'])) {
			foreach	($this->data['AttachedFiles'] as $file) {
				echo '<div id="inputFile'.($counterFiles+1).'" class="clonedInputFile">';
				$filedir = 'http://'.$_SERVER['HTTP_HOST'].'/files/'.$this->data['Contact']['id'].'_contact/';
				echo $this->Html->link($file['name'], $filedir.$file['file_url'], array('target'=>'_blank'));
				echo $this->Html->link(__('Delete', true), '#', array('onclick' =>  'return false;','class' => 'delFile', 'id'=>'file'.$file['id']));
				echo '</div>';
				$counterFiles++;
				echo '<br />';
			}
		}
		echo '<a href="#" onClick="addFormField(\'clonedInputFile\', \'inputFile\', \'inputFile\', \'File\'); return false;">Add new file</a>';
		//echo '</div>';
		echo '<br/><br/>';
		echo $this->Form->input('Tag',  array('label' => 'Related Tags'));
		echo $this->Form->input('new_tags', array('label' => 'Add Tags (comma separated)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Edit Contact', true));?>
</div>
<!-- 
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Contact.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Contact.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Emails', true), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email', true), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Phones', true), array('controller' => 'phones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Phone', true), array('controller' => 'phones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attached Files', true), array('controller' => 'attached_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attached Files', true), array('controller' => 'attached_files', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->