<?php defined('_JEXEC') or die('Restricted access');

switch($params->get( 'player' )) {
	case 0:
		$player_url = "dewplayer-mini.swf";
		$multi=false;
		$width=160;
		$height=20;
		break;
	case 1:
		$player_url = "dewplayer.swf";
		$multi=false;
		$width=200;
		$height=20;
		break;
	case 2:
		$player_url = "dewplayer-multi.swf";
		$multi=true;
		$width=240;
		$height=20;
		break;
	case 3:
		$player_url = "dewplayer-rect.swf";
		$multi=true;
		$width=240;
		$height=20;
		break;
	case 4:
		$player_url = "dewplayer-playlist.swf";
		$multi=true;
		$width=240;
		$height=200;
		break;
	case 5:
		$player_url = "dewplayer-bubble.swf";
		$multi=false;
		$width=250;
		$height=65;
		break;
	case 6:
		$player_url = "dewplayer-vinyl.swf";
		$multi=true;
		$width=303;
		$height=113;
		break;
}

$options = "volume=".$params->get( 'default_volume' )."&autostart=".$params->get( 'auto_start' )."&autoreplay=".$params->get( 'loop_play' )."&showtime=".$params->get( 'timer' )."&nopointer=".$params->get( 'no_cursor' )."&fading=".$params->get( 'fading' );

if ($multi) {
	// for multi mp3 players load random play variable and the playlist xml file
	$options.="&randomplay=".$params->get( 'random_play' )."&xml=".JURI::root()."administrator/components/com_dewplayer/playlist.xml";
} else {
	// for individual mp3 players, select a random mp3 from enabled to play
	$db = & JFactory::getDBO();
	$query = "SELECT * FROM #__dewplayer WHERE state=1 ORDER BY ordering";
	$db->setQuery( $query );
	$mp3s = $db->loadAssocList();
	
	$options.="&mp3=";
	
	foreach ($mp3s as $key=>$mp3) {
		$options.= JURI::root() . "administrator/components/com_dewplayer/uploads/".$mp3['location'];
		if (($key+1)!=count($mp3s)) {
			$options.="|";
		}
	}
}

?> 
  <div class="dewplayer_playlist"> 
 
  <object type="application/x-shockwave-flash" data="<?php echo JURI::base(); ?>components/com_dewplayer/<?php echo $player_url; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" id="dewplayer" name="dewplayer"> 
	<param name="wmode" value="transparent" /> 
	<param name="movie" value="<?php echo JURI::root(); ?>components/com_dewplayer/<?php echo $player_url; ?>" /> 
	<param name="flashvars" value="<?php echo $options; ?>" /> 
  </object> 
 
  </div>