<?php echo $html->script('jquery.validate.min')?>
<?php echo $html->script('contact-form-validation')?>

<div class="contacts form">
<?php echo $this->Session->flash();?>
<?php echo $this->Form->create('Contact', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
		<legend><?php __('Add Contact'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class' => 'required name'));
		echo $this->Form->input('address');
		echo $this->Form->input('description');
		echo $this->Form->input('company');
		echo $this->Form->input('IM');
		echo '<label for="ContactEmail">Email</label>';
		echo '<div id="input1" class="clonedInput">';
		echo '<input name="data[Email][0]" type="text" id="ContactEmail" class="required email">';
		//echo '<input name="data[Email][0]" type="text" id="ContactEmail" class="{validate:{required:true, email:true, messages:{required:\'Please enter your email address\', email:\'Please enter a valid email address\'}}}">';
		echo '</div>';
		echo '<a href="#" onClick="addFormField(\'clonedInput\', \'input\',\'input\', \'Email\'); return false;">Add new email</a>';
		echo '<br/><br />';
		echo '<label for="ContactPhone">Phone</label>';
		echo '<div id="inputPhone1" class="clonedInputPhone">';
		echo '<input name="data[Phone][0]" type="text" id="ContactPhone">';
		echo '</div>';
		echo '<a href="#" onClick="addFormField(\'clonedInputPhone\', \'inputPhone\', \'inputPhone\', \'Phone\'); return false;">Add new phone</a>';
		echo '<br/><br />';
		echo '<label for="ContactFile">File</label>';
		echo '<div class="input file">';
		echo '<div id="inputFile1" class="clonedInputFile">';
		echo '<input name="data[File][0]" type="file" id="ContactFile">';
		echo '</div>';
		echo '<a href="#" onClick="addFormField(\'clonedInputFile\', \'inputFile\', \'inputFile\', \'File\'); return false;">Add new file</a>';
		echo '</div>';
		echo $this->Form->input('Tag',  array('label' => 'Related Tags'));
		echo $this->Form->input('new_tags', array('label' => 'Add Tags (comma separated)'));
		
		//echo $this->Form->input('file', array('type'=>'file'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Add contact', true));?>
</div>
<!--
<script>
 $(document).ready(function() {
	$('#koi').click(function() {
			var href = $('#koi').attr('href');
			//alert(href);
			$.get(href, function(data) {
				$('.in').html(data);
				//window.location.replace(href);
				//alert('kopele');
			})
		}
	)
 }
 );
	
</script>
 
<a href="/contacts/index" onclick="return false;" id="koi">KOi</a>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

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