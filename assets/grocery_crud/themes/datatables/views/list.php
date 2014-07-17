<table cellpadding="0" cellspacing="0" border="0" class="display groceryCrudTable table table-hover" id="<?php echo uniqid(); ?>">
	<thead>
		<tr>
			<?php foreach($columns as $column){?>
				<th><?php echo $column->display_as; ?></th>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<th class='actions'><?php echo $this->l('list_actions'); ?></th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $num_row => $row){ ?>
		<tr id='row-<?php echo $num_row?>'>
			<?php foreach($columns as $column){?>
				<td><?php echo $row->{$column->field_name}?></td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td class='actions'>
				<?php
				if(!empty($row->action_urls)){
					foreach($row->action_urls as $action_unique_id => $action_url){
						$action = $actions[$action_unique_id];
				?>
						<a href="<?php echo $action_url; ?>" class="edit_button btn btn-default btn-xs" role="button" title="<?php echo $action->label?>">
							<i class="<?php echo $action->css_class; ?> <?php echo $action_unique_id;?>"></i>
							<span class="ui-button-text">&nbsp;
								<!--<?php echo $action->label?>-->
							</span>
						</a>
				<?php }
				}
				?>
				<?php if(!$unset_read){?>
					<a href="<?php echo $row->read_url?>" class="btn btn-info btn-xs" role="button" title="<?php echo $this->l('list_view'); ?>">
						<i class="icon-preview"></i>
						<span class="ui-button-text">&nbsp;</span>
					</a>
				<?php }?>

				<?php if(!$unset_edit){?>
					<a href="<?php echo $row->edit_url?>" class="btn btn-primary btn-xs" role="button" title="<?php echo $this->l('list_edit'); ?>">
						<i class="icon-edit"></i>
						<span class="ui-button-text">&nbsp;</span>
					</a>
				<?php }?>
				<?php if(!$unset_delete){?>
					<a onclick = "javascript: return delete_row('<?php echo $row->delete_url?>', '<?php echo $num_row?>')" 
						href="javascript:void(0)" class="btn btn-danger btn-xs" role="button" title="<?php echo $this->l('list_delete'); ?>">
						<i class="icon-trash"></i>
						<span class="ui-button-text">&nbsp;</span>
					</a>
				<?php }?>
			</td>
			<?php }?>
		</tr>
		<?php }?>
	</tbody>
	<tfoot>
		<tr>
			<?php foreach($columns as $column){?>
				<td><input type="text" name="<?php echo $column->field_name; ?>" placeholder="<?php echo $this->l('list_search').' '.$column->display_as; ?>" class="search_<?php echo $column->field_name; ?>" /></td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
				<td>
					<button class="ui-button floatR ui-widget ui-state-default ui-corner-all refresh-data" role="button" data-url="<?php echo $ajax_list_url; ?>">
						<span class="ui-button-text"> 
							<i class="fa fa-refresh"></i> 
							Refresh
						</span>
					</button>
					<a href="javascript:void(0)" role="button" class="clear-filtering ui-button floatR ui-widget ui-state-default ui-corner-all">
						<span class="ui-button-text">
							<i class="fa fa-share"></i>
							<?php echo $this->l('list_clear_filtering');?>
						</span>
					</a>
				</td>
			<?php }?>
		</tr>
	</tfoot>
</table>
