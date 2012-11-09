<?php defined('_JEXEC') or die('Restricted access');

$params = &JComponentHelper::getParams( 'com_dewplayer' );


?> 


 <?php if ($params->get('show_page_title')==1) : ?>
  <h1 class="componentheading"><?php echo $params->get( 'page_title' ); ?></h1>
 <?php endif; ?>
  <div class="dewplayer_playlist"> 
 
  <object type="application/x-shockwave-flash" data="<?php echo JURI::base(); ?>components/com_dewplayer/<?php echo $this->player_url; ?>" width="<?php echo $this->width; ?>" height="<?php echo $this->height; ?>" id="dewplayer" name="dewplayer"> 
	<param name="wmode" value="transparent" /> 
	<param name="movie" value="<?php echo JURI::root(); ?>components/com_dewplayer/<?php echo $this->player_url; ?>" /> 
	<param name="flashvars" value="<?php echo $this->options; ?>" /> 
  </object> 
 
  </div>