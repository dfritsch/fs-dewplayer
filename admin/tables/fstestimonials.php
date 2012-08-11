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



// Include library dependencies

jimport('joomla.filter.input');



/**

* Table class

*

* @package          Joomla

* @subpackage		fstestimonials

*/

class TableFstestimonials extends JTable {



	/**

	 * Primary Key

	 *

	 * @var int

	 */

	var $id = null;
	
	var $name = null;
	
	var $fsdate = null;
	
	var $quote = null;
	
	var $state = null;
	
	var $ordering = null;





    /**

	 * Constructor

	 *

	 * @param object Database connector object

	 * @since 1.0

	 */

	function TableFstestimonials(& $db)
    {
        parent::__construct('#__fstestimonials', 'id', $db);
    }//function



	/**

	 * Overloaded check method to ensure data integrity

	 *

	 * @access public

	 * @return boolean True on success

	 */

	function check() {

		return true;

	}



}

?>