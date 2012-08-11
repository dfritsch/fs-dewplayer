<?php

defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.calendar');
?>

<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend>
        <?php
        if (!isset($this->Fsslider->id)) {
			echo JText::_( 'Add Testimonial');
		} else {
			echo JText::_( 'Edit Testimonial');
		}?></legend>

		<table class="admintable">
		<tr>
			<td width="100" align="right" class="key">
				<label for="title">
					<?php echo JText::_('Client name'); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="name" id="name" size="32" maxlength="250" value="<?php echo $this->fstestimonials->name;?>" />
			</td>
		</tr>
        <tr>
			<td width="100" align="right" class="key">
				<label for="title">
					<?php echo JText::_('Quote Date'); ?>:
				</label>
			</td>
			<td>

<input class="inputbox" type="text" name="fsdate" id="fsdate" size="25" maxlength="25" value="<?php echo $this->fstestimonials->fsdate;?>" />
<input type="reset" class="button" value="..." onclick="return showCalendar('fsdate','%Y-%m-%d');" />
			</td>
		</tr>
        <tr>
			<td width="100" align="right" class="key">
				<label for="title">
					<?php echo JText::_('Quote'); ?>:
				</label>
			</td>
			<td>
				<textarea name="quote" id="quote" rows="6" cols="25"><?php echo $this->fstestimonials->quote;?></textarea>
			</td>
		</tr>
	</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_fstestimonials" />
<input type="hidden" name="state" value="1" />
<input type="hidden" name="ordering" value="<?php echo $this->fstestimonials->ordering; ?>" />
<input type="hidden" name="edit" value="<?php echo $this->fstestimonials->id ? 1 : 0; ?>" />
<input type="hidden" name="id" value="<?php echo $this->fstestimonials->id; ?>" />
<input type="hidden" name="task" value="" />
</form>
