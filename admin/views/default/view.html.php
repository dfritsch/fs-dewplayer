<?php

/**

 * Joomla! 1.5 component fstestimonials

 *

 * @version $Id: view.html.php 2011-01-28 11:29:19 svn $

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

jimport( 'joomla.application.component.view');

class FstestimonialsViewDefault extends JView {

    function display($tpl = null) {

        //-- Get data from the model
        $items =& $this->get('Data');
        $pagination =& $this->get('Pagination');

        //-- push data into the template
        $this->assignRef('items', $items);
        $this->assignRef('pagination', $pagination);
 
		/* Call the state object */
		$state =& $this->get( 'state' );
 
		/* Get the values from the state object that were inserted in the model's construct function */
		$lists['order_Dir'] = $state->get( 'filter_order_Dir' );
		$lists['order']     = $state->get( 'filter_order' );
 
		$this->assignRef( 'lists', $lists );
		
		
		JToolBarHelper::title(   JText::_( 'FS Testimonials' ) );
		JToolBarHelper::addNewX();
		JToolBarHelper::deleteList();
		
 
		parent::display($tpl);

    }

}

?>