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

jimport('joomla.application.component.controller');

/**
 * dewplayer Component Controller
 */
class DewplayerController extends JController {
	function display() {
        // Make sure we have a default view
        if( !JRequest::getVar( 'view' )) {
		    JRequest::setVar('view', 'dewplayer' );
        }
		parent::display();
	}
}
?>