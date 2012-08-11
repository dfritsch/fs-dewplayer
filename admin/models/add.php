<?php
/**
 * @version $Id: fsslider.php 2011-01-25 12:41:40 svn $
 * @package    Fsslider
 * @subpackage Base
 * @author     EasyJoomla {@link http://www.easy-joomla.org Easy-Joomla.org}
 * @author     David Fritsch {@link fritschservices.com}
 * @author     Created on 27-May-2011
 * @license    GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

//-- No direct access
defined('_JEXEC') or die('=;)');

jimport('joomla.application.component.model');

/**
 * Fsslider Model
 *
 * @package    Fsslider
 * @subpackage Models
 */
class FstestimonialsModelAdd extends JModel
{

    /**
     * Constructor that retrieves the ID from the request
     *
     * @access  public
     * @return  void
     */
    function __construct()
    {
        parent::__construct();

        $array = JRequest::getVar('cid',  0, '', 'array');
        $this->setId((int)$array[0]);
    }//function

    /**
     * Method to set the Fsslider identifier
     *
     * @access  public
     * @param   int Fsslider identifier
     * @return  void
     */
    function setId($id)
    {
        //-- Set id and wipe data
        $this->_id = $id;
        $this->_data = null;
    }//function


    /**
     * Method to get a record
     * @return object with data
     */
    function &getData()
    {
        //-- Load the data
        if(empty($this->_data))
        {
            $query = 'SELECT * FROM #__fstestimonials'
                    . ' WHERE id = '.$this->_id;
            $this->_db->setQuery($query);
            $this->_data = $this->_db->loadObject();
        }

        if( ! $this->_data)
        {
            $this->_data = $this->getTable('fstestimonials');
        }

        return $this->_data;
    }//function

    /**
     * Method to store a record
     *
     * @access  public
     * @return  boolean True on success
     */
    function store()
    {		
		$row =& $this->getTable('fstestimonials');
		
		$data = JRequest::get('post');
		
		
        // Bind the form fields to the fsslider table
        if( ! $row->bind($data))
        {
            $this->setError($this->_db->getError());
            return false;
        }

        // Make sure the record is valid
        if( ! $row->check())
        {
            $this->setError($this->_db->getError());
            return false;
        }

        // Store the table to the database
        if( ! $row->store())
        {
            $this->setError($row->getError());
            return false;
        }
		
        return true;
    }//function
	
    /**
     * Method to delete record(s)
     *
     * @access  public
     * @return  boolean True on success
     */
    function delete()
    {
        $cids = JRequest::getVar('cid', array(0), 'post', 'array');

        $row =& $this->getTable('fstestimonials');

        if(count($cids))
        {
            foreach($cids as $cid)
            {
				$row->load($cid);
				
                if( ! $row->delete($cid))
                {
                    $this->setError($row->getError());
                    return false;
                }
            }//foreach
        }

        return true;
    }//function

}// class
