<?php
/**
 * @package AkeebaReleaseSystem
 * @copyright Copyright (c)2010-2011 Nicholas K. Dionysopoulos
 * @license GNU General Public License version 3, or later
 * @version $Id: ars.php 123 2011-04-13 07:47:16Z nikosdion $
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

// Install modules and plugins -- BEGIN

// -- General settings
jimport('joomla.installer.installer');
$db = & JFactory::getDBO();
$status = new JObject();
$status->modules = array();
$status->plugins = array();
if( version_compare( JVERSION, '1.6.0', 'ge' ) ) {
	// Thank you for removing installer features in Joomla! 1.6 Beta 13 and
	// forcing me to write ugly code, Joomla!...
	$src = dirname(__FILE__);
} else {
	$src = $this->parent->getPath('source');
}

// -- Dewplayer Module
if(is_dir($src.'/mod_dewplayer')) {
	$installer = new JInstaller;
	$result = $installer->install($src.'/mod_dewplayer');
	$status->modules[] = array('name'=>'mod_dewplayer','client'=>'site', 'result'=>$result);
}

// Install modules and plugins -- END

// Finally, show the installation results form
?>
<h1>Dewplayer - Flash MP3 Player</h1>

<h2>Welcome!</h2>

<p>Thank you for installing Dewplayer. This installation includes the dewplayer component and module.</p>

<?php foreach ($status->modules as $module) : ?>

    <p><b><?php echo $module['name']; ?></b></p>
    <p><?php echo ucfirst($module['client']); ?></p>
    <p><?php echo ($module['result'])?JText::_('Installed'):JText::_('Not installed'); ?></p>

<?php endforeach;?>