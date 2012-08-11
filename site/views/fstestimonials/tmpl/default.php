<?php defined('_JEXEC') or die('Restricted access'); 

$db =&JFactory::getDBO();
	
	$query= "SELECT * FROM #__fstestimonials ORDER BY RAND()";
	$db->setQuery($query);
	$fstestimonials = $db->loadAssocList();
	
	echo "<h1>Testimonials</h1>";
	
	for ($i=0, $n=count($fstestimonials); $i<$n; $i++) {
		echo "<div class='testimonial_block'><div class='testimonial_quote'>\"" . $fstestimonials[$i]['quote'] . "\"</div><div class='testimonial_name'> - " . $fstestimonials[$i]['name'] . "</div></div>";
	}
?>