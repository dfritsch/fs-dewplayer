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



// Require the base controller

require_once JPATH_COMPONENT.DS.'controller.php';



// Initialize the controller

$controller = new FstestimonialsController();

$controller->execute( null );



// Redirect if set by the controller

$controller->redirect();

?>