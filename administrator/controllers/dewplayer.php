<?php
/**
 * @version SVN: $Id$
 * @package    Dewplayer
 * @subpackage Controllers
 * @author     EasyJoomla {@link http://www.easy-joomla.org Easy-Joomla.org}
 * @author     David Fritsch {@link fritschservices.com}
 * @author     Created on 27-May-2011
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

jimport('joomla.application.component.controller');

/**
 * Dewplayer Controller
 *
 * @package    Dewplayer
 * @subpackage Controllers
 */
class DewplayerListControllerDewplayer extends DewplayerListController
{
    /**
     * constructor (registers additional tasks to methods)
     * @return void
     */
    function __construct()
    {
        parent::__construct();
		
        //-- Register Extra tasks
        $this->registerTask('add', 'edit');
		
		$option = JRequest::getVar('option', 'com_dewplayer', 'get');
    }// function
	
    /**
     * display the edit form
     * @return void
     */
    function edit()
    {
        JRequest::setVar('view', 'Dewplayer');
        JRequest::setVar('layout', 'form');
        JRequest::setVar('hidemainmenu', 1);

        parent::display();
    }// function

    /**
     * save a record (and redirect to main page)
     * @return void
     */
    function save()
    {
        $model = $this->getModel('Dewplayer');

        if($model->store())
        {
            $msg = JText::_('Record Saved');
        }
        else
        {
            $msg = JText::_('Error Saving Record');
        }

        $link = 'index.php?option=com_dewplayer';
        $this->setRedirect($link, $msg);
    }// function

    /**
     * remove record(s)
     * @return void
     */
    function remove()
    {
        $model = $this->getModel('Dewplayer');
        if(!$model->delete()){
            $msg = JText::_('Error: One or More Records Could not be Deleted');
        } else {
            $msg = JText::_('Records Deleted');
        }

        $this->setRedirect('index.php?option=com_dewplayer', $msg);
    }// function

    /**
     * cancel editing a record
     * @return void
     */
    function cancel()
    {
        $msg = JText::_('Operation Cancelled');
        $this->setRedirect('index.php?option=com_dewplayer', $msg);
    }//function
	
	function orderdown()
   {

      $model = $this->getModel('dewplayerlist');
      $model->move(1);

      $this->setRedirect( 'index.php?option=com_dewplayer');
   }
   
   function orderup()
   {

      $model = $this->getModel('dewplayerlist');
      $model->move(-1);

      $this->setRedirect( 'index.php?option=com_dewplayer');
   }
   
   function changeState( $cid=null, $state=0, $option )
   {
	   global $mainframe;
	   $mainframe = JFactory::getApplication();
	   
	   $db 	=& JFactory::getDBO();
	   
	   if (count( $cid ) < 1) {
			$action = $state == 1 ? 'publish' : ($state == -1 ? 'archive' : 'unpublish');
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
	
		$cids = implode( ',', $cid );
	
		$query = 'UPDATE #__dewplayer'
		. ' SET state = '.(int) $state
		. ' WHERE id IN ( '. $cids .' )'
		;
		$db->setQuery( $query );
		if (!$db->query()) {
			JError::raiseError(500, $db->getErrorMsg() );
		}
		
		$model = $this->getModel('Dewplayer');
		$model->create_xml();
		
		$mainframe->redirect( 'index.php?option='.$option );
   }
   
   function publish()
   {
	   global $mainframe;
	   $mainframe = JFactory::getApplication();
	   
	   $cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid, array(0));
		
		$option = JRequest::getVar('option', 'com_dewplayer', 'get');
		
		$this->changeState( $cid, 1, $option );
	   
   }
   
   function unpublish()
   {
	   global $mainframe;
	   $mainframe = JFactory::getApplication();
	   
	   $cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid, array(0));
		
		$option = JRequest::getVar('option', 'com_dewplayer', 'get');
		
		$this->changeState( $cid, 0, $option );
	   
   }

}//class
