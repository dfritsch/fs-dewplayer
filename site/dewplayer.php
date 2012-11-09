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


// no direct access

defined('_JEXEC') or die('Restricted access');

// Require the base controller

require_once JPATH_COMPONENT.DS.'controller.php';

// Initialize the controller

$controller = new DewplayerController();
$controller->execute( null );

// Redirect if set by the controller

$controller->redirect();

?>