<?php

/**

 * Joomla! 1.5 component fstestimonials

 *

 * @version $Id: controller.php 2011-01-28 11:29:19 svn $

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



jimport( 'joomla.application.component.controller' );

require_once( JPATH_COMPONENT.DS.'helpers'.DS.'helper.php' );



/**

 * fstestimonials Controller

 *

 * @package Joomla

 * @subpackage fstestimonials

 */

class FstestimonialsController extends JController {

    /**

     * Constructor

     * @access private

     * @subpackage fstestimonials

     */

    function __construct() {

        //Get View

        if(JRequest::getCmd('view') == '') {

            JRequest::setVar('view', 'default');

        }

        $this->item_type = 'Default';

        parent::__construct();

    }
	
	function save() {
		$model = $this->getModel('add');
		
		if ($model->store()) {
			$msg = JText::_( "Testimonial Saved!" );
		}
		else {
			$msg = JText::_( 'Error Saving Testimonial: ' ) . $mresult;
		}
		
		$link = 'index.php?option=com_fstestimonials';
		$this->setRedirect($link, $msg);
	}

	function add() {
		JRequest::setVar( 'view', 'add' );
		
		parent::display();
	}
	
	function edit() {
		JRequest::setVar( 'view', 'add' );
		
		parent::display();
	}
	
	function remove() {
		$model = $this->getModel('add');
		
		if ($model->delete()) {
			$msg = JText::_( 'Testimonial Removed!' );
		}
		else {
			$msg = JText::_( 'Error Removing Testimonial. ' );
		}
		
		$link = 'index.php?option=com_fstestimonials';
		$this->setRedirect($link, $msg);
	}

}

?>