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

/**
 * Dewplayer Table class
 *
 * @package    Dewplayer
 * @subpackage Tables
 */
class TableDewplayer extends JTable
{
    /**
     * Primary Key
     *
     * @var int
     */
    var $id = null;

    /**
     * @var string
     */
    var $title = null;
	
	/**
     * @var string
     */
    var $artist = null;
	
	/**
     * @var string
     */
    var $album = null;
	
	/**
     * @var tinyint
     */
    var $state = null;
	
	/**
     * @var int
     */
    var $ordering = null;
	
	/**
     * @var string
     */
    var $location = null;
	
	/**
     * @var string
     */
    var $image = null;

    /**
     * Constructor
     *
     * @param object $db Database connector object
     */
    function TableDewplayer(& $db)
    {
        parent::__construct('#__dewplayer', 'id', $db);
    }//function

}//class
