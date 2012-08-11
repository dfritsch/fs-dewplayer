<?php

defined('_JEXEC') or die('Restricted access');

?>

<form id="adminForm" action="<?php echo JRoute::_( 'index.php?option=com_fsslider' );?>" method="post" name="adminForm">
<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>
			<th width="5">
				<?php echo JHTML::_( 'grid.sort', 'ID', 'image_id', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>			
			<th>
				<?php echo JHTML::_( 'grid.sort', 'Name', 'name', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
            <th>
				<?php echo JHTML::_( 'grid.sort', 'Date', 'fsdate', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
            <th>
				<?php echo JHTML::_( 'grid.sort', 'Quote', 'quote', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
            <th width="1%" nowrap="nowrap">
				<?php echo JHTML::_( 'grid.sort', 'Enabled', 'state', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
            <th width="100">
				<?php echo JHTML::_( 'grid.sort', 'Order', 'ordering', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>            
		</tr>			
	</thead>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)
	{
		$row = &$this->items[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_fstestimonials&task=edit&cid[]=' . $row->id );

		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $row->id; ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
			<td>
				<a href="<?php echo $link; ?>"><?php echo $row->name; ?></a>
			</td>
            <td>
           		<a href="<?php echo $link; ?>"><?php echo $row->fsdate; ?></a>
				
			</td>
            <td>
				<a href="<?php echo $link; ?>"><?php echo $row->quote; ?></a>
			</td>
            <td align="center">
                <span class="editlinktip hasTip" title="<?php echo JText::_( 'Publish Information' );?>">
                <a href="javascript:void(0);" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $row->state ? 'unpublish' : 'publish' ?>')">
                <?php
                if ( $row->state == 1 ) {
					$img = 'publish_g.png';
					$alt = JText::_( 'Published' );
				} else if ( $row->state == 0 ) {
					$img = 'publish_x.png';
					$alt = JText::_( 'Unpublished' );
				} else if ( $row->state == -1 ) {
					$img = 'disabled.png';
					$alt = JText::_( 'Archived' );
				}
				?>
                    <img src="images/<?php echo $img;?>" width="16" height="16" border="0" alt="<?php echo $alt;?>" /></a></span>
            </td>
            <td style="text-align:center;" class="order">
				<span><?php echo $this->pagination->orderUpIcon( $i, ($row->id), 'orderup', 'Move Up', $row->ordering ); ?></span>
				<?php $disabled = $row->ordering ?  '' : 'disabled="disabled"'; ?>
				<input type="text" name="ordering[]" size="5" value="<?php echo $row->ordering;?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
                <span><?php echo $this->pagination->orderDownIcon( $i, $n, ($row->id), 'orderdown', 'Move Down', $row->ordering ); ?></span>	
			</td>
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	 <tfoot>
    <tr>
      <td colspan="8">
      	<?php echo $this->pagination->getListFooter(); ?>
      </td>
    </tr>
  </tfoot>
	</table>
</div>
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
</form>