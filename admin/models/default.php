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



class FstestimonialsModelDefault extends JModel {

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
	
	/**
     * Method to set the orderby for SQL query
     *
     * @access  restricted
     * @param   none
     * @return  order by string
     */
	function _buildContentOrderBy()
	{
	
		$option = JRequest::getCmd('option');
		$mainframe =& JFactory::getApplication();
 
		$orderby = '';
		$filter_order     = $this->getState('filter_order');
		$filter_order_Dir = $this->getState('filter_order_Dir');
 
		/* Error handling is never a bad thing*/
		if(!empty($filter_order) && !empty($filter_order_Dir) ){
			$orderby = ' ORDER BY '.$filter_order.' '.$filter_order_Dir;
		}
 
		return $orderby;
	}

    /**
     * Returns the query
     * @return string The query to be used to retrieve the rows from the database
     */
    function _buildQuery()
    {
        $query = 'SELECT * FROM #__fstestimonials';
		
		$orderby = $this->_buildContentOrderBy();
		if(!empty($orderby)) {
			$query.=$orderby;
		}

        return $query;
    }

    /**
     * Retrieves the hello data
     * @return array Array of objects containing the data from the database
     */
    function &getData()
    {
        //-- Load the data if it doesn't already exist
        if(empty($this->_data))
        {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_data;
    }//function
	
	function getPagination()
    {
        //-- Load the content if it doesn't already exist
        if(empty($this->_pagination))
        {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_pagination;
    }//function
	
	function getTotal()
    {
        //-- Load the content if it doesn't already exist
        if(empty($this->_total))
        {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);
        }

        return $this->_total;
    }//function

}

?>