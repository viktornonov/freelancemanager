<?php //echo debug($contacts);?>
<?php echo $this->Html->script('list-contacts');?>
<div class="contacts index">
	<!-- Delete dialog -->
	<div id="dialog-confirmContact" class="dialog-confirms" title="Delete this contact?">
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This contact will be permanently deleted.</p>
	</div>
	<!-- END Delete dialog -->
	
	<!-- <h2><?php __('Contacts');?></h2>-->
	<?php echo $this->Html->link(__('New Contact', true), array('action' => 'add'), array('class'=>'submitDecoration'));?>
	<table cellpadding="0" cellspacing="0" class="contactsTable">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('company');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('Tags');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($contacts as $contact):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $contact['Contact']['name']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['company']; ?>&nbsp;</td>
		<td><?php echo $contact['Email'][0]['email'];?></td>
		<td><?php 
				foreach($contact['Tag'] as $tag) {
					echo $tag['name'].', ';
				}
		?></td>
		<td class="actions">
			<!--<?php echo $this->Html->link(__('View', true), array('action' => 'view', $contact['Contact']['id'])); ?>-->
			<span><?php echo $this->Html->link('Edit', array('action' => 'edit', $contact['Contact']['id']), array('class' => 'ui-icon ui-icon-pencil', 'escape' => false)); ?></span>
			<!--<span><?php echo $this->Html->link('Delete', array('action' => 'delete', $contact['Contact']['id']), array('onclick' =>  'return false;', 'class' => 'ui-icon ui-icon-trash deleteContact'), sprintf(__('Are you sure you want to delete # %s?', true), $contact['Contact']['id'])); ?></span>-->
			<span><?php echo $this->Html->link('Delete', array('action' => 'delete', $contact['Contact']['id']), array('onclick' =>  'return false;', 'class' => 'ui-icon ui-icon-trash deleteContact', 'id' => 'delete'.$contact['Contact']['id'])); ?></span>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

<!-- 
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Contact', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Emails', true), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email', true), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Phones', true), array('controller' => 'phones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Phone', true), array('controller' => 'phones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attached Files', true), array('controller' => 'attached_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attached Files', true), array('controller' => 'attached_files', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->