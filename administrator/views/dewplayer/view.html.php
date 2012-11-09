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

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Dewplayer Component
 *
 * @package    Dewplayer
 * @subpackage Views
 */

class DewplayerListViewDewplayer extends JView
{
    /**
     * Dewplayer view display method
     *
     * @return void
     **/
    function display($tpl = null)
    {
        //-- Get the Dewplayer
        $Dewplayer =& $this->get('Data');
		
        $isNew = ($Dewplayer->id < 1);

        $text = $isNew ? JText::_('New') : JText::_('Edit');
        JToolBarHelper::title('Dewplayer: <small><small>[ '.$text.' ]</small></small>');
        JToolBarHelper::save();
        if($isNew)
        {
            JToolBarHelper::cancel();
			
			$db = JFactory::getDBO();
			$db->setQuery("SELECT max(ordering) FROM #__dewplayer");
			$Dewplayer->ordering = $db->LoadResult();
			$Dewplayer->ordering+=1;
			//print_r($Dewplayer);
        }
        else
        {
            //-- For existing items the button is renamed `close`
            JToolBarHelper::cancel('cancel', JText::_('Close'));
        }
		
		

        $this->assignRef('Dewplayer', $Dewplayer);

        parent::display($tpl);
    }//function

}//class
