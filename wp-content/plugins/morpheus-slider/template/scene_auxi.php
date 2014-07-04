<?php


if(count($items)>$cont) {
					$item=explode("t6r4nd", $value);
					
					
					$width_old=$width;
					$height_old=$height;
					
					if(intval($item[6])>0) $width=intval($item[6]);
					
					if(intval($item[7])>0) $height=intval($item[7]);
					
					
					  $height_des=(int)(($sliderwidth/$width)*$height);
					  $verono="";
					  
					  
					  
					  if(isset($_POST["save".$cont])) {
						  $verono="display: block;";
						
					  }
					  // html scene begin
					 echo '<li> <input name="item'.$cont.'" type="checkbox" value="hide" /> <img src="'.$item[2].'" width="60px"/> <input name="title'.$cont.'" type="text" value="'.$item[0].'" size="100"/> <button class="'.$id.'editbutton" rel="'.$cont.'"> Edit </button>
					 
					 <div id="'.$id.'edit'.$cont.'" class="edititem" style="'.$verono.'">
					 <table style="table-layout: fixed;">
					 <tr>
					 <td colspan="2">
					 <strong>Scene duration in miliseconds</strong> <input type="text" name="image'.$cont.'" id="image'.$cont.'" value="'.intval($item[2]).'" size="4"/>
					 <strong>Scene max width</strong> <input type="text" name="seo'.$cont.'" id="seo'.$cont.'" value="'.intval($item[6]).'" size="4"/>
					 <strong>Scene max height</strong> <input type="text" name="seol'.$cont.'" id="seol'.$cont.'" value="'.intval($item[7]).'" size="4"/>  
					 <input type="text" name="timage'.$cont.'" id="timage'.$cont.'" value="'.$item[5].'" class="upload'.$id.'" size="10"/>
						  <input class="upload-button'.$id.'" name="wsl-image-add" type="button" value=" Background image " />
					 </td>
					 </tr>
					 <tr>
					 <td>
					 <h2>Scene Items</h2>
					 </td>
					 <td>
					 
					
					 
					 
					
					 <input name="play'.$cont.'" id="play'.$cont.'" type="button" value=" > PLAY ITEMS "  onclick="recolocatet'.$cont.'();"/>
					   <input type=\'submit\' value=\' SAVE SCENE \' class="button-primary" name="save'.$cont.'" id="save'.$cont.'" /><br/>
					 </td>
					 </tr>
					 <tr>
					 <td height="'.($height_des+300).'px" >
					 <input type="hidden" name="seccion'.$id.'" id="seccion'.$id.'" value="items"/> 
					 <input type="hidden" name="unewelem'.$cont.'" id="unewelem'.$cont.'" value="" class="upload'.$id.'" /> 
					 <input type="button" name="newelem'.$cont.'" id="newelem'.$cont.'" value="New image item" /> 
					  <input type="submit" name="newhtml'.$cont.'" id="newhtml'.$cont.'" value="New html item" /> 
					  <input type="submit" name="deleteitems'.$cont.'" id="deleteitems'.$cont.'" value="Delete selected items" /><br/> 
					  
					  <div name="elemen'.$cont.'" id="elemen'.$cont.'" style="height: '.($height_des+250).'px; overflow-y: scroll; min-width: 320px; background-color:#777; padding-left:10px; padding-right:10px;">
					  ';
					  // begin scene items
					  
					  
					  
					  $elem=explode("*klaxx238zdfla*", $item[1]);
					  
					  
					  $htmlitems="";
					  $htmlsceneitems="";
					  
					  array_pop($elem);
					 // $elem=array_reverse($elem); 
					  $ce=0;
					  $elementos="";
					  $lastitem=0;
					  foreach($elem as $e) {
						  
						  $ev=explode("-k3sl9-", $e);
						  
						  // image
						 
						  if($ev[1]=="html" && $ev[0]!="") {
							  $elementos.='<div id="l'.$cont.'-'.$ce.'" name="l'.$cont.'-'.$ce.'" class="lines2"></div><div class="lines" id="b'.$cont.'-'.$ce.'" name="b'.$cont.'-'.$ce.'" ></div><div class="drag" id="itemslider'.$cont.'-'.$ce.'" name="itemslider'.$cont.'-'.$ce.'">'.$ev[0].'</div>';
							   $lastitem++;
						  }
						  else if($ev[0]!="") {
							  $elementos.='<div id="l'.$cont.'-'.$ce.'" name="l'.$cont.'-'.$ce.'" class="lines2"></div><div class="lines" id="b'.$cont.'-'.$ce.'" name="b'.$cont.'-'.$ce.'" ></div><img class="drag" id="itemslider'.$cont.'-'.$ce.'" name="itemslider'.$cont.'-'.$ce.'" src="'.$ev[0].'" />';
							  $lastitem++;
						  }
						  
						  
						  $htmlitems= '<div style="background-color: #ddd; padding-left:10px; padding-right:10px;">
						 
						  ';
						  
						  if($ev[1]=="html") $htmlitems.= '<h3><input type="checkbox" name="che'.$cont.'-'.$ce.'" id="che'.$cont.'-'.$ce.'" value="1"/> HTML '.$ce.'</h3><textarea name="image'.$cont.'-'.$ce.'" id="image'.$cont.'-'.$ce.'" style="width:300px; height: 80px; ">'.$ev[0].'</textarea>';
						  else $htmlitems.= '<h3><input type="checkbox" name="che'.$cont.'-'.$ce.'" id="che'.$cont.'-'.$ce.'" value="1"/>  IMAGE '.$ce.'</h3><input type="text" name="image'.$cont.'-'.$ce.'" id="image'.$cont.'-'.$ce.'" value="'.$ev[0].'" class="upload'.$id.'" size="30"/>
						  <input class="upload-button'.$id.'" name="wsl-image-add" type="button" value="IMAGE" />';
						  
						  $htmlitems.= '
						  <br/>
						   <strong>Link</strong>: <input name="link'.$cont.'-'.$ce.'" id="link'.$cont.'-'.$ce.'" type="text" value="'.$ev[12].'"  size="15" />
						  
						  <br/>
						  <input id="isde'.$cont.'-'.$ce.'" name="isde'.$cont.'-'.$ce.'" type="button" onclick="jQuery(\'#itemslider'.$cont.'-'.$ce.'\').trigger(\'click\'); menudesel'.$cont.'(); jQuery(\'#sde'.$cont.'-'.$ce.'\').toggle(); " value=" Start point " /> 
						   <input id="iede'.$cont.'-'.$ce.'" name="iede'.$cont.'-'.$ce.'" type="button" onclick="jQuery(\'#itemslider'.$cont.'-'.$ce.'\').trigger(\'click\'); menudesel'.$cont.'(); jQuery(\'#ede'.$cont.'-'.$ce.'\').toggle();" value=" Middle point " />  <input id="ifde'.$cont.'-'.$ce.'" name="ifde'.$cont.'-'.$ce.'" type="button" onclick="jQuery(\'#itemslider'.$cont.'-'.$ce.'\').trigger(\'click\'); menudesel'.$cont.'(); jQuery(\'#fde'.$cont.'-'.$ce.'\').toggle();" value=" End point " />
						   <br/>
						  <div id="sde'.$cont.'-'.$ce.'" name="sde'.$cont.'-'.$ce.'" style="display:none; background-color:#fff;">
						  
						  <table>
						  <tr>
						  <td colspan="4">
						  START POINT
						  </td>
						  </tr>
						  <tr>
						  <td>
						  <strong>Enter time</strong>
						  </td>
						  <td>
						  <input name="te'.$cont.'-'.$ce.'" id="te'.$cont.'-'.$ce.'" type="text" value="'.$ev[9].'"  size="4" title="Number in miliseconds" />
						  </td>
						  <td>
						  <strong>Duration</strong>
						  </td>
						  <td>
						  <input name="ent'.$cont.'-'.$ce.'" id="ent'.$cont.'-'.$ce.'" type="text" value="'.$ev[14].'"  size="4" title="Number in miliseconds"/>
						  </td>
						   </tr>
						   <tr>
						  <td>
						   <strong>X position</strong>
						    </td>
						  <td>
						  <input name="sx'.$cont.'-'.$ce.'" id="sx'.$cont.'-'.$ce.'" type="text" value="'.$ev[16].'"  size="4" title="Number, 0 : left in slider" />
						 
						   </td>
						  <td>
						  <strong>Y position</strong>
						   </td>
						  <td>
						  <input name="sy'.$cont.'-'.$ce.'" id="sy'.$cont.'-'.$ce.'" type="text" value="'.$ev[17].'"  size="4" title="Number, 0: top in slider" />
						 
						   </td>
						   </tr>
						   <tr>
						   
						  <td>
						  Z position 
						  </td>
						  <td>
						  <input name="sz'.$cont.'-'.$ce.'" id="sz'.$cont.'-'.$ce.'" type="text" value="'.$ev[18].'"  size="4" title="" />
						   </td>
						  <td>
						  <strong>Opacity</strong>
						  </td>
						  <td>
						  <input name="salpha'.$cont.'-'.$ce.'" id="salpha'.$cont.'-'.$ce.'" type="text" value="'.$ev[19].'"  size="4" title="0 not visible. Number between 0 and 1, sample: 0.5" />
						 
						   </td>
						   </tr>
						   <tr>
						   <td><strong>Enter effect</strong>
						   </td>
						   <td colspan="3">';
						   
						    $htmlitems.= '<select id="en'.$cont.'-'.$ce.'" name="en'.$cont.'-'.$ce.'">
						  <option value="">none</option>
						  ';
						  
						  if($ev[6]=="linear") $htmlitems.= '<option value="linear" selected="selected">linear</option>';
						  else  $htmlitems.= '<option value="linear">linear</option>';
						  
						  if($ev[6]=="swing") $htmlitems.= '<option value="swing" selected="selected">swing</option>';
						  else  $htmlitems.= '<option value="swing">swing</option>';
						  
						  if($ev[6]=="easeInQuad") $htmlitems.= '<option value="easeInQuad" selected="selected">easeInQuad</option>';
						  else  $htmlitems.= '<option value="easeInQuad">easeInQuad</option>';
						  
						  if($ev[6]=="easeOutQuad") $htmlitems.= '<option value="easeOutQuad" selected="selected">easeOutQuad</option>';
						  else  $htmlitems.= '<option value="easeOutQuad">easeOutQuad</option>';
						  
						  if($ev[6]=="easeInOutQuad") $htmlitems.= '<option value="easeInOutQuad" selected="selected">easeInOutQuad</option>';
						  else  $htmlitems.= '<option value="easeInOutQuad">easeInOutQuad</option>';
						  
						  if($ev[6]=="easeInCubic") $htmlitems.= '<option value="easeInCubic" selected="selected">easeInCubic</option>';
						  else  $htmlitems.= '<option value="easeInCubic">easeInCubic</option>';
						  
						  if($ev[6]=="easeOutCubic") $htmlitems.= '<option value="easeOutCubic" selected="selected">easeOutCubic</option>';
						  else  $htmlitems.= '<option value="easeOutCubic">easeOutCubic</option>';
						  
						  if($ev[6]=="easeInOutCubic") $htmlitems.= '<option value="easeInOutCubic" selected="selected">easeInOutCubic</option>';
						  else  $htmlitems.= '<option value="easeInOutCubic">easeInOutCubic</option>';
						  
						  if($ev[6]=="easeInQuart") $htmlitems.= '<option value="easeInQuart" selected="selected">easeInQuart</option>';
						  else  $htmlitems.= '<option value="easeInQuart">easeInQuart</option>';
						  
						  if($ev[6]=="easeOutQuart") $htmlitems.= '<option value="easeOutQuart" selected="selected">easeOutQuart</option>';
						  else  $htmlitems.= '<option value="easeOutQuart">easeOutQuart</option>';
						  
						  if($ev[6]=="easeInOutQuart") $htmlitems.= '<option value="easeInOutQuart" selected="selected">easeInOutQuart</option>';
						  else  $htmlitems.= '<option value="easeInOutQuart">easeInOutQuart</option>';
						  
						   if($ev[6]=="easeInQuint") $htmlitems.= '<option value="easeInQuint" selected="selected">easeInQuint</option>';
						  else  $htmlitems.= '<option value="easeInQuint">easeInQuint</option>';
						  
						   if($ev[6]=="easeOutQuint") $htmlitems.= '<option value="easeOutQuint" selected="selected">easeOutQuint</option>';
						  else  $htmlitems.= '<option value="easeOutQuint">easeOutQuint</option>';
						  
						   if($ev[6]=="easeInOutQuint") $htmlitems.= '<option value="easeInOutQuint" selected="selected">easeInOutQuint</option>';
						  else  $htmlitems.= '<option value="easeInOutQuint">easeInOutQuint</option>';
						  
						   if($ev[6]=="easeInExpo") $htmlitems.= '<option value="easeInExpo" selected="selected">easeInExpo</option>';
						  else  $htmlitems.= '<option value="easeInExpo">easeInExpo</option>';
						  
						   if($ev[6]=="easeOutExpo") $htmlitems.= '<option value="easeOutExpo" selected="selected">easeOutExpo</option>';
						  else  $htmlitems.= '<option value="easeOutExpo">easeOutExpo</option>';
						  
						   if($ev[6]=="easeInOutExpo") $htmlitems.= '<option value="easeInOutExpo" selected="selected">easeInOutExpo</option>';
						  else  $htmlitems.= '<option value="easeInOutExpo">easeInOutExpo</option>';
						  
						   if($ev[6]=="easeInSine") $htmlitems.= '<option value="easeInSine" selected="selected">easeInSine</option>';
						  else  $htmlitems.= '<option value="easeInSine">easeInSine</option>';
						  
						   if($ev[6]=="easeOutSine") $htmlitems.= '<option value="easeOutSine" selected="selected">easeOutSine</option>';
						  else  $htmlitems.= '<option value="easeOutSine">easeOutSine</option>';
						  
						   if($ev[6]=="easeInOutSine") $htmlitems.= '<option value="easeInOutSine" selected="selected">easeInOutSine</option>';
						  else  $htmlitems.= '<option value="easeInOutSine">easeInOutSine</option>';
						  
						   if($ev[6]=="easeInCirc") $htmlitems.= '<option value="easeInCirc" selected="selected">easeInCirc</option>';
						  else  $htmlitems.= '<option value="easeInCirc">easeInCirc</option>';
						  
						   if($ev[6]=="easeOutCirc") $htmlitems.= '<option value="easeOutCirc" selected="selected">easeOutCirc</option>';
						  else  $htmlitems.= '<option value="easeOutCirc">easeOutCirc</option>';
						  
						   if($ev[6]=="easeInOutCirc") $htmlitems.= '<option value="easeInOutCirc" selected="selected">easeInOutCirc</option>';
						  else  $htmlitems.= '<option value="easeInOutCirc">easeInOutCirc</option>';
						  
						   if($ev[6]=="easeInElastic") $htmlitems.= '<option value="easeInElastic" selected="selected">easeInElastic</option>';
						  else  $htmlitems.= '<option value="easeInElastic">easeInElastic</option>';
						  
						   if($ev[6]=="easeOutElastic") $htmlitems.= '<option value="easeOutElastic" selected="selected">easeOutElastic</option>';
						  else  $htmlitems.= '<option value="easeOutElastic">easeOutElastic</option>';
						  
						   if($ev[6]=="easeInOutElastic") $htmlitems.= '<option value="easeInOutElastic" selected="selected">easeInOutElastic</option>';
						  else  $htmlitems.= '<option value="easeInOutElastic">easeInOutElastic</option>';
						  
						   if($ev[6]=="easeInBack") $htmlitems.= '<option value="easeInBack" selected="selected">easeInBack</option>';
						  else  $htmlitems.= '<option value="easeInBack">easeInBack</option>';
						  
						   if($ev[6]=="easeOutBack") $htmlitems.= '<option value="easeOutBack" selected="selected">easeOutBack</option>';
						  else  $htmlitems.= '<option value="easeOutBack">easeOutBack</option>';
						  
						  if($ev[6]=="easeInOutBack") $htmlitems.= '<option value="easeInOutBack" selected="selected">easeInOutBack</option>';
						  else  $htmlitems.= '<option value="easeInOutBack">easeInOutBack</option>';
						  
						  if($ev[6]=="easeInBounce") $htmlitems.= '<option value="easeInBounce" selected="selected">easeInBounce</option>';
						  else  $htmlitems.= '<option value="easeInBounce">easeInBounce</option>';
						  
						  if($ev[6]=="easeOutBounce") $htmlitems.= '<option value="easeOutBounce" selected="selected">easeOutBounce</option>';
						  else  $htmlitems.= '<option value="easeOutBounce">easeOutBounce</option>';
						  
						  if($ev[6]=="easeInOutBounce") $htmlitems.= '<option value="easeInOutBounce" selected="selected">easeInOutBounce</option>';
						  else  $htmlitems.= '<option value="easeInOutBounce">easeInOutBounce</option>';
						 
						  
						  
						  
						  
						  
						  
						  $htmlitems.= '</select>';
						   
						   $htmlitems.= '</td>
						   </tr>
						  </table>
						  </div>
						 
						 
						  
						  <div id="ede'.$cont.'-'.$ce.'" name="ede'.$cont.'-'.$ce.'" style="display:none; background-color:#fff;">
						 
						  <table>
						  <tr>
						  <td colspan="4">
						  MIDDLE POINT
						  </td>
						  </tr>
						  <tr>
						  <td colspan="3"><strong>Miliseconds in scene</strong>
						  </td>
						  <td>
						  <input name="ts'.$cont.'-'.$ce.'" id="ts'.$cont.'-'.$ce.'" type="text" value="'.$ev[11].'"  size="4" />
						  </td>
						  </tr>
						  <tr>
						  <td>
						  
						  X position
						  </td>
						  <td>
						  <input name="x'.$cont.'-'.$ce.'" id="x'.$cont.'-'.$ce.'" type="text" value="'.$ev[2].'"  size="4" />
						  </td>
						  <td>
						  Y position
						  </td>
						  <td>
						  <input name="y'.$cont.'-'.$ce.'" id="y'.$cont.'-'.$ce.'" type="text" value="'.$ev[3].'"  size="4" />
						  </td>
						  </tr>
						  <tr>
						  <td>
						  Z position
						  </td>
						  <td>
						  <input name="z'.$cont.'-'.$ce.'" id="z'.$cont.'-'.$ce.'" type="text" value="'.$ev[4].'"  size="4" />
						  </td>
						  <td>
						  Opacity(0-1)
						  </td>
						  <td>
						  <input name="alpha'.$cont.'-'.$ce.'" id="alpha'.$cont.'-'.$ce.'" type="text" value="'.$ev[5].'"  size="4" />
						  </td>
						
						  </tr>
					<tr>
					<td><strong>Effect</strong>
					</td>
					<td colspan="3">';
					
					 $htmlitems.= '<select id="ep'.$cont.'-'.$ce.'" name="ep'.$cont.'-'.$ce.'">
						  <option value="">none</option>
						  ';
						  
						  if($ev[7]==1) $htmlitems.= '<option value="1" selected="selected">Left enter</option>';
						  else  $htmlitems.= '<option value="1">Left enter</option>';
						  
						  $htmlitems.= '</select>
					</td>
					</tr>
						  </table>
						  </div>
						   
						   
						   
						  
						  <div id="fde'.$cont.'-'.$ce.'" name="fde'.$cont.'-'.$ce.'" style="display:none; background-color:#fff;">
						 
						  <table>
						  <tr>
						  <td colspan="4">
						  END POINT
						  </td>
						  </tr>
						  <tr>
						  <td colspan="3">
						  <strong>Exit duration in miliseconds</strong>
						  </td>
						  <td>
						  <input name="tp'.$cont.'-'.$ce.'" id="tp'.$cont.'-'.$ce.'" type="text" value="'.$ev[10].'"  size="4" />
						  </td>
						 
						  </tr>
						  <tr>
						  <td>
						   X position
						   </td>
						  <td>
						  <input name="fx'.$cont.'-'.$ce.'" id="fx'.$cont.'-'.$ce.'" type="text" value="'.$ev[20].'"  size="4" />
						  </td>
						  <td>
						  Y position
						  </td>
						  <td>
						  <input name="fy'.$cont.'-'.$ce.'" id="fy'.$cont.'-'.$ce.'" type="text" value="'.$ev[21].'"  size="4" />
						  </td>
						  </tr>
						  <tr>
						  <td>
						  Z position
						  </td>
						  <td>
						  <input name="fz'.$cont.'-'.$ce.'" id="fz'.$cont.'-'.$ce.'" type="text" value="'.$ev[22].'"  size="4" />
						  </td>
						  <td>
						  Opacity(0-1)
						  </td>
						  <td>
						  <input name="falpha'.$cont.'-'.$ce.'" id="falpha'.$cont.'-'.$ce.'" type="text" value="'.$ev[23].'"  size="4" />
						  
						  </td>
						  </tr>
						  <tr>
						  <td><strong>Exit effect</strong>
						  </td>
						  <td colspan="3">
						   <select id="es'.$cont.'-'.$ce.'" name="es'.$cont.'-'.$ce.'">
						  <option value="">none</option>
						  ';

						  
						   if($ev[8]=="linear") $htmlitems.= '<option value="linear" selected="selected">linear</option>';
						  else  $htmlitems.= '<option value="linear">linear</option>';
						  
						  if($ev[8]=="swing") $htmlitems.= '<option value="swing" selected="selected">swing</option>';
						  else  $htmlitems.= '<option value="swing">swing</option>';
						  
						  if($ev[8]=="easeInQuad") $htmlitems.= '<option value="easeInQuad" selected="selected">easeInQuad</option>';
						  else  $htmlitems.= '<option value="easeInQuad">easeInQuad</option>';
						  
						  if($ev[8]=="easeOutQuad") $htmlitems.= '<option value="easeOutQuad" selected="selected">easeOutQuad</option>';
						  else  $htmlitems.= '<option value="easeOutQuad">easeOutQuad</option>';
						  
						  if($ev[8]=="easeInOutQuad") $htmlitems.= '<option value="easeInOutQuad" selected="selected">easeInOutQuad</option>';
						  else  $htmlitems.= '<option value="easeInOutQuad">easeInOutQuad</option>';
						  
						  if($ev[8]=="easeInCubic") $htmlitems.= '<option value="easeInCubic" selected="selected">easeInCubic</option>';
						  else  $htmlitems.= '<option value="easeInCubic">easeInCubic</option>';
						  
						  if($ev[8]=="easeOutCubic") $htmlitems.= '<option value="easeOutCubic" selected="selected">easeOutCubic</option>';
						  else  $htmlitems.= '<option value="easeOutCubic">easeOutCubic</option>';
						  
						  if($ev[8]=="easeInOutCubic") $htmlitems.= '<option value="easeInOutCubic" selected="selected">easeInOutCubic</option>';
						  else  $htmlitems.= '<option value="easeInOutCubic">easeInOutCubic</option>';
						  
						  if($ev[8]=="easeInQuart") $htmlitems.= '<option value="easeInQuart" selected="selected">easeInQuart</option>';
						  else  $htmlitems.= '<option value="easeInQuart">easeInQuart</option>';
						  
						  if($ev[8]=="easeOutQuart") $htmlitems.= '<option value="easeOutQuart" selected="selected">easeOutQuart</option>';
						  else  $htmlitems.= '<option value="easeOutQuart">easeOutQuart</option>';
						  
						  if($ev[8]=="easeInOutQuart") $htmlitems.= '<option value="easeInOutQuart" selected="selected">easeInOutQuart</option>';
						  else  $htmlitems.= '<option value="easeInOutQuart">easeInOutQuart</option>';
						  
						   if($ev[8]=="easeInQuint") $htmlitems.= '<option value="easeInQuint" selected="selected">easeInQuint</option>';
						  else  $htmlitems.= '<option value="easeInQuint">easeInQuint</option>';
						  
						   if($ev[8]=="easeOutQuint") $htmlitems.= '<option value="easeOutQuint" selected="selected">easeOutQuint</option>';
						  else  $htmlitems.= '<option value="easeOutQuint">easeOutQuint</option>';
						  
						   if($ev[8]=="easeInOutQuint") $htmlitems.= '<option value="easeInOutQuint" selected="selected">easeInOutQuint</option>';
						  else  $htmlitems.= '<option value="easeInOutQuint">easeInOutQuint</option>';
						  
						   if($ev[8]=="easeInExpo") $htmlitems.= '<option value="easeInExpo" selected="selected">easeInExpo</option>';
						  else  $htmlitems.= '<option value="easeInExpo">easeInExpo</option>';
						  
						   if($ev[8]=="easeOutExpo") $htmlitems.= '<option value="easeOutExpo" selected="selected">easeOutExpo</option>';
						  else  $htmlitems.= '<option value="easeOutExpo">easeOutExpo</option>';
						  
						   if($ev[8]=="easeInOutExpo") $htmlitems.= '<option value="easeInOutExpo" selected="selected">easeInOutExpo</option>';
						  else  $htmlitems.= '<option value="easeInOutExpo">easeInOutExpo</option>';
						  
						   if($ev[8]=="easeInSine") $htmlitems.= '<option value="easeInSine" selected="selected">easeInSine</option>';
						  else  $htmlitems.= '<option value="easeInSine">easeInSine</option>';
						  
						   if($ev[8]=="easeOutSine") $htmlitems.= '<option value="easeOutSine" selected="selected">easeOutSine</option>';
						  else  $htmlitems.= '<option value="easeOutSine">easeOutSine</option>';
						  
						   if($ev[8]=="easeInOutSine") $htmlitems.= '<option value="easeInOutSine" selected="selected">easeInOutSine</option>';
						  else  $htmlitems.= '<option value="easeInOutSine">easeInOutSine</option>';
						  
						   if($ev[8]=="easeInCirc") $htmlitems.= '<option value="easeInCirc" selected="selected">easeInCirc</option>';
						  else  $htmlitems.= '<option value="easeInCirc">easeInCirc</option>';
						  
						   if($ev[8]=="easeOutCirc") $htmlitems.= '<option value="easeOutCirc" selected="selected">easeOutCirc</option>';
						  else  $htmlitems.= '<option value="easeOutCirc">easeOutCirc</option>';
						  
						   if($ev[8]=="easeInOutCirc") $htmlitems.= '<option value="easeInOutCirc" selected="selected">easeInOutCirc</option>';
						  else  $htmlitems.= '<option value="easeInOutCirc">easeInOutCirc</option>';
						  
						   if($ev[8]=="easeInElastic") $htmlitems.= '<option value="easeInElastic" selected="selected">easeInElastic</option>';
						  else  $htmlitems.= '<option value="easeInElastic">easeInElastic</option>';
						  
						   if($ev[8]=="easeOutElastic") $htmlitems.= '<option value="easeOutElastic" selected="selected">easeOutElastic</option>';
						  else  $htmlitems.= '<option value="easeOutElastic">easeOutElastic</option>';
						  
						   if($ev[8]=="easeInOutElastic") $htmlitems.= '<option value="easeInOutElastic" selected="selected">easeInOutElastic</option>';
						  else  $htmlitems.= '<option value="easeInOutElastic">easeInOutElastic</option>';
						  
						   if($ev[8]=="easeInBack") $htmlitems.= '<option value="easeInBack" selected="selected">easeInBack</option>';
						  else  $htmlitems.= '<option value="easeInBack">easeInBack</option>';
						  
						   if($ev[8]=="easeOutBack") $htmlitems.= '<option value="easeOutBack" selected="selected">easeOutBack</option>';
						  else  $htmlitems.= '<option value="easeOutBack">easeOutBack</option>';
						  
						  if($ev[8]=="easeInOutBack") $htmlitems.= '<option value="easeInOutBack" selected="selected">easeInOutBack</option>';
						  else  $htmlitems.= '<option value="easeInOutBack">easeInOutBack</option>';
						  
						  if($ev[8]=="easeInBounce") $htmlitems.= '<option value="easeInBounce" selected="selected">easeInBounce</option>';
						  else  $htmlitems.= '<option value="easeInBounce">easeInBounce</option>';
						  
						  if($ev[8]=="easeOutBounce") $htmlitems.= '<option value="easeOutBounce" selected="selected">easeOutBounce</option>';
						  else  $htmlitems.= '<option value="easeOutBounce">easeOutBounce</option>';
						  
						  if($ev[8]=="easeInOutBounce") $htmlitems.= '<option value="easeInOutBounce" selected="selected">easeInOutBounce</option>';
						  else  $htmlitems.= '<option value="easeInOutBounce">easeInOutBounce</option>';
						  
						  
						  
						  
						  
						  
						  $htmlitems.= '</select>
						  
						  </td>
						  </tr>
						  </table>
						 
						 </div>
						  <br/>
						  
						  ';
						
						
						  $htmlitems.= '<input type="hidden" id="e'.$cont.'-'.$ce.'" name="e'.$cont.'-'.$ce.'" value="1"/><input type="hidden" id="html'.$cont.'-'.$ce.'" name="html'.$cont.'-'.$ce.'" value="'.$ev[1].'"/></div>';
						  
						  
						  
						  $htmlsceneitems=$htmlitems.$htmlsceneitems;
						  
						  $ce++;
						  
						  
					  } // end item
					 
					 
					
					 
					 
					 
					 echo $htmlsceneitems.'
					 </div>
					 </td>
					 <td style="width:700px; height:'.($height_des+200).'px;border: 1px solid #888; padding-left:150px; padding-top:100px;background-color:#ddd;">
					 <div>
					 
					   <div class="divslider drop" id="sl'.$cont.'" name="sl'.$cont.'"  style="height: '.$height_des.'px;">
					   '.$elementos.'
					   <div style="width: '.($sliderwidth-2).'px; height: 1px;border: 1px solid #000; bottom:0px; background-color: #fff; "></div>
					   <div style="position:absolute; width: '.($sliderwidth-2).'px; height: 1px;border: 1px solid #000; background-color: #fff;"></div>
					   <div style="width: 1px; height: '.($height_des-2).'px;border: 1px solid #000;background-color: #fff;"></div>
					   <div style="position:absolute; width: 1px; height: '.($height_des-2).'px;border: 1px solid #000;right:-1px;background-color: #fff;"></div>
					   
					   <div style="-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black; width: '.($sliderwidth+200).'px; border: 2px solid #fff; bottom: -130px; left:-100px; background-color: #fff; height: 20px;">
					   
					  
					   
					   <div id="btps'.$cont.'" name="btps'.$cont.'" style="background-color:  #0C0; height: 20px; width: 100px; left:0px;"></div>
					   
					   <div id="btpe'.$cont.'" name="btpe'.$cont.'" style="background-color:  #ff0; height: 20px; width: 300px; left:100px;"></div>
					   
					   <div id="btpf'.$cont.'" name="btpf'.$cont.'" style=" background-color:  #c30; height: 20px; width: 100px; left:400px;"></div>
					   
					   
					  
					   <div id="ibtpo'.$cont.'" name="ibtpo'.$cont.'" style="cursor: move; top: -32px; padding-bottom: 15px; padding-left: 15px; font-size:8px; color: #fff; background-color:  #444; height: 15px; width: 36px; left:77px;">SHOW</div>
					   
					    <div id="ibtps'.$cont.'" name="ibtps'.$cont.'" style="cursor: move; top: 22px; padding-bottom: 15px; padding-left: 10px; font-size:8px; color: #fff; background-color:  #444; height: 15px; width: 30px; left:200px;">Effect</div>
						
						 <div id="ibtpe'.$cont.'" name="ibtpe'.$cont.'" style="cursor: move; top: -32px; padding-bottom: 15px; padding-left: 15px; font-size:8px; color: #fff; background-color:  #444; height: 15px; width: 36px; left:300px;">HIDE</div>
					   
					    <div id="ibtpf'.$cont.'" name="ibtpf'.$cont.'" style="cursor: move; top: 22px; padding-bottom: 15px; padding-left: 10px; font-size:8px; color: #fff; background-color:  #444; height: 15px; width: 30px; left:400px;">Effect</div>
					   
					   <div style="left:'.($sliderwidth+100).'px; color:#000; top: 50px;">'.$item[2].' ms</div>
					   </div>
					   
					   </div>
					   </div>
					   
					   ';
					   
					   
					   echo '
					   
					   <script type="text/javascript">
			jQuery(document).ready(function() {
				
				selecteditem'.$cont.'="";
				
				var btpsw=jQuery("#btps'.$cont.'").width();
				var btpew=jQuery("#btpe'.$cont.'").width();
				var btpfw=jQuery("#btpf'.$cont.'").width();
				
				
				
				

				
				
				
				
				
				jQuery("#ibtpo'.$cont.'").draggable({ 
				
				axis: "x",
				cursor: "move",
				containment: "parent",
				
        drag: function(event, ui) {
				
           
			
			var ttotal=jQuery("#image'.$cont.'").val();
			
			var esct=eval(ttotal)/'.($sliderwidth+200).';
			
			
			
			
			
			var tiempos=Math.round(esct*(jQuery(this).position().left));
			
			
			var tiempototal=Math.round(eval(jQuery("#btpe'.$cont.'").width())+eval(jQuery("#btps'.$cont.'").width())+eval(jQuery("#btpf'.$cont.'").width()));
			
			//tiempototal=Math.round(esct*tiempototal);
			
			if(ui.position.left+tiempototal>('.($sliderwidth+200).')) {
				
				if(jQuery("#btps'.$cont.'").width()>0) {
					
					jQuery("#btps'.$cont.'").width(jQuery("#ibtpe'.$cont.'").position().left-(ui.position.left+jQuery("#btpe'.$cont.'").width()));
					jQuery("#ts"+selecteditem'.$cont.').val(Math.round(esct*jQuery("#btps'.$cont.'").width()));		
					
				}
				
				else ui.position.left=('.($sliderwidth+200).'-tiempototal);
				
			}
			
			
			jQuery("#btpe'.$cont.'").css({"left": jQuery(this).position().left+"px"});
			
			
			jQuery("#btps'.$cont.'").css({"left": jQuery("#btpe'.$cont.'").position().left+jQuery("#btpe'.$cont.'").width()+"px"});
			
			jQuery("#btpf'.$cont.'").css({"left": jQuery("#btps'.$cont.'").position().left+jQuery("#btps'.$cont.'").width()+"px"});
			
			jQuery("#ibtps'.$cont.'").css({"left": jQuery("#btpe'.$cont.'").position().left+jQuery("#btpe'.$cont.'").width()+"px"});
			
			jQuery("#ibtpe'.$cont.'").css({"left": jQuery("#btps'.$cont.'").position().left+jQuery("#btps'.$cont.'").width()+"px"});
			
			jQuery("#ibtpf'.$cont.'").css({"left": jQuery("#btpf'.$cont.'").position().left+jQuery("#btpf'.$cont.'").width()+"px"});
			
			jQuery("#te"+selecteditem'.$cont.').val(tiempos);
			
        },
		
		stop: function( event, ui ) { 
		
		jQuery("#isde"+selecteditem'.$cont.').trigger("click");
		
		
		}
				
				 });
				 
				 
				 
				 
				 // button time duration start effect
				 
				 
				 			jQuery("#ibtps'.$cont.'").draggable({ 
				
				axis: "x",
				cursor: "move",
				containment: "parent",
				
        drag: function(event, ui) {
				
           
			
			var ttotal=jQuery("#image'.$cont.'").val();
			
			var esct=eval(ttotal)/'.($sliderwidth+200).';
			
			
			
			if(ui.position.left<jQuery("#ibtpo'.$cont.'").position().left) {
				
				ui.position.left=jQuery("#ibtpo'.$cont.'").position().left;
				
			}
			
			
			var tiempos=Math.round(esct*(jQuery(this).position().left-jQuery("#ibtpo'.$cont.'").position().left));
			
			
			var tiempototal=Math.round(eval(jQuery("#btps'.$cont.'").width())+eval(jQuery("#btpf'.$cont.'").width()));
			
			
			
			
			//tiempototal=Math.round(esct*tiempototal);
			
			if(ui.position.left+tiempototal>('.($sliderwidth+200).')) {
				
				ui.position.left=('.($sliderwidth+200).'-tiempototal);
				
			}
			
			
			
			jQuery("#btpe'.$cont.'").width(ui.position.left-jQuery("#ibtpo'.$cont.'").position().left);
			jQuery("#btps'.$cont.'").css({"left": jQuery(this).position().left+"px"});
			
			jQuery("#ibtpe'.$cont.'").css({"left": jQuery("#btps'.$cont.'").position().left+jQuery("#btps'.$cont.'").width()+"px"});
			
			jQuery("#ibtpf'.$cont.'").css({"left": jQuery("#btpf'.$cont.'").position().left+jQuery("#btpf'.$cont.'").width()+"px"});
			
			
			
			jQuery("#btpf'.$cont.'").css({"left": jQuery("#btps'.$cont.'").position().left+jQuery("#btps'.$cont.'").width()+"px"});
			
			jQuery("#ent"+selecteditem'.$cont.').val(tiempos);
			
        },
		
		stop: function( event, ui ) { 
		
		jQuery("#isde"+selecteditem'.$cont.').trigger("click");
		}
				
				 });
				 
				 
				 
				 
				 // button  end item
				 
				 jQuery("#ibtpe'.$cont.'").draggable({ 
				
				axis: "x",
				cursor: "move",
				
        drag: function(event, ui) {
				
           
			
			var ttotal=jQuery("#image'.$cont.'").val();
			
			var esct=eval(ttotal)/'.($sliderwidth+200).';
			
			
			
			if(ui.position.left<jQuery("#ibtps'.$cont.'").position().left) {
				
				ui.position.left=jQuery("#ibtps'.$cont.'").position().left;
				
			}
			
			
			var tiempos=Math.round(esct*(jQuery(this).position().left-jQuery("#ibtps'.$cont.'").position().left));
			
			
			var tiempototal=Math.round(eval(jQuery("#btpf'.$cont.'").width()));
			
			
			
			
			//tiempototal=Math.round(esct*tiempototal);
			
			if(ui.position.left+tiempototal>('.($sliderwidth+200).')) {
				
				ui.position.left=('.($sliderwidth+200).'-tiempototal);
				
			}
			
			
			
			jQuery("#btps'.$cont.'").width(ui.position.left-jQuery("#ibtps'.$cont.'").position().left);
			jQuery("#btpf'.$cont.'").css({"left": jQuery(this).position().left+"px"});
			
			
			jQuery("#ibtpf'.$cont.'").css({"left": jQuery("#btpf'.$cont.'").position().left+jQuery("#btpf'.$cont.'").width()+"px"});
			
			
			
			jQuery("#btpf'.$cont.'").css({"left": jQuery("#btps'.$cont.'").position().left+jQuery("#btps'.$cont.'").width()+"px"});
			
			jQuery("#ts"+selecteditem'.$cont.').val(tiempos);
			
        },
		
		stop: function( event, ui ) { 
		
		jQuery("#iede"+selecteditem'.$cont.').trigger("click");
		}
				
				 });
				 
				 
				 
				  // button  end effect
				 
				 jQuery("#ibtpf'.$cont.'").draggable({ 
				
				axis: "x",
				cursor: "move",
				
        drag: function(event, ui) {
				
           
			
			var ttotal=jQuery("#image'.$cont.'").val();
			
			var esct=eval(ttotal)/'.($sliderwidth+200).';
			
			
			
			if(ui.position.left<jQuery("#ibtpe'.$cont.'").position().left) {
				
				ui.position.left=jQuery("#ibtpe'.$cont.'").position().left;
				
			}
			
			if(ui.position.left>('.($sliderwidth+200).')) {
				
				ui.position.left=('.($sliderwidth+200).');
				
			}
			
			
			var tiempos=Math.round(esct*(jQuery(this).position().left-jQuery("#ibtpe'.$cont.'").position().left));
			
			
			
			
			
			
			jQuery("#btpf'.$cont.'").width(jQuery(this).position().left-jQuery("#ibtpe'.$cont.'").position().left);
			
			
			
			
			jQuery("#tp"+selecteditem'.$cont.').val(tiempos);
			
        },
		
		stop: function( event, ui ) { 
		
		jQuery("#ifde"+selecteditem'.$cont.').trigger("click");
		}
				
				 });
				 
				 
				
				var sliderwidth='.$sliderwidth.';
				
				function sl'.$cont.'() {
				var loaded		= 0;
				
				var $images		= jQuery(\'#sl'.$cont.'\').find(\'img\');
				var total_elems=jQuery(\'#sl'.$cont.' img\').length;
							
						$images.each(function(){
							var $img	= jQuery(this);
							
							jQuery(\'<img/>\').attr("src", $img.attr("src")).load(function(){
								
								
								// image scalate
								var medac=Math.round((this.width/'.$width.')*sliderwidth);
								
								
								$img.css({\'width\'	: medac + \'px\'});
								
								//
								++loaded;
								if(loaded	== total_elems){
									run'.$cont.'();
								}
							})
						});
						
				}
				
			
				
				
				 sl'.$cont.'();
 
});





//////////77	



// recolocate from window

				function activarbarra() {
				
          
			var ttotal=jQuery("#image'.$cont.'").val();
			
			var esct=eval(ttotal)/'.($sliderwidth+200).';
			
			
			
			
			
			jQuery("#ibtpo'.$cont.'").css({"left": (eval(jQuery("#te"+selecteditem'.$cont.').val())/esct) + "px"});
			
			jQuery("#btpe'.$cont.'").css({"left": jQuery("#ibtpo'.$cont.'").position().left + "px"});
			
			
			jQuery("#ibtps'.$cont.'").css({"left": (eval(jQuery("#ent"+selecteditem'.$cont.').val())/esct) + jQuery("#ibtpo'.$cont.'").position().left + "px"});
			
			jQuery("#btps'.$cont.'").css({"left": jQuery("#ibtps'.$cont.'").position().left + "px"});
			
			
			jQuery("#ibtpe'.$cont.'").css({"left": (eval(jQuery("#ts"+selecteditem'.$cont.').val())/esct) + jQuery("#ibtps'.$cont.'").position().left + "px"});
			
			jQuery("#btpf'.$cont.'").css({"left": jQuery("#ibtpe'.$cont.'").position().left + "px"});
			
			jQuery("#ibtpf'.$cont.'").css({"left": (eval(jQuery("#tp"+selecteditem'.$cont.').val())/esct) + jQuery("#ibtpe'.$cont.'").position().left + "px"});
			
			
			
			
			
			
			
			
			jQuery("#btpe'.$cont.'").width(jQuery("#ibtps'.$cont.'").position().left-jQuery("#ibtpo'.$cont.'").position().left);
			
			jQuery("#btps'.$cont.'").width(jQuery("#ibtpe'.$cont.'").position().left-jQuery("#ibtps'.$cont.'").position().left);
			
			jQuery("#btpf'.$cont.'").width(jQuery("#ibtpf'.$cont.'").position().left-jQuery("#ibtpe'.$cont.'").position().left);
			
			
			
			
			
        }
		
				
						function recolocatew'.$cont.'() {
					
					
					
					var cont=0;
					
					while(cont < '.count($elem).') {
						
						
					if(jQuery(\'#itemslider'.$cont.'-\'+cont).exists()) {
						
						var p = jQuery(\'#itemslider'.$cont.'-\'+cont);
						var position = p.position();
						
						
					jQuery(\'#x'.$cont.'-\'+cont).val(position.left);
					jQuery(\'#y'.$cont.'-\'+cont).val(position.top);
					}
						++cont;
					}
					
				
				}
				
				
				
				
				
							
				
				function run'.$cont.'() {
					
					
					
					// inizialitze functions
					
					createsf'.$cont.'();
					
					
					
					var cont=0;
					
					while(cont < '.count($elem).') {
						
					
					if(jQuery(\'#itemslider'.$cont.'-\'+cont).exists()) {
					
					jQuery(\'#itemslider'.$cont.'-\'+cont).draggable({
						
						drag: function(event, ui) {
    
	var p = jQuery(this).attr("name");
						p=p.substring(10, p.length);
						selecteditem'.$cont.'=p;
						recolocateauxi'.$cont.'();
	recolocatelinesb'.$cont.'(p);
	
  },
						
						stop: function( event, ui ) { 
						
						var p = jQuery(this).attr("name");
						p=p.substring(10, p.length);
						selecteditem'.$cont.'=p;
						menudesel'.$cont.'();					
						jQuery("#ede"+p).show();
					
					
					
					jQuery("#elemen'.$cont.'").animate({scrollTop: jQuery("#che"+p).position().top-jQuery("#elemen'.$cont.'").position().top+jQuery("#elemen'.$cont.'").scrollTop()}, 1000);
						
						recolocatew'.$cont.'(); }
						
						});	
						
					jQuery(\'#itemslider'.$cont.'-\'+cont).click(function() {
						
						
						var p = jQuery(this).attr("name");
						p=p.substring(10, p.length);
						
						selecteditem'.$cont.'=p;
						
						menudesel'.$cont.'();
						
						jQuery("#ede"+p).show();
					
					
					
					jQuery("#elemen'.$cont.'").animate({scrollTop: jQuery("#che"+p).position().top-jQuery("#elemen'.$cont.'").position().top+jQuery("#elemen'.$cont.'").scrollTop()}, 1000);
						
						
						recolocateauxi'.$cont.'();
						
						recolocatelinesb'.$cont.'(p);
					
						activarbarra();	
						
						});	
					}
						++cont;
					}
					
					
					// mouse drag&drop elements
					
					 
				 recolocatets'.$cont.'(); // positionate elements
				}
				
function recolocatelinesb'.$cont.'(p) {




var pos1=jQuery(\'#itemslider\'+p).position();

						
						var widthaux=jQuery(\'#itemslider\'+p).width();
						
						var heightaux= jQuery(\'#itemslider\'+p).height();
						
						var sleft=eval(jQuery(\'#sx\'+p).val())+eval(eval(widthaux)/2)-10;
						var stop=eval(jQuery(\'#sy\'+p).val())+eval(eval(heightaux)/2)-10;
						
						var fleft=eval(jQuery(\'#fx\'+p).val())+eval(eval(widthaux)/2)-10;
						var ftop=eval(jQuery(\'#fy\'+p).val())+eval(eval(heightaux)/2)-10;
						
						
						
							var altu=0;
							
							pos1.top=eval(pos1.top)+eval(eval(heightaux)/2)-10;
							pos1.left=eval(pos1.left)+eval(eval(widthaux)/2)-10;
							
							altu=eval(pos1.top-stop);
							anchu=eval(pos1.left-sleft);
							
							var anchub=anchu;
							
							if(anchu<0) anchub=-anchu;
							
							jQuery(\'#l\'+p).width(anchub+\'px\');
							
							
							var angulo = Math.atan2(eval(altu), eval(anchu));
							angulo *= 180/Math.PI // rads to degs
							
							
							var rotation="rotate("+angulo+"deg)";
							var nwidth= Math.sqrt((eval(altu)*eval(altu)) + (eval(jQuery(\'#l\'+p).width())*eval(jQuery(\'#l\'+p).width())));
							jQuery(\'#l\'+p).width(Math.round(nwidth)+\'px\');
							
							jQuery(\'#l\'+p).css({\'-webkit-transform\': rotation, \'-moz-transform\': rotation, \'-ms-transform\': rotation,\'-o-transform\': rotation,\'transform\': rotation });
							var topauxi=0;
							topauxi=Math.round((eval(nwidth)-eval(anchu))/2);
							jQuery(\'#l\'+p).css({\'left\': eval(eval(sleft)-topauxi) + \'px\'});
							jQuery(\'#l\'+p).css({\'top\': eval(eval(stop)+(eval(altu)/2)) + \'px\'});
							
							
		
						
				
						altu=eval(pos1.top-ftop);
							anchu=eval(pos1.left-fleft);
							
							var anchub=anchu;
							
							if(anchu<0) anchub=-anchu;
							
							jQuery(\'#b\'+p).width(anchub+\'px\');
							
							
							var angulo = Math.atan2(eval(altu), eval(anchu));
							angulo *= 180/Math.PI // rads to degs
							
							
							var rotation="rotate("+angulo+"deg)";
							var nwidth= Math.sqrt((eval(altu)*eval(altu)) + (eval(jQuery(\'#b\'+p).width())*eval(jQuery(\'#b\'+p).width())));
							jQuery(\'#b\'+p).width(Math.round(nwidth)+\'px\');
							
							jQuery(\'#b\'+p).css({\'-webkit-transform\': rotation, \'-moz-transform\': rotation, \'-ms-transform\': rotation,\'-o-transform\': rotation,\'transform\': rotation });
							var topauxi=0;
							topauxi=Math.round((eval(nwidth)-eval(anchu))/2);
							jQuery(\'#b\'+p).css({\'left\': eval(eval(fleft)-topauxi) + \'px\'});
							jQuery(\'#b\'+p).css({\'top\': eval(eval(ftop)+(eval(altu)/2)) + \'px\'});
							
						
						
						
						
						
						jQuery(\'#s\'+p).show();
						jQuery(\'#f\'+p).show();
						jQuery(\'#l\'+p).show();
						jQuery(\'#b\'+p).show();

}
				
				
function recolocatelines'.$cont.'(p) {




var pos1=jQuery(\'#itemslider\'+p).position();
var pos2=jQuery(\'#s\'+p).position();
var pos3=jQuery(\'#f\'+p).position();
						
						var widthaux=jQuery(\'#itemslider\'+p).width();
						
						var heightaux= jQuery(\'#itemslider\'+p).height();


							pos1.top=eval(pos1.top)+eval(eval(heightaux)/2)-10;
							pos1.left=eval(pos1.left)+eval(eval(widthaux)/2)-10;
							
							pos2.top=eval(pos2.top)+eval(eval(heightaux)/2)-10;
							pos2.left=eval(pos2.left)+eval(eval(widthaux)/2)-10;
							
							pos3.top=eval(pos3.top)+eval(eval(heightaux)/2)-10;
							pos3.left=eval(pos3.left)+eval(eval(widthaux)/2)-10;
						
						
						
											
						var sleft=pos2.left;
						var stop=pos2.top;
						
						var fleft=pos3.left;
						var ftop=pos3.top;
						
						
						
							var altu=0;
							
							altu=eval(pos1.top-stop);
							anchu=eval(pos1.left-sleft);
							
							var anchub=anchu;
							
							if(anchu<0) anchub=-anchu;
							
							jQuery(\'#l\'+p).width(anchub+\'px\');
							
							
							var angulo = Math.atan2(eval(altu), eval(anchu));
							angulo *= 180/Math.PI // rads to degs
							
							
							var rotation="rotate("+angulo+"deg)";
							var nwidth= Math.sqrt((eval(altu)*eval(altu)) + (eval(jQuery(\'#l\'+p).width())*eval(jQuery(\'#l\'+p).width())));
							jQuery(\'#l\'+p).width(Math.round(nwidth)+\'px\');
							
							jQuery(\'#l\'+p).css({\'-webkit-transform\': rotation, \'-moz-transform\': rotation, \'-ms-transform\': rotation,\'-o-transform\': rotation,\'transform\': rotation });
							var topauxi=0;
							topauxi=Math.round((eval(nwidth)-eval(anchu))/2);
							jQuery(\'#l\'+p).css({\'left\': eval(eval(sleft)-topauxi) + \'px\'});
							jQuery(\'#l\'+p).css({\'top\': eval(eval(stop)+(eval(altu)/2)) + \'px\'});
							
							
		
						
				
						altu=eval(pos1.top-ftop);
							anchu=eval(pos1.left-fleft);
							
							var anchub=anchu;
							
							if(anchu<0) anchub=-anchu;
							
							jQuery(\'#b\'+p).width(anchub+\'px\');
							
							
							var angulo = Math.atan2(eval(altu), eval(anchu));
							angulo *= 180/Math.PI // rads to degs
							
							
							var rotation="rotate("+angulo+"deg)";
							var nwidth= Math.sqrt((eval(altu)*eval(altu)) + (eval(jQuery(\'#b\'+p).width())*eval(jQuery(\'#b\'+p).width())));
							jQuery(\'#b\'+p).width(Math.round(nwidth)+\'px\');
							
							jQuery(\'#b\'+p).css({\'-webkit-transform\': rotation, \'-moz-transform\': rotation, \'-ms-transform\': rotation,\'-o-transform\': rotation,\'transform\': rotation });
							var topauxi=0;
							topauxi=Math.round((eval(nwidth)-eval(anchu))/2);
							jQuery(\'#b\'+p).css({\'left\': eval(eval(fleft)-topauxi) + \'px\'});
							jQuery(\'#b\'+p).css({\'top\': eval(eval(ftop)+(eval(altu)/2)) + \'px\'});
							
						
						
						
						
						
						jQuery(\'#s\'+p).show();
						jQuery(\'#f\'+p).show();
						jQuery(\'#l\'+p).show();
						jQuery(\'#b\'+p).show();

}

	
var enditem=0; // item animate end
function recolocatet'.$cont.'() {
					
				recolocateauxi'.$cont.'();
			
					var cont=0;
					enditem=0;
					
					var totalcont='.count($elem).';
					
					while(cont < totalcont) {
				
				
				if(jQuery(\'#itemslider'.$cont.'-\'+cont).exists()) {
						
						var p = jQuery(\'#itemslider'.$cont.'-\'+cont);
						
		
		
						
						p.css({\'top\'	:  jQuery(\'#sy'.$cont.'-\'+cont).val() + \'px\'});
						p.css({\'left\'	:  jQuery(\'#sx'.$cont.'-\'+cont).val() + \'px\'});
						
						p.css({\'opacity\'	:  jQuery(\'#salpha'.$cont.'-\'+cont).val()});						
						
						';
						
						//////////// function only for admin, create start and end images and divs
						
						

						
						
						//////////////////////////////////////
						
						

echo '

						p.delay(jQuery(\'#te'.$cont.'-\'+cont).val()).animate({\'top\'	:  jQuery(\'#y'.$cont.'-\'+cont).val() + \'px\', \'left\'	:  jQuery(\'#x'.$cont.'-\'+cont).val() + \'px\', \'opacity\'	:  jQuery(\'#alpha'.$cont.'-\'+cont).val()}, jQuery(\'#ent'.$cont.'-\'+cont).val(), jQuery(\'#en'.$cont.'-\'+cont).val(), function () {
							
							
							exiti'.$cont.'(jQuery(this).attr("name"));
							
						
						});
						
						
				}
						++cont;
					}
					
				
				}
				
				function exiti'.$cont.'(cont) {
					
					
					var totalcont='.count($elem).';
					
					var taux="'.$cont.'";
					cont=cont.substring(10, cont.length);
					var cont2=cont.substring(taux.length+1, cont.length);
					
					
							var pleft=jQuery(\'#fx\'+cont).val();
							var ptop=jQuery(\'#fy\'+cont).val();
							var pop=jQuery(\'#falpha\'+cont).val();
							var ts =jQuery(\'#ts\'+cont).val();
							
							
							
    jQuery(\'#itemslider\'+cont).delay(ts).animate({\'top\'	:  ptop + \'px\', \'left\'	:  pleft + \'px\', \'opacity\'	:  pop}, jQuery(\'#tp\'+cont).val(), jQuery(\'#es\'+cont).val(), function() { 
	
	++enditem;
	
	if(enditem>='.$lastitem.') {
		
		recolocatets'.$cont.'();
	}});
				}
				
				
				
/// start and end element




				// recolocate from window
				
						function recolocatews'.$cont.'() {
							
							var taux="'.$cont.'";
							
							var cont=jQuery(this).attr("name");
					cont=cont.substring(1, cont.length);
					var cont2=cont.substring(taux.length+1, cont.length);
					
					alert(jQuery(this).attr("name"));
	
						
						if(jQuery(\'#s'.$cont.'-\'+cont2).exists()) {
						
						var p = jQuery(\'#s'.$cont.'-\'+cont2);
						
						
						
						var positions = p.position();
				
					
					jQuery(\'#sx'.$cont.'-\'+cont2).val(positions.left);
					jQuery(\'#sy'.$cont.'-\'+cont2).val(positions.top);
					
					
						}
						
					
				
				}
				
				// recolocate from window
				
						function recolocatewf'.$cont.'() {
					
					
					
					var cont=0;
					
					while(cont < '.count($elem).') {
						
						if(jQuery(\'#f'.$cont.'-\'+cont).exists()) {
		
						var pf = jQuery(\'#f'.$cont.'-\'+cont);
					
						var positionf = pf.position();
						
				
					
					jQuery(\'#fx'.$cont.'-\'+cont).val(positionf.left);
					jQuery(\'#fy'.$cont.'-\'+cont).val(positionf.top);
						}
						++cont;
					}
					
				
				}	
				
				
				
				function recolocatets'.$cont.'() {
					
					// set background
					
					if(jQuery("#timage'.$cont.'").val()!="") {
						jQuery("#sl'.$cont.'").css({"background-image" : "url(\'"+jQuery("#timage'.$cont.'").val()+"\')"});
						
						

var urlbi = jQuery(\'#sl'.$cont.'\').css(\'background-image\').replace(\'url(\', \'\').replace(\')\', \'\').replace("\'", \'\').replace(\'"\', \'\');


var bgImg = jQuery("<img />");
bgImg.hide();
bgImg.bind("load", function()
{
    var biheight = jQuery(this).height();
	var biwidth = jQuery(this).width();
	
    
});
jQuery("#sl'.$cont.'").append(bgImg);
bgImg.attr("src", urlbi);


					}
					
					var cont=0;
					var ulelem=-1;
					while(cont < '.count($elem).') {
					
					if(jQuery(\'#itemslider'.$cont.'-\'+cont).exists()) {	
						var p = jQuery(\'#itemslider'.$cont.'-\'+cont);
						
					
						p.css({\'top\'	:  jQuery(\'#y'.$cont.'-\'+cont).val() + \'px\', \'left\'	:  jQuery(\'#x'.$cont.'-\'+cont).val() + \'px\', \'opacity\'	:  \'1\'});
					
					
						ulelem=cont;
					
					}
						++cont;
					}
					
					if(ulelem>-1) {
						
						jQuery(\'#itemslider'.$cont.'-\'+ulelem).trigger(\'click\');
						
					}
					
				
				}
				
				
					function recolocateauxi'.$cont.'() { // ocult elements
					
					
					
					var cont=0;
					
					while(cont < '.count($elem).') {
						
						if(jQuery(\'#s'.$cont.'-\'+cont).exists()) {
						var p = jQuery(\'#s'.$cont.'-\'+cont);
						var p2 = jQuery(\'#f'.$cont.'-\'+cont);
						var p3 = jQuery(\'#l'.$cont.'-\'+cont);
						var p4 = jQuery(\'#b'.$cont.'-\'+cont);
						
						p.hide();
						p2.hide();
						p3.hide();
						p4.hide();
						}
						++cont;
					}
					
				
				}
				
				
					function menudesel'.$cont.'() { // ocult elements menu
					
					
					
					var cont=0;
					
					while(cont < '.count($elem).') {
						
						if(jQuery(\'#sde'.$cont.'-\'+cont).exists()) {
						
						jQuery(\'#sde'.$cont.'-\'+cont).hide();
						jQuery(\'#ede'.$cont.'-\'+cont).hide();
						jQuery(\'#fde'.$cont.'-\'+cont).hide();
						
						jQuery(\'#isde'.$cont.'-\'+cont).removeClass("blanc");
						jQuery(\'#iede'.$cont.'-\'+cont).removeClass("blanc");
						jQuery(\'#ifde'.$cont.'-\'+cont).removeClass("blanc");
						

						}
						++cont;
					}
					
				
				}
				
				
				
				
function createsf'.$cont.'() {
					
					
				
					var cont=0;
					
					var totalcont='.count($elem).';
					
					while(cont < totalcont) {
					
					
					if(jQuery(\'#itemslider'.$cont.'-\'+cont).exists()) {
						
						var p = jQuery(\'#itemslider'.$cont.'-\'+cont);				
						
						
						';
						
						//////////// function only for admin, create start and end images and divs
						
						
						echo "
						
						
						
						p.clone().addClass('select1').attr('id', 's".$cont."-'+cont ).attr('name', 's".$cont."-'+cont ).css({'top': jQuery('#sy".$cont."-'+cont).val() + 'px', 'left': jQuery('#sx".$cont."-'+cont).val() + 'px', 'opacity': 0.8}).insertAfter( p );
						
						p.clone().addClass('select2').attr('id', 'f".$cont."-'+cont ).attr('name', 'f".$cont."-'+cont ).css({'top': jQuery('#fy".$cont."-'+cont).val() + 'px', 'left': jQuery('#fx".$cont."-'+cont).val() + 'px', 'opacity': 0.8}).insertAfter( p );
						
						
						
											jQuery('#s".$cont."-'+cont).click(function() {
						
						
						var p = jQuery(this).attr('name');
						p=p.substring(1, p.length);
						
						
						menudesel".$cont."();
						
						jQuery('#sde'+p).show();
					
					
					
					jQuery('#elemen".$cont."').animate({scrollTop: jQuery('#che'+p).position().top-jQuery('#elemen".$cont."').position().top+jQuery('#elemen".$cont."').scrollTop()}, 1000);
						
						
						
						});	
						
						
						
						jQuery('#s".$cont."-'+cont).draggable({
							
							
							drag: function(event, ui) {
    
	var p = jQuery(this).attr('name');
						p=p.substring(1, p.length);
	recolocatelines".$cont."(p);
	
  },
						
						stop: function( event, ui ) { 
						
						
						
						
						var taux='".$cont."';
							
							var cont=jQuery(this).attr('name');
					cont=cont.substring(1, cont.length);
					var cont2=cont.substring(taux.length+1, cont.length);
					
					
					 menudesel".$cont."();
				
					jQuery(\"#sde".$cont."-\"+cont2).show();
					
					
					
					jQuery('#elemen".$cont."').animate({scrollTop: jQuery('#che".$cont."-'+cont2).position().top-jQuery('#elemen".$cont."').position().top+jQuery('#elemen".$cont."').scrollTop()}, 1000);
						
						
						
						if(jQuery('#s".$cont."-'+cont2).exists()) {
						
						var p = jQuery('#s".$cont."-'+cont2);
						
						
						
						var positions = p.position();
				
					
					jQuery('#sx".$cont."-'+cont2).val(positions.left);
					jQuery('#sy".$cont."-'+cont2).val(positions.top);
						}
						
						
						
						
						}
						
						});	
						
						
						jQuery('#f".$cont."-'+cont).click(function() {
						
						
						var p = jQuery(this).attr('name');
						p=p.substring(1, p.length);
						
						
						menudesel".$cont."();
						
						jQuery('#fde'+p).show();
					
					
					
					jQuery('#elemen".$cont."').animate({scrollTop: jQuery('#che'+p).position().top-jQuery('#elemen".$cont."').position().top+jQuery('#elemen".$cont."').scrollTop()}, 1000);
						
						
						
						});	
						
						jQuery('#f".$cont."-'+cont).draggable({
	
	
	drag: function(event, ui) {
    
	var pas = jQuery(this).attr('name');
						pas=pas.substring(1, pas.length);
						
	recolocatelines".$cont."(pas);
	
  },					
						stop: function( event, ui ) { 
						
						
						var taux='".$cont."';
							
							var cont=jQuery(this).attr('name');
					cont=cont.substring(1, cont.length);
					var cont2=cont.substring(taux.length+1, cont.length);
					
					menudesel".$cont."();
					
					jQuery(\"#fde".$cont."-\"+cont2).show();
					
					
					
					jQuery('#elemen".$cont."').animate({scrollTop: jQuery('#che".$cont."-'+cont2).position().top-jQuery('#elemen".$cont."').position().top+jQuery('#elemen".$cont."').scrollTop()}, 1000);
					
	
						
						if(jQuery('#f".$cont."-'+cont2).exists()) {
						
						var p = jQuery('#f".$cont."-'+cont2);
						
						
						
						var positions = p.position();
				
					
					jQuery('#fx".$cont."-'+cont2).val(positions.left);
					jQuery('#fy".$cont."-'+cont2).val(positions.top);
						}
						
						
						}
						
						});	
						
						";
						
						
						//////////////////////////////////////
						
						

echo '


					}
						++cont;
					}
					
				
				
				}

		</script>
					   
					   ';
					   
					 echo '</td></tr>
					 </table>
					 
					 SCENE ORDER: <input name="order'.$cont.'" type="text" value="'.$cont.'" size="4"/><br/>
					  
					  <input type=\'submit\' name="save'.$cont.'" id="save'.$cont.'" value=\'Save\' class="button-primary" />
					  
					 </div>
				
					 </li>';
					 $cont++;
					}
				

					$width=$width_old;
					$height=$height_old;
					

?>