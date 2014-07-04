<?php
/*
Plugin Name: Morpheus RESPONSIVE 3D SLIDER
Plugin URI: http://www.extendyourweb.com/morpheus-responsive-slider/
Description: With morpheus slider you can create sliders with several scenes where you can insert images, text and videos of youtube. You can animate all this content through visual management. Includes 3D animations using CSS and jQuery, so you can impress your visitors. You can create multiple sliders and use them on your pages, posts, as a widget or inserting them directly as HTML code. Use and admin in Settings -> morpheus Slider. <a href="options-general.php?page=morpheus">morpheus RESPONSIVE SLIDER ADMIN</a>
Version: 1.2
Author: Webpsilon S.C.P.
Author URI: http://www.extendyourweb.com/product/media-plugins-pack/

Copyright 2013  Webpsilon S.C.P.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
*/



function getYTidmorpheus($ytURL) {
#
 
#
$ytvIDlen = 11; // This is the length of YouTube's video IDs
#
 
#
// The ID string starts after "v=", which is usually right after
#
// "youtube.com/watch?" in the URL
#
$idStarts = strpos($ytURL, "?v=");
#
 
#
// In case the "v=" is NOT right after the "?" (not likely, but I like to keep my
#
// bases covered), it will be after an "&":
#
if($idStarts === FALSE)
#
$idStarts = strpos($ytURL, "&v=");
#
// If still FALSE, URL doesn't have a vid ID
#
if($idStarts === FALSE)
#
die("YouTube video ID not found. Please double-check your URL.");
#
 
#
// Offset the start location to match the beginning of the ID string
#
$idStarts +=3;
#
 
#
// Get the ID string and return it
#
$ytvID = substr($ytURL, $idStarts, $ytvIDlen);
#
 
#
return $ytvID;
#
 
#
}



function morpheus_enqueue_scripts() { 

  

 }



function morpheus($content){
	

	
	$content = preg_replace_callback("/\[morpheus ([^]]*)\/\]/i", "morpheus_render2", $content);

	return $content;
	
}

function morpheus_render2($tag_string){
	return morpheus_render($tag_string, "");
}

