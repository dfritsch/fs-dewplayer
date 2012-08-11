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

class FstestimonialsViewAdd extends JView {

    function display($tpl = null) {

        //-- Get the Fsslider
        $fstestimonials =& $this->get('Data');
		
        $isNew = ($fstestimonials->id < 1);

        $text = $isNew ? JText::_('New') : JText::_('Edit');
        JToolBarHelper::title('FS Testimonials: <small><small>[ '.$text.' ]</small></small>');
        JToolBarHelper::save();
        if($isNew)
        {
            JToolBarHelper::cancel();
			
			$db = JFactory::getDBO();
			$db->setQuery("SELECT max(ordering) FROM #__fstestimonials");
			$fstestimonials->ordering = $db->LoadResult();
			$fstestimonials->ordering+=1;
			//print_r($Fsslider);
        }
        else
        {
            //-- For existing items the button is renamed `close`
            JToolBarHelper::cancel('cancel', JText::_('Close'));
        }
		
		

        $this->assignRef('fstestimonials', $fstestimonials);

        parent::display($tpl);

    }

}

?>