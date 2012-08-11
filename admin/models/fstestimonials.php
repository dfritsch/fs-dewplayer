<?php

/**

 * Joomla! 1.5 component fstestimonials

 *

 * @version $Id: fstestimonials.php 2011-01-28 11:29:19 svn $

 * @author David Fritsch

 * @package Joomla

 * @subpackage fstestimonials

 * @license Copyright (c) 2011 - All Rights Reserved

 *

 * A component to display fstestimonials on their own page as well as in modules

 *

 * This component file was created using the Joomla Component Creator by Not Web Design

 * http://www.notwebdesign.com/joomla_component_creator/

 *

 */



// no direct access

defined('_JEXEC') or die('Restricted access');



// Import Joomla! libraries

jimport('joomla.application.component.model');



class FstestimonialsModelFstestimonials extends JModel {

    function __construct() {

		parent::__construct();
		
		
		$option = JRequest::getCmd('option');
		$mainframe =& JFactory::getApplication();

        $app = JFactory::getApplication('administrator');

        //-- Get pagination request variables
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'), 'int');
        $limitstart = $app->getUserStateFromRequest('com_dewplayer.limitstart', 'limitstart', 0, 'int');

        //-- In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);

        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
 
		$filter_order     = $mainframe->getUserStateFromRequest(  $option.'filter_order', 'filter_order', 'name', 'cmd' );
		$filter_order_Dir = $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', 'asc', 'word' );
	 
		$this->setState('filter_order', $filter_order);
		$this->setState('filter_order_Dir', $filter_order_Dir);
		
		$array = JRequest::getVar( 'cid', array(0), '', 'array' );
  	 	$edit = JRequest::getVar( 'edit', true );
  		if($edit) $this->_id = (int)$array[0];

    }
	
	function save() {
		$quote = mysql_real_escape_string($_POST['quote']);
		$id = $_POST['id'];
		$name = mysql_real_escape_string($_POST['name']);
		$date = $_POST['date'] ? date('Y-m-d', strtotime($date)) : "0000-00-00";
		
		$db = & JFactory::getDBO();
		if ($id!='') {
			$query = "UPDATE #__fstestimonials SET quote='$quote', name='$name', date='$date' WHERE id='$id'";
		} else {
			$query = "INSERT INTO #__fstestimonials SET quote='$quote', name='$name', date='$date'";
		}
		echo $query;
		$db->setQuery( $query );
		$db->query();
		
		return true;
	}
	
	function remove() {
		$id = $_GET['id'];
		
		$db = & JFactory::getDBO();
		$query = "DELETE FROM #__fstestimonials WHERE id='$id'";
		$db->setQuery( $query );
		$db->query();
		
		return true;
	}

}

?>