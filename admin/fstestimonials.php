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



/*

 * Define constants for all pages

 */

define( 'COM_TESTIMONIALS_DIR', 'images'.DS.'fstestimonials'.DS );

define( 'COM_TESTIMONIALS_BASE', JPATH_ROOT.DS.COM_TESTIMONIALS_DIR );

define( 'COM_TESTIMONIALS_BASEURL', JURI::root().str_replace( DS, '/', COM_TESTIMONIALS_DIR ));



// Require the base controller

require_once JPATH_COMPONENT.DS.'controller.php';



// Require the base controller

require_once JPATH_COMPONENT.DS.'helpers'.DS.'helper.php';



// Initialize the controller

$controller = new FstestimonialsController( );



// Perform the Request task

$controller->execute( JRequest::getCmd('task'));

$controller->redirect();

?>