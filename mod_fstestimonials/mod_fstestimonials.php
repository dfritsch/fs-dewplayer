<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

echo "<h2>Recent Reviews</h2>";

$db =&JFactory::getDBO();
	
$query= "SELECT * FROM #__fstestimonials ORDER BY RAND() LIMIT 1";
$db->setQuery($query);
$fstestimonials = $db->loadAssocList();

for ($i=0, $n=count($fstestimonials); $i<$n; $i++) {
	$description = $fstestimonials[$i]['quote'];
	$length = 230;
	
	if (strlen($description)>$length) {
		$description = substr($description, 0, $length);
		$i=0;
		while (substr($description, -1)!=" ") {$description = substr($description,0,-1); $i++; if($i>20) {break;}}
		$description.= " ...";
	}
	$fstestimonials[$i]['quote'] = $description;
	
	echo "<div class='testimonial_block'><div class='testimonial_quote'>\"" . $fstestimonials[$i]['quote'] . "\"</div></div>";
}


$workingpath = JURI::base();

echo "<p style='text-align:right;'><a href='{$workingpath}index.php?option=com_fstestimonials' style='color:white; text-decoration:none;'>Read More</a></p>";

return true;
