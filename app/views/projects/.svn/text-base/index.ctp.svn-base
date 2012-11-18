<div class="projects index">
	<!-- Delete dialog -->
	<div id="dialog-confirmContact" class="dialog-confirms" title="Delete this project?">
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This project will be permanently deleted.</p>
	</div>
	<!-- END Delete dialog -->
<!--	<h2><?php __('Projects');?></h2>-->
	<?php echo $this->Html->script('list-projects');?>
	<table cellpadding="0" cellspacing="0" class="contactsTable">
	<tr>
<!--			<th><?php echo $this->Paginator->sort('id');?></th>-->
			<th><?php echo $this->Paginator->sort('name');?></th>
			<!--
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('start_date');?></th>
			-->
			<th><?php echo $this->Paginator->sort('end_goal');?></th>
<!--			<th><?php echo $this->Paginator->sort('status');?></th>-->
			<th><?php echo $this->Paginator->sort('progress');?></th>
			<th><?php echo $this->Paginator->sort('client_id');?></th>
			<th><?php echo $this->Paginator->sort('manager_id');?></th>
<!--			<th><?php echo $this->Paginator->sort('template_id');?></th>-->
			<th><?php echo $this->Paginator->sort('stage');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
<!--		<td><?php echo $project['Project']['id']; ?>&nbsp;</td>-->
		<td><?php echo $this->Html->link($project['Project']['name'], array('action' => 'view', $project['Project']['id']));?>&nbsp;</td>
		<!--
		<td><?php echo $project['Project']['description']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['url']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['start_date']; ?>&nbsp;</td>
		-->
		<td><?php echo $project['Project']['end_goal']; ?>&nbsp;</td>
<!--	<td><?php echo $project['Project']['status']; ?>&nbsp;</td>-->
		<td><?php echo $project['Project']['progress']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['Client']['name'], array('controller' => 'contacts', 'action' => 'view', $project['Client']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($project['Manager']['name'], array('controller' => 'contacts', 'action' => 'view', $project['Manager']['id'])); ?>
		</td>
		<!--
		<td>
			<?php echo $this->Html->link($project['Template']['name'], array('controller' => 'templates', 'action' => 'view', $project['Template']['id'])); ?>
		</td>
		-->
		<td><?php echo $project['Project']['stage']; ?>&nbsp;</td>
		<td class="actions">
			<span><?php echo $this->Html->link('Edit', array('action' => 'edit', $project['Project']['id']), array('class' => 'ui-icon ui-icon-pencil', 'escape' => false)); ?></span>
			<span><?php echo $this->Html->link('Delete', array('action' => 'delete', $project['Project']['id']), array('onclick' =>  'return false;', 'class' => 'ui-icon ui-icon-trash deleteProject', 'id' => 'delete'.$project['Project']['id'])); ?></span>
			<!-- 
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?>
			 -->
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Project', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Templates', true), array('controller' => 'templates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Template', true), array('controller' => 'templates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags', true), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag', true), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>