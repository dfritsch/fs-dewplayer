<?php
defined('_JEXEC') or die('Restricted access');
JToolBarHelper::title(JText::_('dewplayer'), 'generic.png');

$db =&JFactory::getDBO();

$query = "SELECT max(ordering) FROM jos_dewplayer";
$db->SetQuery($query);
$maxorder = $db->loadResult();
	
	$query= "SELECT * FROM #__dewplayer ORDER BY ordering";
	$db->setQuery($query);
	$dewplayerlist = $db->loadAssocList();
	echo "<h2>Songs currently in the database</h2>";
	echo "<table width='90%' align='center'><tr><td width='20%'><h2>Title</h2></td><td width='60%'><h2>Location</h2></td><td colspan='3'><h2>Order</h2><td><h2>Tools</h2></td></tr>";
	
	for ($i=0, $n=count($dewplayerlist); $i<$n; $i++) {
		
		echo "<tr><td>" . $dewplayerlist[$i]['title'] . "</a></td><td>" . $dewplayerlist[$i]['location'] . "</td>";
		if ($dewplayerlist[$i]['ordering']!=1) {
			echo "<td><a href='index.php?option=com_dewplayer&task=orderup&id=" . $dewplayerlist[$i]['id'] . "'>up</a></td>";
		} else {
			echo "<td></td>";
		}
		echo "<td>".$dewplayerlist[$i]['ordering']."</td>";
		if ($dewplayerlist[$i]['ordering']!=$maxorder) {
			echo "<td><a href='index.php?option=com_dewplayer&task=orderdown&id=" . $dewplayerlist[$i]['id'] . "'>down</a></td>";
		} else {
			echo "<td></td>";
		}
		echo "<td><a href='index.php?option=com_dewplayer&task=edit&id=" . $dewplayerlist[$i]['id'] . "'>Edit</a> &nbsp; | &nbsp; <a href='index.php?option=com_dewplayer&task=remove&id=" . $dewplayerlist[$i]['id'] . "'>Remove</a></td></tr>";
	}
	echo "</table>";
?>
<form action = "index.php" method =  "post" id = "adminForm" name = "adminForm" />
 <input type = "hidden" name = "task" value = "" />
 <input type = "hidden" name = "option" value = "com_dewplayer" />
</form>
