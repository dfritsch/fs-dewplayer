<?php
/**
 * @version $Id: dewplayer.php 2011-01-25 12:41:40 svn $
 * @package    Dewplayer
 * @subpackage Base
 * @author     EasyJoomla {@link http://www.easy-joomla.org Easy-Joomla.org}
 * @author     David Fritsch {@link fritschservices.com}
 * @author     Created on 27-May-2011
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

?>
<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend>
        <?php
        if (!isset($this->Dewplayer->id)) {
			echo JText::_( 'Add Song');
		} else {
			echo JText::_( 'Edit Song');
		}?></legend>

		<table class="admintable">
		<tr>
			<td width="100" align="right" class="key">
				<label for="title">
					<?php echo JText::_('Track Title'); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="title" id="title" size="32" maxlength="250" value="<?php echo $this->Dewplayer->title;?>" />
			</td>
		</tr>
        <tr>
			<td width="100" align="right" class="key">
				<label for="title">
					<?php echo JText::_('Track Artist'); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="artist" id="artist" size="32" maxlength="250" value="<?php echo $this->Dewplayer->artist;?>" />
			</td>
		</tr>
        <tr>
			<td width="100" align="right" class="key">
				<label for="title">
					<?php echo JText::_('Track Album'); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="album" id="album" size="32" maxlength="250" value="<?php echo $this->Dewplayer->album;?>" />
			</td>
		</tr>
        <tr>
			<td width="100" align="right" class="key">
				<label for="location">
					<?php echo JText::_('Album/Track Image'); ?>:
				</label>
			</td>
			<td>
            	<?php
                if (isset($this->Dewplayer->id)) {
                    echo JText::_('Current File: '.$this->Dewplayer->image.'<br>');
                }
				?>
				<input type="file" name="jpg" id="jpg" />
                <input type="hidden" name="image" id="image" value="<?php echo $this->Dewplayer->image; ?>" />
			</td>
		</tr>
        <tr>
			<td width="100" align="right" class="key">
				<label for="location">
					<?php echo JText::_('Upload MP3'); ?>:
				</label>
			</td>
			<td>
            	<?php
                if (isset($this->Dewplayer->id)) {
                    echo JText::_('Current File: '.$this->Dewplayer->location.'<br>');
                }
				?>
				<input type="file" name="mp3" id="mp3" />
                <input type="hidden" name="location" id="location" value="<?php echo $this->Dewplayer->location; ?>" />
			</td>
		</tr>
        <tr>
			<td width="100" align="right" class="key">
				<label for="ordering">
					<?php echo JText::_('Order'); ?>:
				</label>
			</td>
			<td>
				<?php
                if (!isset($this->Dewplayer->id)) {
                    echo JText::_( 'New Songs default to the last position.');
                } else {
                    echo JText::_( 'Edit song order on the main page.');
                }
				?>
                <input class="text_area" type="hidden" name="ordering" id="ordering" value="<?php echo $this->Dewplayer->ordering;?>" />
			</td>
		</tr>
	</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_dewplayer" />
<input type="hidden" name="id" value="<?php echo $this->Dewplayer->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="dewplayer" />
</form>