function morpheus_render($tag_string, $instance){
$contador=rand(9, 9999999);

$widthloading="48"; // Set if change loading image

global $wpdb; 	
$table_name = $wpdb->prefix . "morpheus";


if(isset($tag_string[1])) {
	
	
	
	$auxi1=str_replace(" ", "", $tag_string[1]);
	
	}

else {
	
	
	
	$auxi1 = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
	
	}


	
	
	
	$myrows = $wpdb->get_results( "SELECT * FROM $table_name WHERE id = ".$auxi1.";" );

	if(count($myrows)<1) $myrows = $wpdb->get_results( "SELECT * FROM $table_name;" );
	
	$conta=0;
$id= $myrows[$conta]->id;
	$title = $myrows[$conta]->title;
		$width = $myrows[$conta]->width;
$height = $myrows[$conta]->height;


 
 



$values =$myrows[$conta]->ivalues;

$twidth = $myrows[$conta]->width_thumbnail;

$theight = $myrows[$conta]->height_thumbnail;

$number_thumbnails = $myrows[$conta]->number_thumbnails;



$total = $myrows[$conta]->number_thumbnails;

$border = $myrows[$conta]->border;
$round = $myrows[$conta]->round;
$tborder = $myrows[$conta]->thumbnail_border;
$thumbnail_round = $myrows[$conta]->thumbnail_round;

$sizetitle = $myrows[$conta]->sizetitle;
$sizedescription = $myrows[$conta]->sizedescription;
$sizethumbnail = $myrows[$conta]->sizethumbnail;
$font = $myrows[$conta]->font;
$color1 = $myrows[$conta]->color1;
$color2 = $myrows[$conta]->color2;

$color3 = $myrows[$conta]->color3;

$time = $myrows[$conta]->time;

$animation = $myrows[$conta]->animation;

$mode = $myrows[$conta]->mode;

$op1 = $myrows[$conta]->op1;
$op2 = $myrows[$conta]->op2;
$op3 = $myrows[$conta]->op3;
$op4 = $myrows[$conta]->op4;
$op5 = $myrows[$conta]->op5;


$op6 = $myrows[$conta]->op6;
$op7 = $myrows[$conta]->op7;
$op8 = $myrows[$conta]->op8;
$op9 = $myrows[$conta]->op9;
$op10 = $myrows[$conta]->op10;
$op11 = $myrows[$conta]->op11;
$op12 = $myrows[$conta]->op12;
$op13 = $myrows[$conta]->op13;
$op14 = $myrows[$conta]->op14;
$op15 = $myrows[$conta]->op15;

/*

else {
$width = empty($instance['width']) ? '&nbsp;' : apply_filters('widget_width', $instance['width']);
$height = empty($instance['height']) ? '&nbsp;' : apply_filters('widget_height', $instance['height']);
$values = empty($instance['values']) ? '&nbsp;' : apply_filters('widget_values', $instance['values']);
$twidth = empty($instance['width_thumbnail']) ? '&nbsp;' : apply_filters('widget_width_thumbnail', $instance['width_thumbnail']);
$theight = empty($instance['height_thumbnail']) ? '&nbsp;' : apply_filters('widget_height_thumbnail', $instance['height_thumbnail']);


$total = empty($instance['number_thumbnails']) ? '&nbsp;' : apply_filters('widget_number_thumbnails', $instance['number_thumbnails']);

$border = empty($instance['border']) ? '&nbsp;' : apply_filters('widget_border', $instance['border']);
$round = empty($instance['round']) ? '&nbsp;' : apply_filters('widget_round', $instance['round']);
$tborder = empty($instance['thumbnail_border']) ? '&nbsp;' : apply_filters('widget_thumbnail_border', $instance['thumbnail_border']);
$thumbnail_round = empty($instance['thumbnail_round']) ? '&nbsp;' : apply_filters('widget_thumbnail_round', $instance['thumbnail_round']);

$sizetitle = empty($instance['sizetitle']) ? '&nbsp;' : apply_filters('widget_sizetitle', $instance['sizetitle']);
$sizedescription = empty($instance['sizedescription']) ? '&nbsp;' : apply_filters('widget_sizedescription', $instance['sizedescription']);
$sizethumbnail = empty($instance['sizethumbnail']) ? '&nbsp;' : apply_filters('widget_sizethumbnail', $instance['sizethumbnail']);
$font = empty($instance['font']) ? '&nbsp;' : apply_filters('widget_font', $instance['font']);
$color1 = empty($instance['color1']) ? '&nbsp;' : apply_filters('widget_color1', $instance['color1']);
$color2 = empty($instance['color2']) ? '&nbsp;' : apply_filters('widget_color2', $instance['color2']);
$color3 = empty($instance['color3']) ? '&nbsp;' : apply_filters('widget_color3', $instance['color3']);

$time = empty($instance['time']) ? '&nbsp;' : apply_filters('widget_time', $instance['time']);
$animation = empty($instance['animation']) ? '&nbsp;' : apply_filters('widget_animation', $instance['animation']);
$mode = empty($instance['mode']) ? '&nbsp;' : apply_filters('widget_mode', $instance['mode']);


}

*/
$site_url = get_option( 'siteurl' );
$firstimorpheusimage="";
$textovid="";
$mobpag=0;

$heightimage=round(((100-$number_thumbnails)*$height)/100);
$heightthumb=round((($number_thumbnails)*$height)/100);
$heightimage-=50;
$mobrow=0;
$mobcolumn=0;
$textovidmob="";
$firstimage="";
$firstlink="";
$firsttitle="";

$imagesslider="";
$captions="";
$sliderscaptions="0";
$items_morpheus="";
$cont=0;
$colorp="#".$op8;
global $templatesel;
$templatesel=$time;


/*
if($time==1) {
	   wp_register_style( 'slider-skin1', plugins_url('/skins/dark-room/quake.skin.css', __FILE__) );
   wp_enqueue_style( 'slider-skin1' );
}

if($time==2) {
	
	wp_register_style( 'slider-skin2', plugins_url('/skins/plain/quake.skin.css', __FILE__) );
 	wp_enqueue_style( 'slider-skin2' );

}

if($time==3) {
	
	
   wp_register_style( 'slider-skin3', plugins_url('/skins/violet/quake.skin.css', __FILE__) );
 	wp_enqueue_style( 'slider-skin3' );

}
*/

/*
if($time==1) echo "<link rel='stylesheet' id='slider-skin1-css'  href='http://localhost/wor34/wp-content/plugins/morpheus-slider/skins/dark-room/quake.skin.css?ver=3.4.2' type='text/css' media='all' />";
if($time==2) {
	echo "<link rel='stylesheet' id='slider-skin1-css'  href='http://localhost/wor34/wp-content/plugins/morpheus-slider/skins/plain/quake.skin.css?ver=3.4.2' type='text/css' media='all' />";
	$colorp="#222";
}
if($time==3) echo "<link rel='stylesheet' id='slider-skin1-css'  href='http://localhost/wor34/wp-content/plugins/morpheus-slider/skins/violet/quake.skin.css?ver=3.4.2' type='text/css' media='all' />";

*/

$htmlscene="";
$htmlscenes="";
$codejquery='';
$codejquerys="";
$htmlthumbnails="";
$thumbnails=0;
if($op1>0) $thumbnails=1;
$posthumbnails=0;
$stylet="";
$arrows="";
$bullets="";

$ism=0;
$isa=0;
$isb=0;
if($classslider!="verticalslider" && $sizetitle!="false") {
$isa=1;
	$arrows='<div id="aslidermorpheus'.$id.'" name="aslidermorpheus'.$id.'" class="arrows1" style="background-color: #'.$op13.';"><div class="arrowt" style="border-right-color: #'.$tborder.';" ></div></div>';
	
	$arrows.='<div id="bslidermorpheus'.$id.'" name="bslidermorpheus'.$id.'" class="arrows1" style="background-color: #'.$op13.';"><div class="arrowtb" style="border-left-color: #'.$tborder.';"></div></div>';
}

if($classslider!="verticalslider" && $font!="1") {

$isb=1;
	$bullets='<div id="buslidermorpheus'.$id.'" name="buslidermorpheus'.$id.'" class="bullets1">';

}

$classslider="horizontalslider"; // horizontal slider


$classslider="verticalslider"; // vertical slider

$classslider="slidernormal"; // normal slider

$music="";
$musicbutton="";

if($sizedescription!="") {
	$ism=1;
	$youmusic=explode(",", $sizedescription);
	
	$music='<div id="morpheusmusic'.$id.'" name="morpheusmusic'.$id.'" style="display:none"><iframe id="musicmorpheus'.$id.'" type="text/html" width="100%" height="100%" src="http://www.youtube.com/embed/'.getYTidmorpheus($youmusic[0]).'?autoplay=1&enablejsapi=1" frameborder="0"></iframe></div>';
	
	
	$musicbutton='<a href="javascript: playmusic'.$id.'();" id="buttonmusic'.$id.'" name="buttonmusic'.$id.'" class="musicbutton"><img src="'.plugins_url('', __FILE__).'/images/nomusic.png'.'" width="30"/></a>';
	
	 $codejquerys.='
							  
	musicplay'.$id.'=1;						  
	
	 function playmusic'.$id.'() {
 
if(musicplay'.$id.'==0)  {
	
	musicplay'.$id.'=1;
	
 jQuery("#morpheusmusic'.$id.'").html(\'<iframe id="musicmorpheus'.$id.'" type="text/html" width="100%" height="100%" src="http://www.youtube.com/embed/'.getYTidmorpheus($youmusic[0]).'?autoplay=1&enablejsapi=1" frameborder="0"></iframe>\');
 
 jQuery("#buttonmusic'.$id.'").html(\'<img src="'.plugins_url('', __FILE__).'/images/nomusic.png'.'" width="30"/>\');
 
}

else {
	musicplay'.$id.'=0;
	
 jQuery("#morpheusmusic'.$id.'").html(\'\');
 jQuery("#buttonmusic'.$id.'").html(\'<img src="'.plugins_url('', __FILE__).'/images/playmusic.png'.'" width="20"/>\');
 
}
 
};


function stopmusic'.$id.'() {
 

	if(musicplay'.$id.'==1) musicplay'.$id.'=0;
	
	else musicplay'.$id.'=1;
	
 jQuery("#morpheusmusic'.$id.'").html(\'\');
 jQuery("#buttonmusic'.$id.'").html(\'\');
 
}

';
							 
	
	
	
	
}


			if($values!="") {
				$scenes=explode("kh6gfd57hgg", $values);
				array_pop($scenes);
				$cont=0;
				foreach ($scenes as &$value) {
					
					$item=explode("t6r4nd", $value);
					
						//////// reading scenes
						
						/// div marc
						$divstyle2="";
						$divstyle="opacity:0;";
						$divclass="";
						$bgimage="";
						
						// default o scene valors
						
						if($item[15]=="") $item[15]=$color3;
						
						if($item[12]=="") $item[12]=$op6;
						if($item[16]=="") $item[16]=$op11;
						if($item[11]=="") $item[11]=$op7;
						if($item[21]=="") $item[21]=$op12;
						if($item[2]=="") $item[2]=$border;
						if($item[10]=="") $item[10]=$op4;
						
						
						//////////
						
						if($item[21]=="5") $divclass.=" effect1";
						if($item[21]=="6") $divclass.=" effect2";
						if($item[21]=="7") $divclass.=" effect5";
						if($item[21]=="8") $divclass.=" effect6";
						if($item[21]=="9") $divclass.=" effect7";
						if($item[21]=="10") $divclass.=" effect8";
						
						
						
						if($item[16]!="") {
							$divstyle2.=" -webkit-border-radius: ".$item[16]."px; border-radius: ".$item[16]."px; -moz-border-radius: ".$item[16]."px;";
						$divstyle.=" -webkit-border-radius: ".$item[16]."px; border-radius: ".$item[16]."px; -moz-border-radius: ".$item[16]."px;";
						
						}
						if($item[8]!="1") $divstyle2.=" overflow: hidden;";
						
						if($item[19]!="1" && $item[11]!="") {
							$divstyle2.=" background-color: #".$item[11].";";
						}
						
						if($item[19]!="1" && $item[5]!="") {
							$divstyle2.=" background-image: url(".$item[5].");";
							$bgimage='<img src="'.$item[5].'" style="opacity:0"/>';
						}
						
						
						if($item[20]=="1" && $item[15]!="") {
							$divstyle2.=" border-style:solid; border-width:".$item[15]."px; border-color: #".$item[12].";";
						}
						
						
						
						
						if($item[6]!="") {
							$divstyle.=" max-width: ".$item[6]."px;";
							$divstyle2.=" max-width: ".$item[6]."px;";
						}
						else {
							$divstyle.=" max-width: ".$width."px;";
							$divstyle2.=" max-width: ".$width."px;";
						}
						
						if($item[7]!="") {
							$divstyle.=" max-height: ".$item[7]."px;";
							$divstyle2.=" max-height: ".$item[7]."px;";
						}
						else {
							$divstyle.=" max-height: ".$height."px;";
							$divstyle2.=" max-height: ".$height."px;";
						}
						
						
						
							  $imgt="";
							  $stumb="";
							  
							  if($twidth>0) $stumb="effect".$twidth;
							  if($item[5]!="") $imgt=" background-image: url(".$item[5].");";
							  if($item[5]=="" && $item[4]!="") $imgt=" background-image: url(".$item[4].");";
							  
							  $textthumb="";
							  if($item[0]!="") $textthumb='<div class="text" style="background-color: #'.$op15.'; color: #'.$op9.'; font-size: '.$theight.'px;">'.$item[0].'</div>';
							  
							  if($op1==1 || $op1==4 || $op1==5) $htmlthumbnails.='<a href="javascript: changescene('.($cont).');" class="shadowt '.$stumb.'" style="display: inline-block;margin:'.$op3.'px; margin-left: '.((int)$op3/2).'px; margin-right: '.((int)$op3/2).'px;"><div id="tsps'.$cont.'" name="tsps'.$cont.'"  class="thumbnail1" style="border-color: #'.$op15.';background-color: #'.$op15.';height: '.$round.'px;'.$imgt.'">'.$textthumb.'</div></a>';
							  
							  if($op1==2 || $op1==3) $htmlthumbnails.='<a href="javascript: changescene('.($cont).');" class="shadowt '.$stumb.'" id="'.$cont.'" name="'.$cont.'" style="opacity:0; display: inline-block;margin:'.$op3.'px;margin-top: '.((int)$op3/2).'px; margin-bottom: '.((int)$op3/2).'px;"><div id="tsps'.$cont.'" name="tsps'.$cont.'" class="thumbnail2" style="border-color: #'.$op15.';background-color: #'.$op15.';'.$imgt.'">'.$textthumb.'</div></a>';
							  
						
						
						
						 if($isb==1) {


	$bullets.='<a href="javascript: changescene('.($cont).');" id="bullet'.$cont.'" name="bullet'.$cont.'" class="bullet1" style="background-color: #'.$color1.'"></a>';

}
						
						$mlink="";
						  
						  if($item[3]!="") $mlink=' style="cursor: pointer;" onclick="window.location =\''.$item[3].'\';" ';
						 
						
						$htmlscenes.='<div '.$mlink.' id="mmorpheus'.$cont.'" name="mmorpheus'.$cont.'" class="morpheus3d '.$divclass.'" style="'.$divstyle.'"><div id="morpheus'.$cont.'" name="morpheus'.$cont.'" class="morpheus" style="'.$divstyle2.'" >'.$bgimage;
						
						// items
						
						$elem=explode("*klaxx238zdfla*", $item[1]);
						
						array_pop($elem);
						
						$ce=0;
						$elementos="";
						$lastitem=0;
						foreach($elem as $e) {
						  
						  $ev=explode("-k3sl9-", $e);
						  
						  // image
						  
						  $ilink="";
						  
						  if($ev[12]!="") $ilink=' onclick="window.location =\''.$ev[12].'\';" style="cursor: pointer;" ';
						 
						  if($ev[1]=="html" && $ev[0]!="") {
							  $htmlscenes.='<div '.$ilink.' id="itemslider'.$cont.'-'.$ce.'" name="itemslider'.$cont.'-'.$ce.'">'.$ev[0].'</div>';
							  $codejquerys.=' jQuery("#morpheus'.$cont.'").data("itemslider'.$cont.'-'.$ce.'", "'.str_replace(PHP_EOL, '', $e).'");';
							   $lastitem++;
							   $ce++;
						  }
						 if($ev[1]=="" && $ev[0]!="") {
							  $htmlscenes.='<img '.$ilink.' id="itemslider'.$cont.'-'.$ce.'" name="itemslider'.$cont.'-'.$ce.'" src="'.plugins_url('', __FILE__).'/images/textbg.png" />';
							  $codejquerys.=' jQuery("#morpheus'.$cont.'").data("itemslider'.$cont.'-'.$ce.'", "'.str_replace(PHP_EOL, '', $e).'");';
							  $lastitem++;
							  $ce++;
						  }
						  
						 
						  
						  if($ev[1]=="you" && $ev[0]!="") {
							 
							 
							  
							  $htmlscenes.='
							  
  <div id="itemslider'.$cont.'-'.$ce.'" name="itemslider'.$cont.'-'.$ce.'" style="display:none;">
 <img src="http://img.youtube.com/vi/'.getYTidmorpheus($ev[0]).'/0.jpg" style="width:100%; height:100%; opacity: 1; left: 0px; top: 0px;"/>
 <div class="arrows1" style="background-color: #'.$tborder.'; top:46%; left:46%;"><div class="arrowtb" style="border-left-color: #'.$op13.';"></div></div> 
  </div>
						';
							  
							  
							  $codejquerys.='
							  
							  
videoplay=0;
	
	jQuery("#itemslider'.$cont.'-'.$ce.'").click(function() {
 stopmusic'.$id.'();
 videoyouplay="playersyou'.$cont.''.$ce.'";
 videoplay=1;
 jQuery("#itemslider'.$cont.'-'.$ce.'").html(\'<iframe id="youtube'.$cont.'-'.$ce.'" type="text/html" width="100%" height="100%" src="http://www.youtube.com/embed/'.getYTidmorpheus($ev[0]).'?autoplay=1&enablejsapi=1" frameborder="0"></iframe>\');
 
});
	
  

  function playerready'.$cont.''.$ce.'(event) {	  
  }
  
   function playersyou'.$cont.''.$ce.'stop () {
	  
	  
	  
	 videoplay=0;
	
	jQuery("#itemslider'.$cont.'-'.$ce.'").html(\'<img src="http://img.youtube.com/vi/'.getYTidmorpheus($ev[0]).'/default.jpg" style="width:100%; height:100%; opacity: 1; left: 0px; top: 0px;"/><div class="arrows1" style="background-color: #'.$tborder.'; top:46%; left:46%;"><div class="arrowtb" style="border-left-color: #'.$op13.';"></div></div>\');
	
	playmusic'.$id.'();
    
  }
 		  
 jQuery("#morpheus'.$cont.'").data("itemslider'.$cont.'-'.$ce.'", "'.str_replace(PHP_EOL, '', $e).'");
							  
							  
							  ';
							  $lastitem++;
							   $ce++;
						  }
						  
						  
						
						
						  
						}
						
						$codejquerys.='jQuery("#morpheus'.$cont.'").data("time", "'.$item[2].'"); jQuery("#morpheus'.$cont.'").data("id", "'.$id.'"); jQuery("#morpheus'.$cont.'").data("total", "'.$ce.'"); jQuery("#morpheus'.$cont.'").data("cont", "'.$cont.'"); jQuery("#morpheus'.$cont.'").data("mode", "'.$classslider.'"); jQuery("#morpheus'.$cont.'").data("etime", "'.$item[10].'"); jQuery("#morpheus'.$cont.'").data("op13", "'.$op13.'"); jQuery("#morpheus'.$cont.'").data("op14", "'.$op14.'"); jQuery("#morpheus'.$cont.'").data("op1", "'.$op1.'"); jQuery("#morpheus'.$cont.'").data("op3", "'.$op3.'"); jQuery("#morpheus'.$cont.'").data("nt", "'.$number_thumbnails.'"); jQuery("#morpheus'.$cont.'").data("isa", "'.$isa.'"); jQuery("#morpheus'.$cont.'").data("ism", "'.$ism.'"); jQuery("#morpheus'.$cont.'").data("isb", "'.$font.'"); jQuery("#morpheus'.$cont.'").data("opbullet", "'.$color2.'"); jQuery("#morpheus'.$cont.'").data("effect", "'.$item[9].'"); jQuery("#morpheus'.$cont.'").data("aeffect", "'.$item[13].'"); jQuery("#morpheus'.$cont.'").data("scenes", '.count($scenes).');'; 
						$htmlscenes.='</div>';
						
						
						
						$htmlscenes.='</div><div id="lmorpheus'.$cont.'" name="lmorpheus'.$cont.'" class="maxloading" /></div>';
						////////////////////////////////
						
					
					 $cont++;
				}
			}


 $cont--;
 
	$output="";
	
	$divstyle="";

if($op2!="") $divstyle.=" margin-left: ".$op2."px;";
						if($op5!="") $divstyle.=" margin-right: ".$op5."px;";
						
						$stylet=$divstyle;
						if($op8!="") $divstyle.=" margin-top: ".$op8."px;";
						if($op10!="") $divstyle.=" margin-bottom: ".$op10."px;";

if($thumbnails==1 && $op1==4) $output.='<div class="pthumbnails1" id="spthumbnails'.$id.'" name="spthumbnails'.$id.'" style="'.$stylet.'">'.$htmlthumbnails.'</div>';


	if($thumbnails==1 && ($op1==2 || $op1==3)) {
		if($op1==2) {
			
				$output.='<div id="spmtlr'.$id.'" name="spmtlr'.$id.'" style="'.$divstyle.'position:relative;"><div class="pthumbnails2" id="spthumbnails'.$id.'" name="spthumbnails'.$id.'" style="width: '.$round.'%;">'.$htmlthumbnails.'</div>';
				
				$output.='<div id="slidermorpheus'.$id.'" name="slidermorpheus'.$id.'" class="slidermorpheus '.$classslider.'" style="width:'.(100-$round).'%; float: right;">
				
				';
		}
		
		if($op1==3) {
			
				$output.='<div id="spmtlr'.$id.'" name="spmtlr'.$id.'" style="'.$divstyle.'position:relative;"><div class="pthumbnails2" style="float:right;width: '.$round.'%;" id="spthumbnails'.$id.'" name="spthumbnails'.$id.'">'.$htmlthumbnails.'</div>';
				
				$output.='<div id="slidermorpheus'.$id.'" name="slidermorpheus'.$id.'" class="slidermorpheus '.$classslider.'" style="width:'.(100-$round).'%; float: left;">
				
				';
		}
	}
	

	else $output.='<div id="slidermorpheus'.$id.'" name="slidermorpheus'.$id.'" class="slidermorpheus '.$classslider.'" style="'.$divstyle.'">
	
	';
	$output.=$htmlscenes;
	
	// mouse over slider pause
	
	/*
	 $codejquerys.="
	 
	  jQuery('#slidermorpheus".$id."').hover(function () {
		  stopslider=1;
     
  });
  
  jQuery('#slidermorpheus".$id."').mouseleave(function() {
  var scene=jQuery(\"#morpheus\"+scenecont);
  clearTimeout(scenetimes[scene.data(\"id\")]);
			
		scenetimes[scene.data(\"id\")]=setTimeout(function() {
      endscene(scene);
}, scene.data(\"time\"));
  stopslider=0;
});
	 
	 ";
	*/
	///////
	
	
	
	 if($isb==1) $output.=$bullets.'</div>';
	 
	 $output.=$arrows;
	 
	 
	$output.=$musicbutton.'</div>'.$music;
	
	
if($thumbnails==1 && ($op1==2 || $op1==3))$output.='</div>';

	if($thumbnails==1 && ($op1==1)) $output.='<div class="pthumbnails1" id="spthumbnails'.$id.'" name="spthumbnails'.$id.'" style="'.$stylet.'">'.$htmlthumbnails.'</div>';
	
	if($thumbnails==1 && ($op1==5)) $output.='<div class="pthumbnails1" id="spthumbnails'.$id.'" name="spthumbnails'.$id.'" style="'.$stylet.'white-space: normal;">'.$htmlthumbnails.'</div>';
	
	
	
	$output.='<script>
	'.$codejquerys.'
	</script>';
	
	if(isset($tag_string[1])) return $output;
	else echo $output;
}


function add_header_morpheus2() {
	
	
	
	
  $site_url = get_option( 'siteurl' );

 
 
 wp_enqueue_script('morpheus-slider-color', plugins_url('', __FILE__).'/js/jscolor.js', array('jquery'));
 wp_enqueue_script('ui-pslider', 'http://code.jquery.com/ui/1.10.3/jquery-ui.js');

did_action( 'wp_enqueue_media' );
 wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_style('thickbox');
 
wp_register_style( 'morpheus-cssui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css');
  wp_enqueue_style( 'morpheus-cssui' );
  




  
  

}

function add_header_morpheus() {
	
	
	
	
  $site_url = get_option( 'siteurl' );
  
  wp_enqueue_script('jquery');
 
wp_enqueue_script('youtube-api', 'http://www.youtube.com/player_api', array('jquery')); 
 
  wp_register_style( 'morpheus-slider', plugins_url('/css/morpheus.css', __FILE__) );
  wp_enqueue_style( 'morpheus-slider' );
 
  wp_enqueue_script('morpheusjs', plugins_url('', __FILE__).'/js/morpheus.js', array('jquery'));
  
   wp_enqueue_script('ui-pslider', 'http://code.jquery.com/ui/1.10.3/jquery-ui.js');

wp_register_style( 'morpheus-cssui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css');
  wp_enqueue_style( 'morpheus-cssui' );


}

class wp_morpheus extends WP_Widget {
	function wp_morpheus() {
		$widget_ops = array('classname' => 'wp_morpheus', 'description' => 'Amazing widget for slider. Very easy to use. Select the morpheus slider ID.' );
		$this->WP_Widget('wp_morpheus', 'morpheus SLIDER', $widget_ops);
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		
		$site_url = get_option( 'siteurl' );


		
		//$instance['hide_is_admin']

		
		
			echo $before_widget;
			
			echo morpheus_render("", $instance, $templatesel);
			
			
			echo $after_widget;
		
	}
	function update($new_instance, $old_instance) {
		
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		
		
		
		
		
		
		$instance['values']=$values;
		
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'width' => '240', 'height' => '200', 'border' => '10', 'round' => '1', 'width_thumbnail' => '40', 'height_thumbnail' => '50', 'thumbnail_border' => '6', 'thumbnail_round' => '1', 'number_thumbnails' => '4', 'values'=>'', 'sizetitle'=>'18pt Arial', 'sizedescription'=>'12pt Arial', 'sizethumbnail'=>'10pt Arial', 'font'=>'Verdana', 'color1'=>'#333333', 'color2'=>'#888888', 'color3'=>'#dddddd', 'time'=>'5000', 'animation'=>'0', 'mode'=>'0','op1' => '','op2' => '','op3' => '','op4' => '','op5' => '' ) );
		$title = strip_tags($instance['title']);
		$id=rand(0, 99999);
		$width = strip_tags($instance['width']);
		$height = strip_tags($instance['height']);
		$border = strip_tags($instance['border']);
		$round = strip_tags($instance['round']);
		$title = strip_tags($instance['title']);
		$width_thumbnail = strip_tags($instance['width_thumbnail']);
		$height_thumbnail = strip_tags($instance['height_thumbnail']);
		$thumbnail_border = strip_tags($instance['thumbnail_border']);
		$thumbnail_round = strip_tags($instance['thumbnail_round']);
		$number_thumbnails = strip_tags($instance['number_thumbnails']);
		$values = strip_tags($instance['values']);
		
		$sizetitle = strip_tags($instance['sizetitle']);
		$sizedescription = strip_tags($instance['sizedescription']);
		$sizethumbnail = strip_tags($instance['sizethumbnail']);
		$font = strip_tags($instance['font']);
		$color1 = strip_tags($instance['color1']);
		$color2 = strip_tags($instance['color2']);
		$color3 = strip_tags($instance['color3']);
		
		$time = strip_tags($instance['time']);
		$animation = strip_tags($instance['animation']);
		$mode = strip_tags($instance['mode']);
		
		$op1 = strip_tags($instance['op1']);
		$op2 = strip_tags($instance['op2']);
		$op3 = strip_tags($instance['op3']);
		$op4 = strip_tags($instance['op4']);
		$op5 = strip_tags($instance['op5']);

		
		
		$borderround[$round] = 'checked';
		$tborderround[$thumbnail_round] = 'checked';
		
		

  global $wpdb; 
	$table_name = $wpdb->prefix . "morpheus";
	
	$myrows = $wpdb->get_results( "SELECT * FROM $table_name;" );

if(empty($myrows)) {
	
	echo '
	<p>First create a new slider, from the administration of morpheus slider.</p>
	';
}

else {
	$contaa1=0;
	$selector='<select name="'.$this->get_field_name('title').'" id="'.$this->get_field_id('title').'">';
	while($contaa1<count($myrows)) {
		
		
		$tt="";
		if($title==$myrows[$contaa1]->id)  $tt=' selected="selected"';
		$selector.='<option value="'.$myrows[$contaa1]->id.'"'.$tt.'>'.$myrows[$contaa1]->id.' '.$myrows[$contaa1]->title.'</option>';
		$contaa1++;
		
	}
	
	$selector.='</select>';




echo 'Slider: '.$selector; 

			}
	}
}


function morpheus_panel(){
	
	$editscene=0;
	global $wpdb; 
	$table_name = $wpdb->prefix . "morpheus";	
	
	if(isset($_POST['crear'])) {
		$re = $wpdb->query("select * from $table_name");
		
		
//autos  no existe
$paca=0;
if(empty($re))
{
	

	$paca=1;
	
  $sql = " CREATE TABLE $table_name(
	id mediumint( 9 ) NOT NULL AUTO_INCREMENT ,
	title longtext NOT NULL ,
	width longtext NOT NULL ,
	height longtext NOT NULL ,
	border longtext NOT NULL ,
	round longtext NOT NULL ,
	width_thumbnail longtext NOT NULL ,
	height_thumbnail longtext NOT NULL ,
	thumbnail_border longtext NOT NULL ,
	thumbnail_round longtext NOT NULL ,
	number_thumbnails longtext NOT NULL ,
	ivalues longtext NOT NULL ,
	sizetitle longtext NOT NULL ,
	sizedescription longtext NOT NULL ,
	sizethumbnail longtext NOT NULL ,
	font longtext NOT NULL ,
	color1 longtext NOT NULL ,
	color2 longtext NOT NULL ,
	color3 longtext NOT NULL ,
	time longtext NOT NULL ,
	animation longtext NOT NULL ,
	mode longtext NOT NULL ,
	op1 longtext NOT NULL ,
	op2 longtext NOT NULL ,
	op3 longtext NOT NULL ,
	op4 longtext NOT NULL ,
	op5 longtext NOT NULL ,
	op6 longtext NOT NULL ,
	op7 longtext NOT NULL ,
	op8 longtext NOT NULL ,
	op9 longtext NOT NULL ,
	op10 longtext NOT NULL ,
	op11 longtext NOT NULL ,
	op12 longtext NOT NULL ,
	op13 longtext NOT NULL ,
	op14 longtext NOT NULL ,
	op15 longtext NOT NULL ,
	
		PRIMARY KEY ( `id` )	
	) ;";
	$wpdb->query($sql);
	
}

if(!isset($_REQUEST["cloneid"])) {
$sql = "INSERT INTO $table_name SET `ivalues` = '', `title` = 'New slider', `width` = '1200', `height` = '600', `round` = '60', `width_thumbnail` = '9', `height_thumbnail` = '16', `thumbnail_border` = 'FFFFFF', `thumbnail_round` = '_self', `number_thumbnails` = '4', `sizetitle` = 'true', `sizedescription` = '', `sizethumbnail` = '-swirlFadeOutRotateFancy--slideDown--swirlFadeOutRotate--fade--boxFadeOutOriginalRotate--slideUp-', `font` = '2', `color1` = '000000', `color2` = '0.5', `color3` = '4', `time` = '', `border` = '10000', `animation` = '', `mode` = '', `op1` = '1', `op2` = '50', `op3` = '10', `op4` = '1000', `op5` = '50', `op6` = 'FFFFFF', `op7` = 'B5B5B5', `op8` = '50', `op9` = 'FFFFFF', `op10` = '50', `op11` = '0', `op12` = '6', `op13` = '000000', `op14` = '1', `op15` = '000000';";

	if(isset($_REQUEST["demo1"])) {
		$sql="INSERT INTO $table_name (`id`, `title`, `width`, `height`, `border`, `round`, `width_thumbnail`, `height_thumbnail`, `thumbnail_border`, `thumbnail_round`, `number_thumbnails`, `ivalues`, `sizetitle`, `sizedescription`, `sizethumbnail`, `font`, `color1`, `color2`, `color3`, `time`, `animation`, `mode`, `op1`, `op2`, `op3`, `op4`, `op5`, `op6`, `op7`, `op8`, `op9`, `op10`, `op11`, `op12`, `op13`, `op14`, `op15`) VALUES (NULL, 'New slider', '1200', '600', '10000', '25', '10', '16', 'FFFFFF', '_self', '4', 't6r4ndMORPHEUS PRO-k3sl9-html-k3sl9-28-k3sl9-15-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-367-k3sl9-500-k3sl9-8283-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-28-k3sl9-7-k3sl9-88-k3sl9-0-k3sl9-40-k3sl9-213-k3sl9--88-k3sl9-0-k3sl9-600-k3sl9-EB4431-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-Y-k3sl9-51-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*3D Responsive slider-k3sl9-html-k3sl9-16-k3sl9-196-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-800-k3sl9-500-k3sl9-7484-k3sl9--k3sl9--k3sl9-899-k3sl9--k3sl9-18-k3sl9-227-k3sl9-180-k3sl9-0-k3sl9-18-k3sl9-227-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-395F85-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-X-k3sl9-29-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/Google_Chrome_icon_2011-150x150.png-k3sl9--k3sl9-14-k3sl9-124-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInElastic-k3sl9-1934-k3sl9-500-k3sl9-6150-k3sl9--k3sl9--k3sl9-1000-k3sl9--k3sl9-5-k3sl9-214-k3sl9-88-k3sl9-0-k3sl9-4-k3sl9-214-k3sl9-0-k3sl9-0-k3sl9-75-k3sl9-75-k3sl9-52-k3sl9-52-k3sl9-75-k3sl9-75-k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/safari-150x150.png-k3sl9--k3sl9-70-k3sl9-122-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInElastic-k3sl9-2550-k3sl9-500-k3sl9-6017-k3sl9--k3sl9--k3sl9-916-k3sl9--k3sl9-58-k3sl9-221-k3sl9-89-k3sl9-0-k3sl9-58-k3sl9-221-k3sl9-0-k3sl9-0-k3sl9-75-k3sl9-75-k3sl9-55-k3sl9-55-k3sl9-75-k3sl9-75-k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/Internet_Explorer_7_Logo-150x150.png-k3sl9--k3sl9-125-k3sl9-123-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInElastic-k3sl9-3150-k3sl9-500-k3sl9-5449-k3sl9--k3sl9--k3sl9-900-k3sl9--k3sl9-126-k3sl9-221-k3sl9-92-k3sl9-0-k3sl9-127-k3sl9-221-k3sl9-0-k3sl9-0-k3sl9-75-k3sl9-75-k3sl9-55-k3sl9-55-k3sl9-75-k3sl9-75-k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/Mozilla_Firefox_3.5_logo_256-150x150.png-k3sl9--k3sl9-185-k3sl9-124-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInElastic-k3sl9-4000-k3sl9-500-k3sl9-4500-k3sl9--k3sl9--k3sl9-1000-k3sl9--k3sl9-190-k3sl9-215-k3sl9-89-k3sl9-0-k3sl9-189-k3sl9-215-k3sl9-0-k3sl9-0-k3sl9-75-k3sl9-75-k3sl9-51-k3sl9-51-k3sl9-75-k3sl9-75-k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/Opera-icon-high-res-150x150.png-k3sl9--k3sl9-243-k3sl9-127-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInElastic-k3sl9-4933-k3sl9-500-k3sl9-3583-k3sl9--k3sl9--k3sl9-984-k3sl9--k3sl9-248-k3sl9-216-k3sl9-90-k3sl9-0-k3sl9-249-k3sl9-216-k3sl9-0-k3sl9-0-k3sl9-75-k3sl9-75-k3sl9-44-k3sl9-44-k3sl9-75-k3sl9-75-k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*t6r4ndt6r4ndt6r4ndt6r4nd".plugins_url('', __FILE__)."/images/21.jpgt6r4ndt6r4ndt6r4nd0t6r4nd5t6r4ndt6r4ndB5B5B5t6r4nd2689D5t6r4ndeaseInOutElastict6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4nd0t6r4nd1t6r4nd6t6r4ndt6r4ndkh6gfd57hggt6r4nd".plugins_url('', __FILE__)."/images/greek-170x300.png-k3sl9--k3sl9-464.095703125-k3sl9-121-k3sl9-18-k3sl9-1-k3sl9-easeInOutElastic-k3sl9--k3sl9-easeInElastic-k3sl9-1050-k3sl9-600-k3sl9-6082-k3sl9--k3sl9--k3sl9-1017-k3sl9--k3sl9-435-k3sl9-120-k3sl9-0-k3sl9-0-k3sl9-437-k3sl9-120-k3sl9-0-k3sl9-0-k3sl9-85-k3sl9-150-k3sl9-85-k3sl9-150-k3sl9-85-k3sl9-150-k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*HISTORY-k3sl9-html-k3sl9-445-k3sl9-95-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-2234-k3sl9-500-k3sl9-5599-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-353-k3sl9-57-k3sl9-90-k3sl9-0-k3sl9-442-k3sl9-16-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-0C7D0C-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-Y-k3sl9-20-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/200px-Unit_hoplite_copy.png-k3sl9--k3sl9-74-k3sl9-34-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInElastic-k3sl9-3267-k3sl9-500-k3sl9-4733-k3sl9--k3sl9--k3sl9-883-k3sl9--k3sl9-81-k3sl9-171-k3sl9-187-k3sl9-0-k3sl9-223-k3sl9-31-k3sl9--180-k3sl9-0-k3sl9-100-k3sl9-115-k3sl9-100-k3sl9-115-k3sl9-100-k3sl9-115-k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*BATTLES-k3sl9-html-k3sl9-82-k3sl9-144-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-4234-k3sl9-500-k3sl9-4134-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-82-k3sl9-235-k3sl9-0-k3sl9-0-k3sl9-83-k3sl9-261-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-0F375E-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-19-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*MONUMENTS-k3sl9-html-k3sl9-248-k3sl9-87-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-900-k3sl9-500-k3sl9-8000-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-242-k3sl9-16-k3sl9-0-k3sl9-0-k3sl9-251-k3sl9-216-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-0D0D0D-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-18-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*You can animate text and images with links to create menus, presentations, ...-k3sl9-html-k3sl9-126-k3sl9-15-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-0-k3sl9-500-k3sl9-9000-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-130-k3sl9-75-k3sl9-0-k3sl9-0-k3sl9-127-k3sl9-33-k3sl9-179-k3sl9-0-k3sl9-600-k3sl9-0A0A0A-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-X-k3sl9-13-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*t6r4ndt6r4ndt6r4ndt6r4nd".plugins_url('', __FILE__)."/images/31.jpgt6r4ndt6r4ndt6r4nd0t6r4nd4t6r4nd1500t6r4ndB5B5B5t6r4nd2689D5t6r4ndeaseInOutElastict6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4nd0t6r4nd1t6r4nd6t6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndkh6gfd57hggt6r4ndInsert into your scenes images, texts and videos from youtube.-k3sl9-html-k3sl9-49-k3sl9-30-k3sl9-0-k3sl9-1-k3sl9-linear-k3sl9--k3sl9-easeInBack-k3sl9-0-k3sl9-500-k3sl9-9000-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-50-k3sl9-176-k3sl9-0-k3sl9-0-k3sl9-51-k3sl9-176-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-204E52-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-18-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/flying-bird-hi1.png-k3sl9--k3sl9-510-k3sl9-129-k3sl9-0-k3sl9-1-k3sl9-easeInSine-k3sl9--k3sl9-linear-k3sl9-967-k3sl9-918-k3sl9-565-k3sl9--k3sl9--k3sl9-1949-k3sl9--k3sl9-433-k3sl9-116-k3sl9-0-k3sl9-0-k3sl9-607-k3sl9-117-k3sl9-0-k3sl9-1-k3sl9-34-k3sl9-35-k3sl9-50-k3sl9-51-k3sl9-50-k3sl9-51-k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/fish-150x150.png-k3sl9--k3sl9-27.35430908203125-k3sl9-11.416778564453125-k3sl9-36-k3sl9-2-k3sl9-easeInOutElastic-k3sl9--k3sl9-linear-k3sl9-5400-k3sl9-850-k3sl9-183-k3sl9--k3sl9--k3sl9-1083-k3sl9--k3sl9-73-k3sl9-147-k3sl9-0-k3sl9-0-k3sl9-214.9176025390625-k3sl9-136.91757202148438-k3sl9-96-k3sl9-0-k3sl9-44-k3sl9-44-k3sl9-75-k3sl9-75-k3sl9-37-k3sl9-37-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/fish-150x150.png-k3sl9--k3sl9-155.57550048828125-k3sl9-41.57550048828125-k3sl9-57-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInElastic-k3sl9-5900-k3sl9-917-k3sl9-167-k3sl9--k3sl9--k3sl9-584-k3sl9--k3sl9-182-k3sl9-149-k3sl9-0-k3sl9-0-k3sl9-237.7518310546875-k3sl9-138.7518310546875-k3sl9-112-k3sl9-0-k3sl9-29-k3sl9-29-k3sl9-42-k3sl9-42-k3sl9-27-k3sl9-27-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*".plugins_url('', __FILE__)."/images/R11-SeaWorld-0136-150x150.png-k3sl9--k3sl9-78.408447265625-k3sl9-33.408447265625-k3sl9--25-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInElastic-k3sl9-3833-k3sl9-834-k3sl9-600-k3sl9--k3sl9--k3sl9-617-k3sl9--k3sl9-169.97076416015625-k3sl9-145.97076416015625-k3sl9-59-k3sl9-0-k3sl9-48.82489013671875-k3sl9-131.82492065429688-k3sl9--56-k3sl9-0-k3sl9-35-k3sl9-35-k3sl9-53-k3sl9-53-k3sl9-46-k3sl9-46-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*http://www.youtube.com/watch?v=nFdsb7k66cw-k3sl9-you-k3sl9-202-k3sl9-96-k3sl9-0-k3sl9-1-k3sl9-easeInOutElastic-k3sl9--k3sl9-linear-k3sl9-333-k3sl9-500-k3sl9-7933-k3sl9--k3sl9--k3sl9-1083-k3sl9--k3sl9-265.1705322265625-k3sl9-40-k3sl9-0-k3sl9-0-k3sl9-201-k3sl9-95-k3sl9-0-k3sl9-0-k3sl9-50-k3sl9-30-k3sl9-200-k3sl9-150-k3sl9-200-k3sl9-150-k3sl9-X-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*t6r4ndt6r4ndt6r4ndt6r4nd".plugins_url('', __FILE__)."/images/4.jpgt6r4ndt6r4ndt6r4nd0t6r4nd2t6r4ndt6r4ndB5B5B5t6r4nd2689D5t6r4ndeaseInElastict6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4nd0t6r4nd1t6r4nd6t6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndkh6gfd57hggt6r4nd3D effects and multiple easing functions-k3sl9-html-k3sl9-271-k3sl9-46-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-217-k3sl9-500-k3sl9-8783-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9--7-k3sl9-46-k3sl9-0-k3sl9-0-k3sl9-271-k3sl9-17-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-FFFFFF-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-16-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*Compatible and responsive-k3sl9-html-k3sl9-271-k3sl9-69-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-733-k3sl9-500-k3sl9-8200-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-74-k3sl9-69-k3sl9-0-k3sl9-0-k3sl9-268-k3sl9-10-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-FFFFFF-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-16-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*Music from youtube videos-k3sl9-html-k3sl9-272-k3sl9-92-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-1183-k3sl9-500-k3sl9-7783-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-81-k3sl9-90-k3sl9-0-k3sl9-0-k3sl9-273-k3sl9-7-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-FFFFFF-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-16-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*Fast and very easy to use-k3sl9-html-k3sl9-271-k3sl9-114-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-1800-k3sl9-500-k3sl9-6733-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-79-k3sl9-113-k3sl9-0-k3sl9-0-k3sl9-272-k3sl9-9-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-FFFFFF-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-16-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*Unlimited license-k3sl9-html-k3sl9-270-k3sl9-136-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-2434-k3sl9-500-k3sl9-6483-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-139-k3sl9-137-k3sl9-0-k3sl9-0-k3sl9-269-k3sl9-10-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-FFFFFF-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-16-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*t6r4ndt6r4ndt6r4ndt6r4nd".plugins_url('', __FILE__)."/images/7.jpgt6r4ndt6r4ndt6r4nd0t6r4nd2t6r4ndt6r4ndB5B5B5t6r4nd2689D5t6r4ndeaseInOutElastict6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4nd0t6r4nd1t6r4nd6t6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndkh6gfd57hgg', 'true', '', '-swirlFadeOutRotateFancy--slideDown--swirlFadeOutRotate--fade--boxFadeOutOriginalRotate--slideUp-', '3', '2689D5', '0.5', '4', '', '', '', '2', '50', '10', '2000', '50', 'FFFFFF', 'B5B5B5', '0', 'FFFFFF', '50', '0', '6', '6F8D0D', '3', '2689D5');";
		
	}

}
else {
	
	
	
	$myrowsc = $wpdb->get_results( "SELECT id from $table_name ORDER BY id DESC LIMIT 1");
	
	$ncs=($myrowsc[0]->id)+1;
	
	
	$sql="CREATE TEMPORARY TABLE tmptable SELECT * FROM $table_name WHERE id = ".$_REQUEST["cloneid"].";";
	$wpdb->query($sql);
	
	$sql="UPDATE tmptable SET id = ".$ncs." WHERE id = ".$_REQUEST["cloneid"].";";
	$wpdb->query($sql);
	
	$sql="INSERT INTO $table_name SELECT * FROM tmptable WHERE id = ".$ncs.";";
	
}
	
	$wpdb->query($sql);
	}
	
	
	
	
if(isset($_POST['borrar'])) {
		$sql = "DELETE FROM $table_name WHERE id = ".$_POST['borrar'].";";
	$wpdb->query($sql);
	}
	
	
	$cia=0;
	$scene=-1;
	
	while($cia<=$_POST["total"]) {
		
		if(isset($_POST["eitem".$cia])) {
			$editscene=1;
			$scene=$cia;
		}
		
		$cia++;
	}
	
	
	
	// save slider
	if(isset($_POST['id']) && ($editscene==0 || isset($_POST["scene"]))){	
	
	
	
	/////// get old values
	
	$myrows = $wpdb->get_results( "SELECT * FROM $table_name WHERE id = ".$_POST['id'] );
	$valuesold =$myrows[0]->ivalues;
	
	$itemsold=explode("kh6gfd57hgg", $valuesold);
	
	
	
	
	
				
	
	///////
	
	
	
	$total = strip_tags($_POST['total']);


$cont=1;
		
		 $sorter=array();
		while($cont<=$total) {
			
			if(!$_POST['item'.$cont] || $_POST['operation']!="2") {
				$valaux=count($sorter);
				$sorter[$valaux]['order']=$_POST['order'.$cont];
				$sorter[$valaux]['cont']=$cont;
			}
		
			$cont++;
		}


function sortByOrder($a, $b) {
    return $a['order'] - $b['order'];
}

usort($sorter, 'sortByOrder');


/// effects


$cont=1;
		
		 $sortere=array();
$cef=0;
$sizethumbnail="";

while($cef < 48) {
			
			if(isset($_REQUEST["e".$cef])) {
				$valaux=count($sortere);
				$sortere[$valaux]['order']=$_REQUEST['or'.$cef];
				$sortere[$valaux]['cont']=$_REQUEST["e".$cef];
			
			}
			$cef++;
		}

usort($sortere, 'sortByOrder');
$cef=0;
$sizethumbnail="";

while($cef < count($sortere)) {
	
	$sizethumbnail.="-".$sortere[$cef]['cont']."-";
	
	$cef++;
}


$ce=0;



//////
		$cont=1;
		
		
		
		
		
		$values="";
		$duplicateitems="";
		
		///////// search scenes
		
		foreach ($sorter as &$value) {
    $cont = $value['cont'];
	
	$ce=0;
	
	
	$_POST['description'.$cont]="";
	$auxidu="";
	while(isset($_POST['e'.$cont.'-'.$ce])) {

		

		
		$auxiit=$_POST['image'.$cont.'-'.$ce].'-k3sl9-'.$_POST['html'.$cont.'-'.$ce].'-k3sl9-'.$_POST['x'.$cont.'-'.$ce].'-k3sl9-'.$_POST['y'.$cont.'-'.$ce].'-k3sl9-'.$_POST['z'.$cont.'-'.$ce].'-k3sl9-'.$_POST['alpha'.$cont.'-'.$ce].'-k3sl9-'.$_POST['en'.$cont.'-'.$ce].'-k3sl9-'.$_POST['ep'.$cont.'-'.$ce].'-k3sl9-'.$_POST['es'.$cont.'-'.$ce].'-k3sl9-'.$_POST['te'.$cont.'-'.$ce].'-k3sl9-'.$_POST['tp'.$cont.'-'.$ce].'-k3sl9-'.$_POST['ts'.$cont.'-'.$ce].'-k3sl9-'.$_POST['link'.$cont.'-'.$ce].'-k3sl9-'.$_POST['enp'.$cont.'-'.$ce].'-k3sl9-'.$_POST['ent'.$cont.'-'.$ce].'-k3sl9-'.$_POST['eno'.$cont.'-'.$ce].'-k3sl9-'.$_POST['sx'.$cont.'-'.$ce].'-k3sl9-'.$_POST['sy'.$cont.'-'.$ce].'-k3sl9-'.$_POST['sz'.$cont.'-'.$ce].'-k3sl9-'.$_POST['salpha'.$cont.'-'.$ce].'-k3sl9-'.$_POST['fx'.$cont.'-'.$ce].'-k3sl9-'.$_POST['fy'.$cont.'-'.$ce].'-k3sl9-'.$_POST['fz'.$cont.'-'.$ce].'-k3sl9-'.$_POST['falpha'.$cont.'-'.$ce].'-k3sl9-'.$_POST['sw'.$cont.'-'.$ce].'-k3sl9-'.$_POST['sh'.$cont.'-'.$ce].'-k3sl9-'.$_POST['w'.$cont.'-'.$ce].'-k3sl9-'.$_POST['h'.$cont.'-'.$ce].'-k3sl9-'.$_POST['fw'.$cont.'-'.$ce].'-k3sl9-'.$_POST['fh'.$cont.'-'.$ce].'-k3sl9-'.$_POST['sry'.$cont.'-'.$ce].'-k3sl9-'.$_POST['srx'.$cont.'-'.$ce].'-k3sl9-'.$_POST['ry'.$cont.'-'.$ce].'-k3sl9-'.$_POST['rx'.$cont.'-'.$ce].'-k3sl9-'.$_POST['fry'.$cont.'-'.$ce].'-k3sl9-'.$_POST['frx'.$cont.'-'.$ce]."*klaxx238zdfla*";
		
		
	
		
		if(isset($_POST['itu'.$cont.'-'.($ce-1)])) {
			$auxiit.=$auxidu;
			
		}
		if(isset($_POST['itd'.$cont.'-'.($ce)])) {
			$auxiit.=$auxidu;
			
		}
		
		if(isset($_POST['itu'.$cont.'-'.$ce]) && isset($_POST['e'.$cont.'-'.($ce+1)])) {
			$auxidu=$auxiit;
			$auxiit="";
		}
		
		if(isset($_POST['itd'.$cont.'-'.($ce+1)])) {
			$auxidu=$auxiit;
			$auxiit="";
		}
		
		if(($_POST['che'.$cont.'-'.$ce]!="1") || !isset($_POST['deleteitems'.$cont])) $_POST['description'.$cont].=$auxiit;
		if(($_POST['che'.$cont.'-'.$ce]=="1") && isset($_POST['duplicateitems'.$cont])) $duplicateitems.=$auxiit;
		$ce++;
	}
	
	
	$tiemponi=$_POST["border".$_POST['id']];
	if($_POST['image'.$cont]!="") $tiemponi=$_POST['image'.$cont];
	$tiemponi=$tiemponi-1000;
	
	$_POST['description'.$cont].=$duplicateitems;
	if(isset($_POST['unewelem'.$_POST['id']]) && $_POST['unewelem'.$_POST['id']]!="") {
		$_POST['description'.$cont].=$_POST['unewelem'.$_POST['id']]."-k3sl9--k3sl9-300-k3sl9-100-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInElastic-k3sl9-0-k3sl9-500-k3sl9-".$tiemponi."-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-0-k3sl9-100-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-100-k3sl9-0-k3sl9-0-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*";
		
	}
	if(isset($_POST['newhtml'.$cont])) {
		$_POST['description'.$cont].="Insert text -k3sl9-html-k3sl9-300-k3sl9-100-k3sl9-0-k3sl9-1-k3sl9-easeOutBack-k3sl9--k3sl9-easeInBack-k3sl9-0-k3sl9-500-k3sl9-".$tiemponi."-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-0-k3sl9-100-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-100-k3sl9-0-k3sl9-0-k3sl9-600-k3sl9-FFFFFF-k3sl9-20-k3sl9-FEFFD6-k3sl9-20-k3sl9-1C1C1C-k3sl9--k3sl9-30-k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*";
		
	}
	if(isset($_POST['newyou'.$cont])) {
		$_POST['description'.$cont].="http://www.youtube.com/watch?v=sCXXgjwXcxQ-k3sl9-you-k3sl9-150-k3sl9-20-k3sl9-0-k3sl9-1-k3sl9-easeInOutBounce-k3sl9--k3sl9-linear-k3sl9-0-k3sl9-500-k3sl9-".$tiemponi."-k3sl9--k3sl9--k3sl9-500-k3sl9--k3sl9-0-k3sl9-100-k3sl9-0-k3sl9-0-k3sl9-150-k3sl9-20-k3sl9-0-k3sl9-1-k3sl9-50-k3sl9-30-k3sl9-300-k3sl9-100-k3sl9-300-k3sl9-100-k3sl9-Y-k3sl9--k3sl9--k3sl9--k3sl9--k3sl9-*klaxx238zdfla*";
		
	}

			if(!$_POST['item'.$cont] || $_POST['operation']!="2") {
				
				if(isset($_POST["scene"]) && $_POST["scene"]==$cont) $values.=$_POST['title'.$cont]."t6r4nd".$_POST['description'.$cont]."t6r4nd".$_POST['image'.$cont]."t6r4nd".$_POST['link'.$cont]."t6r4nd".$_POST['video'.$cont]."t6r4nd".$_POST['timage'.$cont]."t6r4nd".$_POST['seo'.$cont]."t6r4nd".$_POST['seol'.$cont]."t6r4nd".$_POST['overflow'.$cont]."t6r4nd".$_POST['beffect'.$cont]."t6r4nd".$_POST['xeffect'.$cont]."t6r4nd".$_POST['colora'.$cont]."t6r4nd".$_POST['colorb'.$cont]."t6r4nd".$_POST['colorc'.$cont]."t6r4nd".$_POST['colord'.$cont]."t6r4nd".$_POST['slborder'.$cont]."t6r4nd".$_POST['slround'.$cont]."t6r4nd".$_POST['shadow'.$cont]."t6r4nd".$_POST['sangle'.$cont]."t6r4nd".$_POST['btrans'.$cont]."t6r4nd".$_POST['sborder'.$cont]."t6r4nd".$_POST['sshadow'.$cont]."kh6gfd57hgg";
				
				else {
					
					$minscene=explode("t6r4nd", $itemsold[$cont-1]);
					
					$aux2="";
					$contaux=0;
					foreach($minscene as $aux1) {
						$aux3=$aux1;
						
						if($contaux==13 && isset($_POST['colorc'.$cont])) $aux3=$_POST['colorc'.$cont];
						if($contaux==12 && isset($_POST['colorb'.$cont])) $aux3=$_POST['colorb'.$cont];
						if($contaux==10 && isset($_POST['xeffect'.$cont])) $aux3=$_POST['xeffect'.$cont];
						if($contaux==9 && isset($_POST['beffect'.$cont])) $aux3=$_POST['beffect'.$cont];
						if($contaux==5 && isset($_POST['timage'.$cont])) $aux3=$_POST['timage'.$cont];
						if($contaux==4 && isset($_POST['video'.$cont])) $aux3=$_POST['video'.$cont];
						if($contaux==2 && isset($_POST['image'.$cont])) $aux3=$_POST['image'.$cont];
						if($contaux==0 && isset($_POST['title'.$cont])) $aux3=$_POST['title'.$cont];
						
						$aux2.=$aux3."t6r4nd";
						$contaux++;
					}
					
					//echo '<br/>'.$aux2;
					
					//echo '<br/>'.$itemsold[$cont-1].'<br/>';
					
					$values.=$aux2."kh6gfd57hgg";
				}
				
				
				
			}
				
		
			
		}
		
		if($_POST['operation']=="1") {
			
			$values.="New scenet6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4nd0t6r4nd2t6r4ndt6r4nd".$_POST["op7".$_POST['id']]."t6r4nd".$_POST["op6".$_POST['id']]."t6r4ndeaseInOutElastict6r4ndt6r4ndt6r4ndt6r4ndt6r4ndt6r4nd0t6r4nd1t6r4nd6kh6gfd57hgg";
			
			$cont++;
		}
		


$scenesql="";
	//if(isset($_POST["scene"]) || ($_POST['operation']=="1" || $_POST['operation']=="2")) {
		
		$scenesql="`ivalues` = '".$values."',";
		
		
	//}
	


$sql= "UPDATE $table_name SET ".$scenesql." `title` = '".$_POST["stitle".$_POST['id']]."', `width` = '".$_POST["width".$_POST['id']]."', `height` = '".$_POST["height".$_POST['id']]."', `round` = '".$_POST["round".$_POST['id']]."', `width_thumbnail` = '".$_POST["twidth".$_POST['id']]."', `height_thumbnail` = '".$_POST["theight".$_POST['id']]."', `thumbnail_border` = '".$_POST["tborder".$_POST['id']]."', `thumbnail_round` = '".$_POST["thumbnail_round".$_POST['id']]."', `number_thumbnails` = '".$_POST["number_thumbnails".$_POST['id']]."', `sizetitle` = '".$_POST["sizetitle".$_POST['id']]."', `sizedescription` = '".$_POST["sizedescription".$_POST['id']]."', `sizethumbnail` = '".$sizethumbnail."', `font` = '".$_POST["font".$_POST['id']]."', `color1` = '".$_POST["color1".$_POST['id']]."', `color2` = '".$_POST["color2".$_POST['id']]."', `color3` = '".$_POST["color3".$_POST['id']]."', `time` = '".$_POST["time".$_POST['id']]."', `border` = '".$_POST["border".$_POST['id']]."', `animation` = '".$_POST["animation".$_POST['id']]."', `mode` = '".$_POST["mode".$_POST['id']]."', `op1` = '".$_POST["op1".$_POST['id']]."', `op2` = '".$_POST["op2".$_POST['id']]."', `op3` = '".$_POST["op3".$_POST['id']]."', `op4` = '".$_POST["op4".$_POST['id']]."', `op5` = '".$_POST["op5".$_POST['id']]."', `op6` = '".$_POST["op6".$_POST['id']]."', `op7` = '".$_POST["op7".$_POST['id']]."', `op8` = '".$_POST["op8".$_POST['id']]."', `op9` = '".$_POST["op9".$_POST['id']]."', `op10` = '".$_POST["op10".$_POST['id']]."', `op11` = '".$_POST["op11".$_POST['id']]."', `op12` = '".$_POST["op12".$_POST['id']]."', `op13` = '".$_POST["op13".$_POST['id']]."', `op14` = '".$_POST["op14".$_POST['id']]."', `op15` = '".$_POST["op15".$_POST['id']]."' WHERE `id` =  ".$_POST["id"]." LIMIT 1";
		
			
			$wpdb->query($sql);
			
			
	}
	
	if($editscene==1) {
		
		
		if(isset($_POST["savescene"])) {
			
			
			
			
		}
		
		
		$myrows = $wpdb->get_results( "SELECT * FROM $table_name WHERE id = ".$_POST['id'] );

	}
	
	else {
	
	$myrows = $wpdb->get_results( "SELECT * FROM $table_name" );


	}
$conta=0;


if($editscene!=1) include('template/cabezera_panel.html');

else {
	
	?>
   
   <div class="wrap">
   
   <table class="wp-list-table widefat fixed pages" cellpadding="8">
   <?php
}
while($conta<count($myrows)) {
	$id= $myrows[$conta]->id;
	$title = $myrows[$conta]->title;
		$width = $myrows[$conta]->width;
$height = $myrows[$conta]->height;
$values =$myrows[$conta]->ivalues;

$twidth = $myrows[$conta]->width_thumbnail;

$theight = $myrows[$conta]->height_thumbnail;

$number_thumbnails = $myrows[$conta]->number_thumbnails;



$total = $myrows[$conta]->total;

$border = $myrows[$conta]->border;
$round = $myrows[$conta]->round;
$tborder = $myrows[$conta]->thumbnail_border;
$thumbnail_round = $myrows[$conta]->thumbnail_round;

$sizetitle = $myrows[$conta]->sizetitle;
$sizedescription = $myrows[$conta]->sizedescription;
$sizethumbnail = $myrows[$conta]->sizethumbnail;
$font = $myrows[$conta]->font;
$color1 = $myrows[$conta]->color1;
$color2 = $myrows[$conta]->color2;

$color3 = $myrows[$conta]->color3;

$animation = $myrows[$conta]->animation;
$time = $myrows[$conta]->time;
$mode = $myrows[$conta]->mode;
$op1 = $myrows[$conta]->op1;
$op2 = $myrows[$conta]->op2;
$op3 = $myrows[$conta]->op3;
$op4 = $myrows[$conta]->op4;
$op5 = $myrows[$conta]->op5;

$op6 = $myrows[$conta]->op6;
$op7 = $myrows[$conta]->op7;
$op8 = $myrows[$conta]->op8;
$op9 = $myrows[$conta]->op9;
$op10 = $myrows[$conta]->op10;
$op11 = $myrows[$conta]->op11;
$op12 = $myrows[$conta]->op12;
$op13 = $myrows[$conta]->op13;
$op14 = $myrows[$conta]->op14;
$op15 = $myrows[$conta]->op15;


	include('template/panel.php');			
	$conta++;
	}
if($editscene!=1) include('template/footer.html');
}




function morpheus_add_menu(){	
	
	
	 add_options_page('morpheus', 'morpheus RESPONSIVE SLIDER', 'manage_options', 'morpheus', 'morpheus_panel' );
   
}



if (function_exists('add_action')) {
	add_action('admin_menu', 'morpheus_add_menu'); 
}



remove_filter('the_content', 'wpautop');

add_action('wp_enqueue_scripts', 'add_header_morpheus');

add_action( 'admin_init', 'add_header_morpheus2' );

add_filter('the_content', 'morpheus');

add_action( 'widgets_init', create_function('', 'return register_widget("wp_morpheus");') );

?>