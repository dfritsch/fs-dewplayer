<?php
/**
 * @version $Id: dewplayer.php 2011-01-25 12:41:40 svn $
 * @package    Dewplayer
 * @subpackage Views
 * @author     EasyJoomla {@link http://www.easy-joomla.org Easy-Joomla.org}
 * @author     David Fritsch {@link fritschservices.com}
 * @author     Created on 27-May-2011
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

?>
<form id="adminForm" action="<?php echo JRoute::_( 'index.php?option=com_dewplayer' );?>" method="post" name="adminForm">
<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>
			<th width="5">
				<?php echo JHTML::_( 'grid.sort', 'ID', 'id', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>			
			<th>
				<?php echo JHTML::_( 'grid.sort', 'Title', 'title', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
            <th>
				<?php echo JHTML::_( 'grid.sort', 'Artist', 'artist', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
            <th>
				<?php echo JHTML::_( 'grid.sort', 'Album', 'album', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
            <th>
				<?php echo JHTML::_( 'grid.sort', 'Image', 'image', $this->lists['order_Dir'], $this->lists['order']); ?>
			</th>
            <th width="1%" nowrap="nowrap">
				<?php echo JHTML::_( 'grid.sort', 'Enabled', 'enabled', $this->lists['order_Dir'], $this->lists['order']); ?>
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
		$link 		= JRoute::_( 'index.php?option=com_dewplayer&controller=dewplayer&task=edit&cid[]='. $row->id );

		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $row->id; ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
			<td>
				<a href="<?php echo $link; ?>"><?php echo $row->title; ?></a>
			</td>
            <td>
				<a href="<?php echo $link; ?>"><?php echo $row->artist; ?></a>
			</td>
            <td>
				<a href="<?php echo $link; ?>"><?php echo $row->album; ?></a>
			</td>
            <td align="center">
				<?php if ($row->image) : ?>
					<a href="<?php echo $link; ?>"><img src="components/com_dewplayer/uploads/<?php echo $row->image; ?>" height="50" /></a>
                <?php endif; ?>
			</td>
            <td align="center">
                <span title="<?php echo JText::_( 'Publish Information' );?>">
                <a href="javascript:void(0);" class="jgrid hasTip" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $row->state ? 'unpublish' : 'publish' ?>')">
                <span class="state 
                <?php
                if ( $row->state == 1 ) {
					echo "publish";
					$img = 'publish_g.png';
					$alt = JText::_( 'Published' );
				} else if ( $row->state == 0 ) {
					echo "unpublish";
					$img = 'publish_x.png';
					$alt = JText::_( 'Unpublished' );
				} else if ( $row->state == -1 ) {
					echo "archive";
					$img = 'disabled.png';
					$alt = JText::_( 'Archived' );
				}
				?>">
                	<span class="text"><?php echo $alt;?></span>
                </span>
                   <!-- <img src="images/<?php echo $img;?>" width="16" height="16" border="0" alt="<?php echo $alt;?>" /></a></span>-->
            </td>
            <td style="text-align:center;" class="order">
				<span><?php echo $this->pagination->orderUpIcon( $i, ($row->id), 'orderup', 'Move Up', $row->ordering ); ?></span>
				<?php $disabled = $row->ordering ?  '' : 'disabled="disabled"'; ?>
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
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
<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="dewplayer" />
<?php echo JHtml::_('form.token'); ?>
</form>
