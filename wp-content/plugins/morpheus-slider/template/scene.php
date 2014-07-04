<?php



					
					
					
					
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
					 echo '<li> 
					 
					 <div id="'.$id.'edit'.$cont.'" class="edititem" style="'.$verono.'">
					 <table style="table-layout: fixed;">
					 <tr>
					 <td colspan="2">
					 <h1>Edit scene '.$item[0].' </h1><a href="options-general.php?page=morpheus">Return to main menu.</a> || <a href="#icon-options-general">Scene background image, image tumbnail, effects and more.</a>
					 <br/>

						  
					<br/>
					 <div id="icon-upload" class="icon32"></div><h2>Scene Items</h2><br />
					
					  <input type="hidden" name="seccion'.$id.'" id="seccion'.$id.'" value="items"/> 
					 <input type="hidden" name="unewelem'.$id.'" id="unewelem'.$id.'" value="" class="upload'.$id.'" /> 
					 <input type="button" name="newelem'.$id.'" id="newelem'.$id.'" value="New image item" /> 
					  <input type="submit" name="newhtml'.$cont.'" id="newhtml'.$cont.'" value="New text item" /> 
					  <input type="submit" name="newyou'.$cont.'" id="newyou'.$cont.'" value="New youtube video" /> 
					  <input type="submit" name="deleteitems'.$cont.'" id="deleteitems'.$cont.'" value="Delete selected items" />
					  <input type="submit" name="duplicateitems'.$cont.'" id="duplicateitems'.$cont.'" value="Duplicate selected items" />
					 
					 <input name="play'.$cont.'" id="play'.$cont.'" type="button" value=" > PLAY ITEMS "  onclick="recolocatet'.$cont.'();"/>
					   <input type=\'submit\' value=\' SAVE SCENE \' class="button-primary" name="save'.$id.'" id="save'.$id.'" /><br/>
					 </td>
					 </tr>
					 <tr >
					 <td height="'.($height_des+300).'px" >
					
					  <div name="elemen'.$cont.'" id="elemen'.$cont.'" style="height: 100%; overflow-y: scroll; min-width: 320px; background-color:#000; padding-left:10px; padding-right:10px;text-shadow: 0 0 1px rgba(0,0,0,0.3);">
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
						  if($ev[1]=="" && $ev[0]!="") {
							  $elementos.='<div id="l'.$cont.'-'.$ce.'" name="l'.$cont.'-'.$ce.'" class="lines2"></div><div class="lines" id="b'.$cont.'-'.$ce.'" name="b'.$cont.'-'.$ce.'" ></div><img class="drag" id="itemslider'.$cont.'-'.$ce.'" name="itemslider'.$cont.'-'.$ce.'" src="'.$ev[0].'" />';
							  $lastitem++;
						  }
						  
						  if($ev[1]=="you" && $ev[0]!="") {
							  $elementos.='<div id="l'.$cont.'-'.$ce.'" name="l'.$cont.'-'.$ce.'" class="lines2"></div><div class="lines" id="b'.$cont.'-'.$ce.'" name="b'.$cont.'-'.$ce.'" ></div>
							  
							  <img class="drag" id="itemslider'.$cont.'-'.$ce.'" name="itemslider'.$cont.'-'.$ce.'" src="http://img.youtube.com/vi/'.getYTidmorpheus($ev[0]).'/default.jpg" />
							  ';
							   $lastitem++;
						  }
						  
						  
						  $htmlitems= '<div style="background-color: #ddd; padding-left:10px; padding-right:10px;">
						 
						  ';
						  
						  $tittipo="";
						  if($ev[1]=="html") $tittipo="Text ";
						  if($ev[1]=="you") $tittipo="Youtube video ";
						  if($ev[1]=="") $tittipo="Image ";
						  
						  
						  $htmlitems.= '<h3><input type="checkbox" name="che'.$cont.'-'.$ce.'" id="che'.$cont.'-'.$ce.'" value="1"/> '.$tittipo.'  '.$ce.'  <input type="button" onclick="jQuery(\'#editit'.$cont.'-'.$ce.'\').toggle();" value="EDIT ITEM" /> 
						  <button name="itu'.$cont.'-'.$ce.'" id="itu'.$cont.'-'.$ce.'" style="margin-top:5px;" >&#x25B2;</button>
						  <button name="itd'.$cont.'-'.$ce.'" id="itd'.$cont.'-'.$ce.'" style="margin-top:5px;" >&#x25BC;</button>
						  </h3>
						  <div id="editit'.$cont.'-'.$ce.'" name="editit'.$cont.'-'.$ce.'" style="display:none;">';
						  
						  
						  
						  if($ev[1]=="html") 
						  $htmlitems.= '
						  <textarea name="image'.$cont.'-'.$ce.'" id="image'.$cont.'-'.$ce.'" style="width:300px; height: 80px; ">'.$ev[0].'</textarea>
						 <br/><strong>Font size:</strong>
						  <input name="srx'.$cont.'-'.$ce.'" id="srx'.$cont.'-'.$ce.'" type="text" value="'.$ev[31].'"  size="4" title="Number in pixels" />
						  <strong>Width:</strong>
						  <input name="sw'.$cont.'-'.$ce.'" id="sw'.$cont.'-'.$ce.'" type="text" value="'.$ev[24].'"  size="4" title="Number in pixels" />
						  <br/><strong>Text color:</strong>
						   <input name="sh'.$cont.'-'.$ce.'" id="sh'.$cont.'-'.$ce.'" type="text" value="'.$ev[25].'" class="color" size="4" title="text color" />
						  ';
						  
						  
						  
						   if($ev[1]=="") $htmlitems.= '
						  <strong>Image URL</strong>
						  <input type="text" name="image'.$cont.'-'.$ce.'" id="image'.$cont.'-'.$ce.'" value="'.$ev[0].'" class="upload'.$id.'" size="30"/>
						  <input class="upload-button'.$id.'" name="wsl-image-add" type="button" value="IMAGE" />';
						  
						   if($ev[1]=="you") $htmlitems.= '
						  
						  <strong>Youtube url video:</strong>
						  <input type="text" name="image'.$cont.'-'.$ce.'" id="image'.$cont.'-'.$ce.'" value="'.$ev[0].'" size="36"/>
						  ';
						  
						  
						  
						  
						  $htmlitems.= '
						  <input name="tipo'.$cont.'-'.$ce.'" id="tipo'.$cont.'-'.$ce.'" type="hidden" value="'.$ev[1].'"  />
						  
						  
						   <br/><strong>Link</strong>: <input name="link'.$cont.'-'.$ce.'" id="link'.$cont.'-'.$ce.'" type="text" value="'.$ev[12].'"  size="30" /><br/>
						 <strong>Select axis of rotation:</strong> <select id="sry'.$cont.'-'.$ce.'" name="sry'.$cont.'-'.$ce.'"><option value="Y">Rotation Y</option>';
						  
						
						
						if($ev[30]=="X") $htmlitems.='<option value="X" selected="selected">Rotation X</option>';
						else $htmlitems.='<option value="X" >Rotation X</option>';
						
						if($ev[30]=="") $htmlitems.='<option value="" selected="selected">Rotation Z</option>';
						else $htmlitems.='<option value="" >Rotation Z</option>';
						  
						  $htmlitems.='
						  
						  </select><br/><br/>
						  </div>
						  
						  <input id="isde'.$cont.'-'.$ce.'" name="isde'.$cont.'-'.$ce.'" type="button" onclick="jQuery(\'#itemslider'.$cont.'-'.$ce.'\').trigger(\'click\'); menudesel'.$cont.'(); jQuery(\'#sde'.$cont.'-'.$ce.'\').toggle(); " value=" Start point " /> 
						   <input id="iede'.$cont.'-'.$ce.'" name="iede'.$cont.'-'.$ce.'" type="button" onclick="jQuery(\'#itemslider'.$cont.'-'.$ce.'\').trigger(\'click\'); menudesel'.$cont.'(); jQuery(\'#ede'.$cont.'-'.$ce.'\').toggle();" value=" Middle point " />  <input id="ifde'.$cont.'-'.$ce.'" name="ifde'.$cont.'-'.$ce.'" type="button" onclick="jQuery(\'#itemslider'.$cont.'-'.$ce.'\').trigger(\'click\'); menudesel'.$cont.'(); jQuery(\'#fde'.$cont.'-'.$ce.'\').toggle();" value=" End point " />
						   <br/>
						   
						   
						  <div id="sde'.$cont.'-'.$ce.'" name="sde'.$cont.'-'.$ce.'" style="display:none; background-color:#fff;">
						  
						  <table>
						  <tr>
						  <td colspan="4"  bgcolor="#ff0">
						  <center><strong style="color:#222;">START POINT</strong></center>
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
						    ';
						  
						  if($ev[1]!="html") $htmlitems.='<tr>
						  <td>
						   <strong>Width</strong>
						    </td>
						  <td>
						  <input name="sw'.$cont.'-'.$ce.'" id="sw'.$cont.'-'.$ce.'" type="text" value="'.$ev[24].'"  size="4" title="Number, 0 : left in slider" />
						 
						   </td>';
					  
						  $auxicolor="";
						  $auxicolor2="Number, 0: top in slider";
						  
						  if($ev[1]=="html") {
							 
						  }
						  else $htmlitems.='<td>
						   <strong>Height</strong></td>
						  <td>
						  <input name="sh'.$cont.'-'.$ce.'" id="sh'.$cont.'-'.$ce.'" type="text" value="'.$ev[25].'"  '.$auxicolor.' size="4" title="'.$auxicolor2.'" />
						 
						   </td></tr>';
						   
						   $htmlitems.='
						    
						   
						   <tr>
						   
						  <td>
						  <strong>Rotationº</strong>
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
						  <td colspan="4" bgcolor="#0c0">
						  <center><strong style="color:#fff;">MIDDLE POINT</strong></center>
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
						  
						  <strong>X position</strong>
						  </td>
						  <td>
						  <input name="x'.$cont.'-'.$ce.'" id="x'.$cont.'-'.$ce.'" type="text" value="'.$ev[2].'"  size="4" />
						  </td>
						  <td>
						  <strong>Y position</strong>
						  </td>
						  <td>
						  <input name="y'.$cont.'-'.$ce.'" id="y'.$cont.'-'.$ce.'" type="text" value="'.$ev[3].'"  size="4" />
						  </td>
						  </tr>
						  
						  ';
						  
						  
						  if($ev[1]!="html") $htmlitems.='<tr>
						  <td>
						   <strong>Width</strong>
						    </td>
						  <td>
						  <input name="w'.$cont.'-'.$ce.'" id="w'.$cont.'-'.$ce.'" type="text" value="'.$ev[26].'"  size="4" title="Number, 0 : left in slider" />
						 
						   </td>';
						
						  
						  $auxicolor="";
						  $auxicolor2="Number, 0: top in slider";
						  if($ev[1]=="html") {

						  }
						  else $htmlitems.='<td>
						   <strong>Height</strong> </td>
						  <td>
						  <input name="h'.$cont.'-'.$ce.'" id="h'.$cont.'-'.$ce.'" type="text" value="'.$ev[27].'"  '.$auxicolor.' size="4" title="'.$auxicolor2.'" />
						 
						   </td></tr>';
						   
						   $htmlitems.='
						   
						   
						  
						  <tr>
						  <td>
						  <strong>Rotationº</strong>
						  </td>
						  <td>
						  <input name="z'.$cont.'-'.$ce.'" id="z'.$cont.'-'.$ce.'" type="text" value="'.$ev[4].'"  size="4" />
						  </td>
						  <td>
						  <strong>Opacity(0-1)</strong>
						  </td>
						  <td>
						  <input name="alpha'.$cont.'-'.$ce.'" id="alpha'.$cont.'-'.$ce.'" type="text" value="'.$ev[5].'"  size="4" />
						  </td>
						
						  </tr>
						  
						  
					<tr>
					<td><strong>Effect</strong>
					</td>
					<td colspan="3">';
					
					
					
					/*
					<tr>
						   
						  <td>
						  <strong>auxi 1</strong>
						  </td>
						  <td>
						  <input name="ry'.$cont.'-'.$ce.'" id="ry'.$cont.'-'.$ce.'" type="text" value="'.$ev[32].'"  size="4" title="" />
						   </td>
						  <td>
						  <strong>auxi 2</strong>
						  </td>
						  <td>
						  <input name="rx'.$cont.'-'.$ce.'" id="rx'.$cont.'-'.$ce.'" type="text" value="'.$ev[33].'"  size="4" title="0 not visible. Number between 0 and 1, sample: 0.5" />
						 
						   </td>
						   </tr>
					*/
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
						  <td colspan="4" bgcolor="#f00">
						 <center><strong style="color:#fff;">END POINT</strong></center>
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
						   <strong>X position</strong>
						   </td>
						  <td>
						  <input name="fx'.$cont.'-'.$ce.'" id="fx'.$cont.'-'.$ce.'" type="text" value="'.$ev[20].'"  size="4" />
						  </td>
						  <td>
						  <strong>Y position</strong>
						  </td>
						  <td>
						  <input name="fy'.$cont.'-'.$ce.'" id="fy'.$cont.'-'.$ce.'" type="text" value="'.$ev[21].'"  size="4" />
						  </td>
						  </tr>
						  ';
						 
						   if($ev[1]!="html") $htmlitems.='<tr>
						  <td>
						   <strong>Width</strong>
						    </td>
						  <td>
						  <input name="fw'.$cont.'-'.$ce.'" id="fw'.$cont.'-'.$ce.'" type="text" value="'.$ev[28].'"  size="4" title="Number, 0 : left in slider" />
						 
						   </td>';
						  
						
						  
						  $auxicolor="";
						  $auxicolor2="Number, 0: top in slider";
						  if($ev[1]=="html") {
							 
						  }
						  else $htmlitems.='<td>
						   <strong>Height</strong></td>
						  <td>
						  <input name="fh'.$cont.'-'.$ce.'" id="fh'.$cont.'-'.$ce.'" type="text" value="'.$ev[29].'"  '.$auxicolor.' size="4" title="'.$auxicolor2.'" />
						 
						   </td>
						   </tr>';
						   
						   $htmlitems.='
						    
						  <tr>
						  <td>
						  <strong>Rotationº</strong>
						  </td>
						  <td>
						  <input name="fz'.$cont.'-'.$ce.'" id="fz'.$cont.'-'.$ce.'" type="text" value="'.$ev[22].'"  size="4" />
						  </td>
						  <td>
						  <strong>Opacity(0-1)</strong>
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

						 /*
						  <tr>
						   
						  <td>
						  <strong>auxi 1</strong>
						  </td>
						  <td>
						  <input name="fry'.$cont.'-'.$ce.'" id="fry'.$cont.'-'.$ce.'" type="text" value="'.$ev[34].'"  size="4" title="" />
						   </td>
						  <td>
						  <strong>auxi 2</strong>
						  </td>
						  <td>
						  <input name="frx'.$cont.'-'.$ce.'" id="frx'.$cont.'-'.$ce.'" type="text" value="'.$ev[35].'"  size="4" title="0 not visible. Number between 0 and 1, sample: 0.5" />
						 
						   </td>
						   </tr>
						 */ 
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
					 
					 
					
					
					
					
					
					////// default vals
					
					$timetext=$item[2];
					if($item[2]=="") $timetext=$border;
					
					//////
					 
					 
					 
					 echo $htmlsceneitems.'
					 </div>
					 </td>
					 <td style="width:700px; height:'.($height_des+200).'px;border: 1px solid #888; padding-left:40px; padding-top:100px;background-color:#ddd;">
					 <div>
					 
					 
					   <div class="divslider drop" id="sl'.$cont.'" name="sl'.$cont.'"  style="height: '.$height_des.'px;background-color:#012;">
					   '.$elementos.'
					   <img id="rotate'.$cont.'" name="rotate'.$cont.'" src="'.plugins_url('', __FILE__).'/rotate.png" style="cursor: pointer;" />
					   <img id="escalate'.$cont.'" name="escalate'.$cont.'" src="'.plugins_url('', __FILE__).'/resize.png" style="cursor: pointer;"/>
					   <div style="width: '.($sliderwidth-2).'px; height: 1px;border: 1px solid #000; bottom:0px; background-color: #fff; "></div>
					   <div style="position:absolute; width: '.($sliderwidth-2).'px; height: 1px;border: 1px solid #000; background-color: #fff;"></div>
					   <div style="width: 1px; height: '.($height_des-2).'px;border: 1px solid #000;background-color: #fff;"></div>
					   <div style="position:absolute; width: 1px; height: '.($height_des-2).'px;border: 1px solid #000;right:-1px;background-color: #fff;"></div>
					   
					   <div style="width: '.($sliderwidth).'px; border: 2px solid #fff; bottom: -130px; left:0px; background-color: #fff; height: 20px;">
					   
					  
					   
					   <div id="btps'.$cont.'" name="btps'.$cont.'" style="background-color:  #0C0; height: 20px; width: 0px; left:0px;"></div>
					   
					   <div id="btpe'.$cont.'" name="btpe'.$cont.'" style="background-color:  #ff0; height: 20px; width: 0px; left:100px;"></div>
					   
					   <div id="btpf'.$cont.'" name="btpf'.$cont.'" style=" background-color:  #c30; height: 20px; width: 0px; left:'.$sliderwidth.'px;"></div>
					  
					   <div id="ibtpo'.$cont.'" name="ibtpo'.$cont.'" style="cursor: move; top: -32px; padding-bottom: 15px; padding-left: 10px; font-size:8px; color: #fff; background-color:  #444; height: 15px; width: 30px; left:0px;">Effect</div>
					   
					    <div id="ibtps'.$cont.'" name="ibtps'.$cont.'" style="cursor: move; top: 22px; padding-bottom: 15px; padding-left: 10px; font-size:8px; color: #fff; background-color:  #444; height: 15px; width: 36px; left:0px;">START</div>
						
						 <div id="ibtpe'.$cont.'" name="ibtpe'.$cont.'" style="cursor: move; top: -32px; padding-bottom: 15px; padding-left: 11px; font-size:8px; color: #fff; background-color:  #444; height: 15px; width: 36px; left:0px;">END</div>
					   
					    <div id="ibtpf'.$cont.'" name="ibtpf'.$cont.'" style="cursor: move; top: 22px; padding-bottom: 15px; padding-left: 10px; font-size:8px; color: #fff; background-color:  #444; height: 15px; width: 30px; left:0px;">Effect</div>
					   
					   <div style="left:'.(($sliderwidth/2)-100).'px; color:#000; top: 60px; width:300px">ITEM TIMELINE '.$timetext.' ms</div>
					   </div>
					   
					   </div>
					   </div>
					   ';
					   
					   
					   echo '
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   <script type="text/javascript">
			jQuery(document).ready(function() {
				
				selecteditem'.$cont.'="";
				selectedid="";
				
				var btpsw=jQuery("#btps'.$cont.'").width();
				var btpew=jQuery("#btpe'.$cont.'").width();
				var btpfw=jQuery("#btpf'.$cont.'").width();
				
				
				
				

				
				
				
				
				
				jQuery("#ibtpo'.$cont.'").draggable({ 
				
				axis: "x",
				cursor: "move",
				containment: "parent",
				
        drag: function(event, ui) {
				
           
			
			var ttotal='.$border.';
			if(jQuery("#image'.$cont.'").val()!="") ttotal=parseInt(jQuery("#image'.$cont.'").val());
			
			
			var esct=eval(ttotal)/'.($sliderwidth).';
			
			
			
			
			
			var tiempos=Math.round(esct*(jQuery(this).position().left));
			
			
			var tiempototal=Math.round(eval(jQuery("#btpe'.$cont.'").width())+eval(jQuery("#btps'.$cont.'").width())+eval(jQuery("#btpf'.$cont.'").width()));
			
			//tiempototal=Math.round(esct*tiempototal);
			
			if(ui.position.left+tiempototal>('.($sliderwidth).')) {
				
				if(jQuery("#btps'.$cont.'").width()>0) {
					
					jQuery("#btps'.$cont.'").width(jQuery("#ibtpe'.$cont.'").position().left-(ui.position.left+jQuery("#btpe'.$cont.'").width()));
					jQuery("#ts"+selecteditem'.$cont.').val(Math.round(esct*jQuery("#btps'.$cont.'").width()));		
					
				}
				
				else ui.position.left=('.($sliderwidth).'-tiempototal);
				
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
				
           
			
			var ttotal='.$border.';
			if(jQuery("#image'.$cont.'").val()!="") ttotal=parseInt(jQuery("#image'.$cont.'").val());
			
			
			var esct=eval(ttotal)/'.($sliderwidth).';
			
			
			
			if(ui.position.left<jQuery("#ibtpo'.$cont.'").position().left) {
				
				ui.position.left=jQuery("#ibtpo'.$cont.'").position().left;
				
			}
			
			
			var tiempos=Math.round(esct*(jQuery(this).position().left-jQuery("#ibtpo'.$cont.'").position().left));
			
			
			var tiempototal=Math.round(eval(jQuery("#btps'.$cont.'").width())+eval(jQuery("#btpf'.$cont.'").width()));
			
			
			
			
			//tiempototal=Math.round(esct*tiempototal);
			
			if(ui.position.left+tiempototal>('.($sliderwidth).')) {
				
				ui.position.left=('.($sliderwidth).'-tiempototal);
				
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
				
           
			
			var ttotal='.$border.';
			if(jQuery("#image'.$cont.'").val()!="") ttotal=parseInt(jQuery("#image'.$cont.'").val());
			
			
			var esct=eval(ttotal)/'.($sliderwidth).';
			
			
			
			if(ui.position.left<jQuery("#ibtps'.$cont.'").position().left) {
				
				ui.position.left=jQuery("#ibtps'.$cont.'").position().left;
				
			}
			
			
			var tiempos=Math.round(esct*(jQuery(this).position().left-jQuery("#ibtps'.$cont.'").position().left));
			
			
			var tiempototal=Math.round(eval(jQuery("#btpf'.$cont.'").width()));
			
			
			
			
			//tiempototal=Math.round(esct*tiempototal);
			
			if(ui.position.left+tiempototal>('.($sliderwidth).')) {
				
				ui.position.left=('.($sliderwidth).'-tiempototal);
				
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
				
           
			
			var ttotal='.$border.';
			if(jQuery("#image'.$cont.'").val()!="") ttotal=parseInt(jQuery("#image'.$cont.'").val());
			
			
			var esct=eval(ttotal)/'.($sliderwidth).';
			
			
			
			if(ui.position.left<jQuery("#ibtpe'.$cont.'").position().left) {
				
				ui.position.left=jQuery("#ibtpe'.$cont.'").position().left;
				
			}
			
			if(ui.position.left>('.($sliderwidth).')) {
				
				ui.position.left=('.($sliderwidth).');
				
			}
			
			
			var tiempos=Math.round(esct*(jQuery(this).position().left-jQuery("#ibtpe'.$cont.'").position().left));
			
			
			
			
			
			
			jQuery("#btpf'.$cont.'").width(jQuery(this).position().left-jQuery("#ibtpe'.$cont.'").position().left);
			
			
			
			
			jQuery("#tp"+selecteditem'.$cont.').val(tiempos);
			
        },
		
		stop: function( event, ui ) { 
		
		jQuery("#ifde"+selecteditem'.$cont.').trigger("click");
		}
				
				 });
				 
				 
				
				
				
				
				// inice code
				
				var sliderwidth='.$sliderwidth.';
				
				function sl'.$cont.'() {
				var loaded		= 0;
				
				var $images		= jQuery(\'#sl'.$cont.'\').find(\'img\');
				var total_elems=jQuery(\'#sl'.$cont.' img\').length;
				
				if(total_elems<=0) run'.$cont.'();
							
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
				
          
			var ttotal='.$border.';
			if(jQuery("#image'.$cont.'").val()!="") ttotal=parseInt(jQuery("#image'.$cont.'").val());
			
			
			var esct=eval(ttotal)/'.($sliderwidth).';
			
			
			
			
			
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
				
				
				
				toprotate=0;
				leftrotate=0;
				
				
				jQuery(\'#rotate'.$cont.'\').draggable({
					
						axis: "x",
						
						drag: function(event, ui) {
    					
						var angulo=0;
	
						if(selectedid=="s"+selecteditem'.$cont.') {
							angulo = jQuery("#sz"+selecteditem'.$cont.').val();
						}
						if(selectedid=="f"+selecteditem'.$cont.') {
							angulo = jQuery("#fz"+selecteditem'.$cont.').val();
						}
						if(selectedid=="itemslider"+selecteditem'.$cont.') {
							angulo = jQuery("#z"+selecteditem'.$cont.').val();
						}
						
						if(ui.position.left>leftrotate-20 && ui.position.left<leftrotate+20) angulo=eval(angulo)+((ui.position.left-leftrotate)/1);
						
						//if(ui.position.left>leftrotate) angulo=angulo+((ui.position.left-leftrotate)/1);
						//if(ui.position.left<leftrotate) angulo=angulo((ui.position.left/leftrotate)/1);
						
						//angulo=angulo+((ui.position.top-toprotate)/10);
						
						//if(ui.position.top>toprotate) ++angulo;
						//if(ui.position.top<toprotate) --angulo;
						
						//if(ui.position.top>toprotate-20 && ui.position.top<toprotate+20) angulo=eval(angulo)+((ui.position.top-toprotate)/1);
						
						
						if(angulo>180) {
							
							//ui.position.left=jQuery("#"+selectedid).position().left+180;
							
							//angulo=180;
							}
							
							if(angulo<-180) {
							
							//ui.position.left=jQuery("#"+selectedid).position().left-180;
							
							//angulo=-180;
							}
							angulo=Math.round(angulo);
							
						leftrotate=ui.position.left;
						toprotate=ui.position.top;
						var rotation="rotate"+jQuery("#sry"+selecteditem'.$cont.').val()+"("+angulo+"deg)";
						
						jQuery("#"+selectedid).css({\'-webkit-transform\': rotation, \'-moz-transform\': rotation, \'-ms-transform\': rotation,\'-o-transform\': rotation,\'transform\': rotation });
						
						
						if(selectedid=="s"+selecteditem'.$cont.') {
							jQuery("#sz"+selecteditem'.$cont.').val(angulo);
						}
						if(selectedid=="f"+selecteditem'.$cont.') {
							jQuery("#fz"+selecteditem'.$cont.').val(angulo);
						}
						if(selectedid=="itemslider"+selecteditem'.$cont.') {
							jQuery("#z"+selecteditem'.$cont.').val(angulo);
						}
						
						//var nwidth= Math.sqrt((eval(altu)*eval(altu)) + (eval(jQuery(\'#l\'+p).width())*eval(jQuery(\'#l\'+p).width())));
							

	
	
	
  },
						
						stop: function( event, ui ) { 
						
						
						
				
				 }
						
						});	
				
				
				
							//escalate function
							
							topescalate=0;
				leftescalate=0;
				
				
				jQuery(\'#escalate'.$cont.'\').draggable({
					
						axis: "y",
						
						drag: function(event, ui) {
    					
						var ewidth=0;
						var eheight=0;
	
	if(jQuery("#tipo"+selecteditem'.$cont.').val()!="html") {
		
						if(selectedid=="s"+selecteditem'.$cont.') {
							ewidth = jQuery("#sw"+selecteditem'.$cont.').val();
							eheight = jQuery("#sh"+selecteditem'.$cont.').val();
						}
						if(selectedid=="f"+selecteditem'.$cont.') {
							ewidth = jQuery("#fw"+selecteditem'.$cont.').val();
							eheight = jQuery("#fh"+selecteditem'.$cont.').val();
						}
						if(selectedid=="itemslider"+selecteditem'.$cont.') {
							ewidth = jQuery("#w"+selecteditem'.$cont.').val();
							eheight = jQuery("#h"+selecteditem'.$cont.').val();
						}
						
						
						if(ui.position.top>topescalate-20 && ui.position.top<topescalate+20) {
						
						var ah=eval(eheight);
						eheight=eval(eheight)+((ui.position.top-topescalate)/1);
						var nw=(eval(ewidth)/ah)*((ui.position.top-topescalate)/1);
						
						ewidth=eval(ewidth)+Math.round(nw);
						}
						
	}
	else {
		ewidth = jQuery("#srx"+selecteditem'.$cont.').val();
		if(ui.position.top>topescalate-20 && ui.position.top<topescalate+20) {
						
						var ah=eval(ewidth);
						ewidth=eval(ewidth)+((ui.position.top-topescalate)/1);
						
						}
	}
						
						
						
						
				
							eheight=Math.round(eheight);
							ewidth=Math.round(ewidth);
							
							if(!ewidth || ewidth<1) ewidth=1;
							if(!eheight || eheight<1) eheight=1;
							
						leftescalate=ui.position.left;
						topescalate=ui.position.top;
						

						if(jQuery("#tipo"+selecteditem'.$cont.').val()=="html") {
							
							jQuery("#"+selectedid).css({"font-size" : Math.round(ewidth)+"px"});
							jQuery("#srx"+selecteditem'.$cont.').val(ewidth);
							
						}
						
						else {
							jQuery("#"+selectedid).width(ewidth);
							jQuery("#"+selectedid).height(eheight);
						
						
						if(selectedid=="s"+selecteditem'.$cont.') {
							jQuery("#sw"+selecteditem'.$cont.').val(ewidth);
							jQuery("#sh"+selecteditem'.$cont.').val(eheight);
						}
						if(selectedid=="f"+selecteditem'.$cont.') {
							jQuery("#fw"+selecteditem'.$cont.').val(ewidth);
							jQuery("#fh"+selecteditem'.$cont.').val(eheight);
						}
						if(selectedid=="itemslider"+selecteditem'.$cont.') {
							jQuery("#w"+selecteditem'.$cont.').val(ewidth);
							jQuery("#h"+selecteditem'.$cont.').val(eheight);
						}
						}
						//var nwidth= Math.sqrt((eval(altu)*eval(altu)) + (eval(jQuery(\'#l\'+p).width())*eval(jQuery(\'#l\'+p).width())));
							

	
	
	
  },
						
						stop: function( event, ui ) { 
						
						
						recolocatets'.$cont.'();
				
				 }
						
						});	
							
							///////////////////7
				
				function run'.$cont.'() {
					
					
					
					// inizialitze functions
					
					createsf'.$cont.'();
					
					
					
					var cont=0;
					
					while(cont < '.count($elem).') {
						
					
					if(jQuery(\'#itemslider'.$cont.'-\'+cont).exists()) {
					
					jQuery(\'#itemslider'.$cont.'-\'+cont).draggable({
						
						drag: function(event, ui) {
    
						var p = jQuery(this).attr("name");
						
						selectedid=p;
					
						p=p.substring(10, p.length);
						selecteditem'.$cont.'=p;
						recolocateauxi'.$cont.'();
	recolocatelinesb'.$cont.'(p);
	
	//// rotate button
						
						jQuery("#rotate'.$cont.'").css({"top": ui.position.top+80, "left": ui.position.left});
						jQuery("#escalate'.$cont.'").css({"top": ui.position.top+80, "left": ui.position.left+80});
	
  },
						
						stop: function( event, ui ) { 
						
						var p = jQuery(this).attr("name");
						selectedid=p;
						p=p.substring(10, p.length);
						selecteditem'.$cont.'=p;
						menudesel'.$cont.'();					
						jQuery("#ede"+p).show();
					
					
					
					jQuery("#elemen'.$cont.'").animate({scrollTop: jQuery("#che"+p).position().top-jQuery("#elemen'.$cont.'").position().top+jQuery("#elemen'.$cont.'").scrollTop()}, 1000);
						
						recolocatew'.$cont.'(); }
						
						});	
						
					jQuery(\'#itemslider'.$cont.'-\'+cont).click(function() {
						
						
						var p = jQuery(this).attr("name");
						selectedid=p;
						p=p.substring(10, p.length);
						
						selecteditem'.$cont.'=p;
						
						menudesel'.$cont.'();
						
						jQuery("#ede"+p).show();
					
							
					
					jQuery("#elemen'.$cont.'").animate({scrollTop: jQuery("#che"+p).position().top-jQuery("#elemen'.$cont.'").position().top+jQuery("#elemen'.$cont.'").scrollTop()}, 1000);
						
						
						recolocateauxi'.$cont.'();
						
						recolocatelinesb'.$cont.'(p);
					
						activarbarra();	
						
						
						jQuery("#rotate'.$cont.'").css({"top": jQuery(this).position().top+80, "left": jQuery(this).position().left});
						jQuery("#escalate'.$cont.'").css({"top": jQuery(this).position().top+80, "left": jQuery(this).position().left+80});
						
						
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
						
						
						var widthauxs=jQuery(\'#s\'+p).width();
						
						var heightauxs= jQuery(\'#s\'+p).height();
						
						var widthauxf=jQuery(\'#f\'+p).width();
						
						var heightauxf= jQuery(\'#f\'+p).height();

						
						
						var sleft=eval(jQuery(\'#sx\'+p).val())+eval(eval(widthauxs)/2)-10;
						var stop=eval(jQuery(\'#sy\'+p).val())+eval(eval(heightauxs)/2)-10;
						
						var fleft=eval(jQuery(\'#fx\'+p).val())+eval(eval(widthauxf)/2)-10;
						var ftop=eval(jQuery(\'#fy\'+p).val())+eval(eval(heightauxf)/2)-10;
						
						
						
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
						
						var widthauxs=jQuery(\'#s\'+p).width();
						
						var heightauxs= jQuery(\'#s\'+p).height();
						
						var widthauxf=jQuery(\'#f\'+p).width();
						
						var heightauxf= jQuery(\'#f\'+p).height();


							pos1.top=eval(pos1.top)+eval(eval(heightaux)/2)-10;
							pos1.left=eval(pos1.left)+eval(eval(widthaux)/2)-10;
							
							pos2.top=eval(pos2.top)+eval(eval(heightauxs)/2)-10;
							pos2.left=eval(pos2.left)+eval(eval(widthauxs)/2)-10;
							
							pos3.top=eval(pos3.top)+eval(eval(heightauxf)/2)-10;
							pos3.left=eval(pos3.left)+eval(eval(widthauxf)/2)-10;
						
						
						
											
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
	
	if(jQuery("#overflow'.$cont.'").val()=="0") jQuery("#sl'.$cont.'").css("overflow", "hidden");
					
				recolocateauxi'.$cont.'();
			
			
				jQuery("#rotate'.$cont.'").hide();
					jQuery("#escalate'.$cont.'").hide();
					var cont=0;
					enditem=0;
					
					var totalcont='.count($elem).';
					
					while(cont < totalcont) {
				
				
				if(jQuery(\'#itemslider'.$cont.'-\'+cont).exists()) {
						
						
						var options = {};
						var p = jQuery(\'#itemslider'.$cont.'-\'+cont);
						
		
		
						
						p.css({\'top\'	:  jQuery(\'#sy'.$cont.'-\'+cont).val() + \'px\'});
						p.css({\'left\'	:  jQuery(\'#sx'.$cont.'-\'+cont).val() + \'px\'});
						
						p.css({"opacity"	:  0});
							
						//if(jQuery(\'#sz'.$cont.'-\'+cont).val()>=0) p.css({"scale" : jQuery(\'#sz'.$cont.'-\'+cont).val()});
					
						if(jQuery(\'#tipo'.$cont.'-\'+cont).val()=="html") {

							p.css({"font-size" : jQuery(\'#srx'.$cont.'-\'+cont).val()+"px"});
							p.css({"color" : "#"+jQuery(\'#sh'.$cont.'-\'+cont).val()});
							p.width(jQuery(\'#sw'.$cont.'-\'+cont).val());
							//options[\'color\'] = "#"+jQuery(\'#h'.$cont.'-\'+cont).val();
						}
						else {
						p.width(jQuery(\'#sw'.$cont.'-\'+cont).val());
						p.height(jQuery(\'#sh'.$cont.'-\'+cont).val());	
						options[\'width\'] = jQuery(\'#w'.$cont.'-\'+cont).val();
options[\'height\'] = jQuery(\'#h'.$cont.'-\'+cont).val();			
						}
						var rotation="rotate"+jQuery(\'#sry'.$cont.'-\'+cont).val()+"("+jQuery(\'#sz'.$cont.'-\'+cont).val()+"deg)";
						
						p.css({\'-webkit-transform\': rotation, \'-moz-transform\': rotation, \'-ms-transform\': rotation,\'-o-transform\': rotation,\'transform\': rotation });
						
						';
						
						//////////// function only for admin, create start and end images and divs
						
						

						
						
						//////////////////////////////////////
						
						

echo '
		
									

options[\'top\'] = jQuery(\'#y'.$cont.'-\'+cont).val() + \'px\';
options[\'left\'] = jQuery(\'#x'.$cont.'-\'+cont).val() + \'px\';
options[\'opacity\'] = jQuery(\'#alpha'.$cont.'-\'+cont).val();
	
						
						
						
						p.delay(eval(jQuery(\'#te'.$cont.'-\'+cont).val())).queue( function(next){ 
						
						
	var contr=jQuery(this).attr("name");
	contr=contr.substring(10, contr.length);
    jQuery(this).css("opacity",eval(jQuery(\'#salpha\'+contr).val())); 
	
    next(); 
  }).animate(options, { duration : eval(jQuery(\'#ent'.$cont.'-\'+cont).val()),
            step: function(now, fx){
				
				
				var contr=jQuery(fx.elem).attr("name");
					contr=contr.substring(10, contr.length);
					
				var tang=0;
				
				if(jQuery(\'#sz\'+contr).val()!=jQuery(\'#z\'+contr).val()) tang=1;
				
				if(tang==1) {
				
				var rotationr=(eval(jQuery(\'#sz\'+contr).val())*(1-fx.pos))+(eval(jQuery(\'#z\'+contr).val())*fx.pos);	
				
				
                var rota="rotate"+jQuery(\'#sry\'+contr).val()+"("+rotationr+"deg)";
                
				
				jQuery(fx.elem).css({\'-webkit-transform\': rota, \'-moz-transform\': rota, \'-ms-transform\': rota,\'-o-transform\': rota,\'transform\': rota });
				
				}
				
				 
            }, easing: jQuery(\'#en'.$cont.'-\'+cont).val(), complete: function () {
							
							
							exiti'.$cont.'(jQuery(this).attr("name"));
							
			}
						
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
							var ts =eval(jQuery(\'#ts\'+cont).val());
							var tp = eval(jQuery(\'#tp\'+cont).val());
							
							var options = {};
							
							
							options[\'top\'] = ptop + \'px\';
options[\'left\'] = pleft + \'px\';
options[\'opacity\'] = pop;

if(jQuery(\'#tipo\'+cont).val()=="html") {

							
							
						}
						else {
					
						options[\'width\'] = jQuery(\'#fw\'+cont).val();
						options[\'height\'] = jQuery(\'#fh\'+cont).val();			
						}
							
							 
    jQuery(\'#itemslider\'+cont).delay(ts).animate(options, { duration: tp, easing: jQuery(\'#es\'+cont).val(), complete: function() { 
	
	++enditem;
	
	jQuery(this).css({"opacity":0});
	
	if(enditem>='.$lastitem.') {
		
		recolocatets'.$cont.'();
	}
	},
            step: function(now, fx){
				
				
				var contr=jQuery(fx.elem).attr("name");
					contr=contr.substring(10, contr.length);
					
				var tang=0;
				
				if(jQuery(\'#fz\'+contr).val()!=jQuery(\'#z\'+contr).val()) tang=1;
				
				if(tang==1) {
					
				
				var rotationr=(eval(jQuery(\'#z\'+contr).val())*(1-fx.pos))+(eval(jQuery(\'#fz\'+contr).val())*fx.pos);
					
	
				//var auxi=Math.round(rotationr*fx.pos);
                			
				
                var rota="rotate"+jQuery(\'#sry\'+contr).val()+"("+rotationr+"deg)";
                
				
				jQuery(fx.elem).css({\'-webkit-transform\': rota, \'-moz-transform\': rota, \'-ms-transform\': rota,\'-o-transform\': rota,\'transform\': rota });
				
				}
				
				 
            }
	}
	);
				}
				
				
				
/// start and end element




				// recolocate from window
				
						function recolocatews'.$cont.'() {
							
							var taux="'.$cont.'";
							
							var cont=jQuery(this).attr("name");
					cont=cont.substring(1, cont.length);
					var cont2=cont.substring(taux.length+1, cont.length);
					
					
	
						
						if(jQuery(\'#s'.$cont.'-\'+cont2).exists()) {
						
						var p = jQuery(\'#s'.$cont.'-\'+cont2);
						
						
						
						var positions = p.position();
				
					
					jQuery(\'#sx'.$cont.'-\'+cont2).val(Math.round(positions.left));
					jQuery(\'#sy'.$cont.'-\'+cont2).val(Math.round(positions.top));
					
					
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
				
				
				
				function generate_marc'.$cont.'() {
					
					jQuery("#sl'.$cont.'").css({"background-color": "#"+jQuery("#colora'.$cont.'").val()});
				if(jQuery("#slround'.$cont.'").val()!="") {	
					jQuery("#sl'.$cont.'").css({"-webkit-border-radius": jQuery("#slround'.$cont.'").val()+"px"});
					jQuery("#sl'.$cont.'").css({"-moz-border-radius": jQuery("#slround'.$cont.'").val()+"px"});
					jQuery("#sl'.$cont.'").css({"border-radius": jQuery("#slround'.$cont.'").val()+"px"});
					
					var shadowt="";
					
					if(jQuery("#sshadow'.$cont.'").val()=="3") {
						
						shadowt="0px "+"0px "+jQuery("#shadow'.$cont.'").val()+"px "+Math.round(eval(jQuery("#shadow'.$cont.'").val())/4)+"px #"+jQuery("#colorc'.$cont.'").val();
						
					
						
						
					}
					
					if(jQuery("#sshadow'.$cont.'").val()=="1") shadowt=""+"0px "+jQuery("#shadow'.$cont.'").val()+"px  "+Math.round(eval(jQuery("#shadow'.$cont.'").val())/2)+"px -"+Math.round(eval(jQuery("#shadow'.$cont.'").val())/2)+"px #"+jQuery("#colorc'.$cont.'").val(); // solid bottom
					
					if(jQuery("#sshadow'.$cont.'").val()=="2") shadowt=""+""+jQuery("#shadow'.$cont.'").val()+"px 0px "+jQuery("#shadow'.$cont.'").val()+"px 0px #"+jQuery("#colorc'.$cont.'").val(); // solid right
					
					
					if(jQuery("#sshadow'.$cont.'").val()=="3") shadowt="0px "+"0px "+jQuery("#shadow'.$cont.'").val()+"px "+Math.round(eval(jQuery("#shadow'.$cont.'").val())/4)+"px #"+jQuery("#colorc'.$cont.'").val(); //center
					
					
					if(jQuery("#sshadow'.$cont.'").val()=="4") shadowt="-6px -6px 8px -4px rgba(255,0,0,0.75),6px -6px 8px -4px rgba(0,255,0,0.75),6px 6px 8px -4px rgba(255,255,0,0.75),-6px 6px 8px -4px rgba(0,0,255,0.75)"; // colors center
					
					
					if(jQuery("#sshadow'.$cont.'").val()=="5") {
					
					
						shadowt=""; // colors center
						//jQuery("#sl'.$cont.'").append(jQuery("<style>div:before {z-index: -1; position: absolute; content: \'\'; bottom: 15px;left: 10px;width: 50%;top: 80%; max-width:300px; max-height:18px; background: #777; -webkit-box-shadow: 0 15px 10px #777; -moz-box-shadow: 0 15px 10px #777; box-shadow: 0 15px 10px #777; -webkit-transform: rotate(-4deg); -moz-transform: rotate(-4deg); -o-transform: rotate(-4deg); -ms-transform: rotate(-4deg); transform: rotate(-4deg);}</style>"));
						
						//jQuery("#sl'.$cont.':before").css({"z-index" : " -1"," position" : " absolute"," content" : " \'\'"," bottom" : " 15px","left" : " 10px","width" : " 50%","top" : " 80%"," max-width" : "300px"," max-height" : "18px"," background" : " #777"," -webkit-box-shadow" : " 0 15px 10px #777"," -moz-box-shadow" : " 0 15px 10px #777"," box-shadow" : " 0 15px 10px #777"," -webkit-transform" : " rotate(-4deg)"," -moz-transform" : " rotate(-4deg)"," -o-transform" : " rotate(-4deg)"," -ms-transform" : " rotate(-4deg)"," transform" : " rotate(-4deg)"});
						
						
						jQuery("#sl'.$cont.'").addClass("effect3");
						
					}
					
					
					if(shadowt!="") {
					jQuery("#sl'.$cont.'").css({"-webkit-box-shadow": shadowt});
					jQuery("#sl'.$cont.'").css({"-moz-box-shadow": shadowt});
					jQuery("#sl'.$cont.'").css({"box-shadow": shadowt});
					}
					
					if(jQuery("#sborder'.$cont.'").val()=="1") {
					jQuery("#sl'.$cont.'").css({"border-style": "solid"});
					jQuery("#sl'.$cont.'").css({"border-width": jQuery("#slborder'.$cont.'").val()+"px"});
					jQuery("#sl'.$cont.'").css({"border-color": "#"+jQuery("#colorb'.$cont.'").val()});
					}
					else {
						jQuery("#sl'.$cont.'").css({"border": "none"});
					}

					
					
					
				}
					
				}
				
				
				
				function recolocatets'.$cont.'() {
					
					
					//generate_marc'.$cont.'();
					
					
					// change input
					
					
					
					jQuery("#sl'.$cont.'").css({"background-color": "#"+jQuery("#colora'.$cont.'").val()});
					
					
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
					
					
					jQuery("#sl'.$cont.'").css("overflow", "visible");
					var cont=0;
					
					var ulelem=-1;
					while(cont < '.count($elem).') {
					
					if(jQuery(\'#itemslider'.$cont.'-\'+cont).exists()) {	
						var p = jQuery(\'#itemslider'.$cont.'-\'+cont);
						var s = jQuery(\'#s'.$cont.'-\'+cont);
						var f = jQuery(\'#f'.$cont.'-\'+cont);
						
					
						p.css({\'top\'	:  jQuery(\'#y'.$cont.'-\'+cont).val() + \'px\', \'left\'	:  jQuery(\'#x'.$cont.'-\'+cont).val() + \'px\', \'opacity\'	:  \'1\'});
						
						if(jQuery(\'#sw'.$cont.'-\'+cont).val()=="" || jQuery(\'#sw'.$cont.'-\'+cont).val()<=0) jQuery(\'#sw'.$cont.'-\'+cont).val(s.width());
						if(jQuery(\'#sh'.$cont.'-\'+cont).val()=="" || jQuery(\'#sh'.$cont.'-\'+cont).val()<=0) jQuery(\'#sh'.$cont.'-\'+cont).val(s.height());
						
						p.css({"opacity" : 1});
						s.css({"opacity" : 0.5});
						f.css({"opacity" : 0.5});
						
						if(jQuery(\'#tipo'.$cont.'-\'+cont).val()=="html") {
							s.html(jQuery(\'#image'.$cont.'-\'+cont).val());
							p.html(jQuery(\'#image'.$cont.'-\'+cont).val());
							f.html(jQuery(\'#image'.$cont.'-\'+cont).val());
							
							s.width(jQuery(\'#sw'.$cont.'-\'+cont).val());	
							
							s.css({"font-size" : jQuery(\'#srx'.$cont.'-\'+cont).val() +"px"});
							s.css({"color" : "#"+jQuery(\'#sh'.$cont.'-\'+cont).val()});
						}
						else {
						s.width(jQuery(\'#sw'.$cont.'-\'+cont).val());
						s.height(jQuery(\'#sh'.$cont.'-\'+cont).val());
						}
						
						if(jQuery(\'#w'.$cont.'-\'+cont).val()=="" || jQuery(\'#w'.$cont.'-\'+cont).val()<=0) jQuery(\'#w'.$cont.'-\'+cont).val(p.width());
						if(jQuery(\'#h'.$cont.'-\'+cont).val()=="" || jQuery(\'#h'.$cont.'-\'+cont).val()<=0) jQuery(\'#h'.$cont.'-\'+cont).val(p.height());
						
						if(jQuery(\'#tipo'.$cont.'-\'+cont).val()=="html") {
							p.width(jQuery(\'#sw'.$cont.'-\'+cont).val());
							p.css({"font-size" : jQuery(\'#srx'.$cont.'-\'+cont).val() +"px"});
							p.css({"color" : "#"+jQuery(\'#sh'.$cont.'-\'+cont).val()});
						}
						else {
						p.width(jQuery(\'#w'.$cont.'-\'+cont).val());
						p.height(jQuery(\'#h'.$cont.'-\'+cont).val());		
						}
						
						if(jQuery(\'#fw'.$cont.'-\'+cont).val()=="" || jQuery(\'#fw'.$cont.'-\'+cont).val()<=0) jQuery(\'#fw'.$cont.'-\'+cont).val(f.width());
						if(jQuery(\'#fh'.$cont.'-\'+cont).val()=="" || jQuery(\'#fh'.$cont.'-\'+cont).val()<=0) jQuery(\'#fh'.$cont.'-\'+cont).val(f.height());
						
						if(jQuery(\'#tipo'.$cont.'-\'+cont).val()=="html") {
							f.width(jQuery(\'#sw'.$cont.'-\'+cont).val());
							f.css({"font-size" : jQuery(\'#srx'.$cont.'-\'+cont).val() +"px"});
							f.css({"color" : "#"+jQuery(\'#sh'.$cont.'-\'+cont).val()});
						}
						else {
							f.width(jQuery(\'#fw'.$cont.'-\'+cont).val());
							f.height(jQuery(\'#fh'.$cont.'-\'+cont).val());
						}
						var rota="rotate"+jQuery(\'#sry'.$cont.'-\'+cont).val()+"("+jQuery(\'#sz'.$cont.'-\'+cont).val()+"deg)";
						
						
						
						s.css({\'-webkit-transform\': rota, \'-moz-transform\': rota, \'-ms-transform\': rota,\'-o-transform\': rota,\'transform\': rota });
					
					var rota="rotate"+jQuery(\'#sry'.$cont.'-\'+cont).val()+"("+jQuery(\'#z'.$cont.'-\'+cont).val()+"deg)";
						
						
						
						p.css({\'-webkit-transform\': rota, \'-moz-transform\': rota, \'-ms-transform\': rota,\'-o-transform\': rota,\'transform\': rota });
					
					var rota="rotate"+jQuery(\'#sry'.$cont.'-\'+cont).val()+"("+jQuery(\'#fz'.$cont.'-\'+cont).val()+"deg)";
						
						
						
						f.css({\'-webkit-transform\': rota, \'-moz-transform\': rota, \'-ms-transform\': rota,\'-o-transform\': rota,\'transform\': rota });
					
					
						
						
						ulelem=cont;
					
					}
						++cont;
					}
					
					jQuery("#rotate'.$cont.'").width(60);
					jQuery("#rotate'.$cont.'").height(60);
					
					jQuery("#escalate'.$cont.'").width(30);
					jQuery("#escalate'.$cont.'").height(30);
					
					jQuery("#rotate'.$cont.'").show();
					jQuery("#escalate'.$cont.'").show();
					
					if(selecteditem'.$cont.'=="" && ulelem>-1) {
						
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
						selectedid=p;
						p=p.substring(1, p.length);
						
						
						menudesel".$cont."();
						
						jQuery('#sde'+p).show();
					
					
					
					jQuery('#elemen".$cont."').animate({scrollTop: jQuery('#che'+p).position().top-jQuery('#elemen".$cont."').position().top+jQuery('#elemen".$cont."').scrollTop()}, 1000);
						
						
						jQuery(\"#rotate".$cont."\").css({\"top\": jQuery(this).position().top+80, \"left\": jQuery(this).position().left});
						jQuery(\"#escalate".$cont."\").css({\"top\": jQuery(this).position().top+80, \"left\": jQuery(this).position().left+80});
						});	
						
						
						
						jQuery('#s".$cont."-'+cont).draggable({
							
							
							drag: function(event, ui) {
    
	var p = jQuery(this).attr('name');
	selectedid=p;
						p=p.substring(1, p.length);
						
						
						
	recolocatelines".$cont."(p);
	
	jQuery(\"#rotate".$cont."\").css({\"top\": jQuery(this).position().top+80, \"left\": jQuery(this).position().left});
	jQuery(\"#escalate".$cont."\").css({\"top\": jQuery(this).position().top+80, \"left\": jQuery(this).position().left+80});
	
	
	
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
						selectedid=p;
						p=p.substring(1, p.length);
						
						
						menudesel".$cont."();
						
						jQuery('#fde'+p).show();
					
					
					
					jQuery('#elemen".$cont."').animate({scrollTop: jQuery('#che'+p).position().top-jQuery('#elemen".$cont."').position().top+jQuery('#elemen".$cont."').scrollTop()}, 1000);
						
						
						jQuery(\"#rotate".$cont."\").css({\"top\": jQuery(this).position().top+80, \"left\": jQuery(this).position().left});
						jQuery(\"#escalate".$cont."\").css({\"top\": jQuery(this).position().top+80, \"left\": jQuery(this).position().left+80});
						
						});	
						
						jQuery('#f".$cont."-'+cont).draggable({
	
	
	drag: function(event, ui) {
    
	var pas = jQuery(this).attr('name');
						selectedid=p;
						pas=pas.substring(1, pas.length);
						
	recolocatelines".$cont."(pas);
	jQuery(\"#rotate".$cont."\").css({\"top\": jQuery(this).position().top+80, \"left\": jQuery(this).position().left});
	jQuery(\"#escalate".$cont."\").css({\"top\": jQuery(this).position().top+80, \"left\": jQuery(this).position().left+80});
	
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



var inpunts		= jQuery("#'.$id.'edit'.$cont.'").find("input[type=\'text\'], textarea");
					
					inpunts.each(function(){
					
					
					jQuery(this).change(function() {
					
						recolocatets'.$cont.'();

});
					});
				
					
				
		</script>
					   
					   ';
					   
					 echo '</td></tr>
					 </table>
					 <input type="hidden" value="'.$cont.'" name="eitem'.$cont.'" id="eitem'.$cont.'" />
					 <input type="hidden" value="'.$cont.'" name="scene" id="scene" />
					
					
					
					 
					  
					 </div>
				
					 </li>
					 
										 <div id="icon-options-general" class="icon32"></div><h2>Scene Settings</h2><br />
					Leave fields blank to load the default values.<br/><hr/>
					 <table style="vertical-align: middle;display: table;">
					  <tr>
					 <td colspan="2">
					 <input type="text" name="timage'.$cont.'" id="timage'.$cont.'" value="'.$item[5].'" class="upload'.$id.'" size="10"/>
						  <input class="upload-button'.$id.'" name="wsl-image-add" type="button" value=" Background image " /> 
						  <img src="'.$item[5].'"  width="80px"/>
						   </td>
					 <td colspan="2">
						  <input type="text" name="video'.$cont.'" id="video'.$cont.'" value="'.$item[4].'" class="upload'.$id.'" size="10"/>
						  <input class="upload-button'.$id.'" name="wsl-image-add" type="button" value="Thumbnail image" /> 
						  <img src="'.$item[4].'"  width="80px"/>
						   </td>
						   </tr>
					 <tr>
					 <td>
					 <strong>Title</strong> <input name="title'.$cont.'" id="title'.$cont.'" type="text" value="'.$item[0].'" size="20"/>
					  </td>
					 <td>
					 <strong>Duration in miliseconds</strong> <input type="text" name="image'.$cont.'" id="image'.$cont.'" value="'.($item[2]).'" size="4"/>
					  </td>
					 <td>
					 <strong>Max width</strong> <input type="text" name="seo'.$cont.'" id="seo'.$cont.'" value="'.($item[6]).'" size="4"/>
					  </td>
					 <td>
					 <strong>Max height</strong> <input type="text" name="seol'.$cont.'" id="seol'.$cont.'" value="'.($item[7]).'" size="4"/>  
					  </td>
					  
					  </tr>
					  <tr>
					
				   
				   
					 <td>
					 
				  <strong>Effect</strong>
				  <select name="beffect'.$cont.'" id="beffect'.$cont.'">
			        
					
						<option value="0" ';
					echo 'selected="selected"';
					echo '>None</option>
					
					<option value="1" ';
					if($item[9]=="1") echo 'selected="selected"';
					echo '>Opacity</option>
					
					<option value="2" ';
					if($item[9]=="2") echo 'selected="selected"';
					echo '>Rotate Y</option>
					
					<option value="3" ';
					if($item[9]=="3") echo 'selected="selected"';
					echo '>Rotate X</option>
					
					
					
		          </select>
					  </td>
					 <td>
					 
					 <strong>Effect time</strong> <input name="xeffect'.$cont.'" id="xeffect'.$cont.'" type="text" value="'.$item[10].'" size="4"/>
				  </td>
						   <td>';
						   
						  
						   
						echo ' <strong>Animation</strong><select id="colorc'.$cont.'" name="colorc'.$cont.'">
						  <option value="">none</option>
						  ';
						  
						  if($item[13]=="linear") echo '<option value="linear" selected="selected">linear</option>';
						  else  echo '<option value="linear">linear</option>';
						  
						  if($item[13]=="swing") echo '<option value="swing" selected="selected">swing</option>';
						  else  echo '<option value="swing">swing</option>';
						  
						  if($item[13]=="easeInQuad") echo '<option value="easeInQuad" selected="selected">easeInQuad</option>';
						  else  echo '<option value="easeInQuad">easeInQuad</option>';
						  
						  if($item[13]=="easeOutQuad") echo '<option value="easeOutQuad" selected="selected">easeOutQuad</option>';
						  else  echo '<option value="easeOutQuad">easeOutQuad</option>';
						  
						  if($item[13]=="easeInOutQuad") echo '<option value="easeInOutQuad" selected="selected">easeInOutQuad</option>';
						  else  echo '<option value="easeInOutQuad">easeInOutQuad</option>';
						  
						  if($item[13]=="easeInCubic") echo '<option value="easeInCubic" selected="selected">easeInCubic</option>';
						  else  echo '<option value="easeInCubic">easeInCubic</option>';
						  
						  if($item[13]=="easeOutCubic") echo '<option value="easeOutCubic" selected="selected">easeOutCubic</option>';
						  else  echo '<option value="easeOutCubic">easeOutCubic</option>';
						  
						  if($item[13]=="easeInOutCubic") echo '<option value="easeInOutCubic" selected="selected">easeInOutCubic</option>';
						  else  echo '<option value="easeInOutCubic">easeInOutCubic</option>';
						  
						  if($item[13]=="easeInQuart") echo '<option value="easeInQuart" selected="selected">easeInQuart</option>';
						  else  echo '<option value="easeInQuart">easeInQuart</option>';
						  
						  if($item[13]=="easeOutQuart") echo '<option value="easeOutQuart" selected="selected">easeOutQuart</option>';
						  else  echo '<option value="easeOutQuart">easeOutQuart</option>';
						  
						  if($item[13]=="easeInOutQuart") echo '<option value="easeInOutQuart" selected="selected">easeInOutQuart</option>';
						  else  echo '<option value="easeInOutQuart">easeInOutQuart</option>';
						  
						   if($item[13]=="easeInQuint") echo '<option value="easeInQuint" selected="selected">easeInQuint</option>';
						  else  echo '<option value="easeInQuint">easeInQuint</option>';
						  
						   if($item[13]=="easeOutQuint") echo '<option value="easeOutQuint" selected="selected">easeOutQuint</option>';
						  else  echo '<option value="easeOutQuint">easeOutQuint</option>';
						  
						   if($item[13]=="easeInOutQuint") echo '<option value="easeInOutQuint" selected="selected">easeInOutQuint</option>';
						  else  echo '<option value="easeInOutQuint">easeInOutQuint</option>';
						  
						   if($item[13]=="easeInExpo") echo '<option value="easeInExpo" selected="selected">easeInExpo</option>';
						  else  echo '<option value="easeInExpo">easeInExpo</option>';
						  
						   if($item[13]=="easeOutExpo") echo '<option value="easeOutExpo" selected="selected">easeOutExpo</option>';
						  else  echo '<option value="easeOutExpo">easeOutExpo</option>';
						  
						   if($item[13]=="easeInOutExpo") echo '<option value="easeInOutExpo" selected="selected">easeInOutExpo</option>';
						  else  echo '<option value="easeInOutExpo">easeInOutExpo</option>';
						  
						   if($item[13]=="easeInSine") echo '<option value="easeInSine" selected="selected">easeInSine</option>';
						  else  echo '<option value="easeInSine">easeInSine</option>';
						  
						   if($item[13]=="easeOutSine") echo '<option value="easeOutSine" selected="selected">easeOutSine</option>';
						  else  echo '<option value="easeOutSine">easeOutSine</option>';
						  
						   if($item[13]=="easeInOutSine") echo '<option value="easeInOutSine" selected="selected">easeInOutSine</option>';
						  else  echo '<option value="easeInOutSine">easeInOutSine</option>';
						  
						   if($item[13]=="easeInCirc") echo '<option value="easeInCirc" selected="selected">easeInCirc</option>';
						  else  echo '<option value="easeInCirc">easeInCirc</option>';
						  
						   if($item[13]=="easeOutCirc") echo '<option value="easeOutCirc" selected="selected">easeOutCirc</option>';
						  else  echo '<option value="easeOutCirc">easeOutCirc</option>';
						  
						   if($item[13]=="easeInOutCirc") echo '<option value="easeInOutCirc" selected="selected">easeInOutCirc</option>';
						  else  echo '<option value="easeInOutCirc">easeInOutCirc</option>';
						  
						   if($item[13]=="easeInElastic") echo '<option value="easeInElastic" selected="selected">easeInElastic</option>';
						  else  echo '<option value="easeInElastic">easeInElastic</option>';
						  
						   if($item[13]=="easeOutElastic") echo '<option value="easeOutElastic" selected="selected">easeOutElastic</option>';
						  else  echo '<option value="easeOutElastic">easeOutElastic</option>';
						  
						   if($item[13]=="easeInOutElastic") echo '<option value="easeInOutElastic" selected="selected">easeInOutElastic</option>';
						  else  echo '<option value="easeInOutElastic">easeInOutElastic</option>';
						  
						   if($item[13]=="easeInBack") echo '<option value="easeInBack" selected="selected">easeInBack</option>';
						  else  echo '<option value="easeInBack">easeInBack</option>';
						  
						   if($item[13]=="easeOutBack") echo '<option value="easeOutBack" selected="selected">easeOutBack</option>';
						  else  echo '<option value="easeOutBack">easeOutBack</option>';
						  
						  if($item[13]=="easeInOutBack") echo '<option value="easeInOutBack" selected="selected">easeInOutBack</option>';
						  else  echo '<option value="easeInOutBack">easeInOutBack</option>';
						  
						  if($item[13]=="easeInBounce") echo '<option value="easeInBounce" selected="selected">easeInBounce</option>';
						  else  echo '<option value="easeInBounce">easeInBounce</option>';
						  
						  if($item[13]=="easeOutBounce") echo '<option value="easeOutBounce" selected="selected">easeOutBounce</option>';
						  else  echo '<option value="easeOutBounce">easeOutBounce</option>';
						  
						  if($item[13]=="easeInOutBounce") echo '<option value="easeInOutBounce" selected="selected">easeInOutBounce</option>';
						  else  echo '<option value="easeInOutBounce">easeInOutBounce</option>';
						 
						  
						  
						  
						  
						  
						  
						  echo '</select>';   
						   
						   
						   
					 				  
				  echo ' </td>  
					  
				   <td>
				   <strong>Link</strong> <input name="link'.$cont.'" id="link'.$cont.'" type="text" value="'.$item[3].'" size="25"/>
				   </td>
				
					  </tr>
				 
						   
						   </table>
						   
						   <br/>
						   
			<div id="icon-tools" class="icon32"></div><h2>Scene Design</h2><br />
						   
						   
						   <table>
						    <tr>
						   	<td>
												 <strong>Items out slider</strong>
					<select name="overflow'.$cont.'" id="overflow'.$cont.'">
			        
					
					<option value="0" ';
					echo 'selected="selected"';
					echo '>Hidden</option>
					
					<option value="1" ';
					if($item[8]=="1") echo 'selected="selected"';
					echo '>Show</option>
										

		          </select>
							</td>
						   <td>
						   <strong>Transparent background</strong> 
						   
						  
					<select name="btrans'.$cont.'" id="btrans'.$cont.'">
			        
					
					<option value="0" ';
					echo 'selected="selected"';
					echo '>Non</option>
					
					<option value="1" ';
					if($item[19]=="1") echo 'selected="selected"';
					echo '>Yes</option>
										

		          </select>
						   </td>
						   
						   	<td>
							<strong>Show border</strong> 
							<select name="sborder'.$cont.'" id="sborder'.$cont.'">
			        
					
					<option value="0" ';
					echo 'selected="selected"';
					echo '>Non</option>
					
					<option value="1" ';
					if($item[20]=="1") echo 'selected="selected"';
					echo '>Yes</option>
										

		          </select>
							   </td>
						   
						   	<td>
							<strong>Shadow</strong> 
							<select name="sshadow'.$cont.'" id="sshadow'.$cont.'">
			        
					
					<option value="" ';
					echo 'selected="selected"';
					echo '>Default</option>';
					
					
					echo '<option value="5" ';
					if($item[21]=="5") echo 'selected="selected"';
					echo '>Normal</option>';
					
					echo '<option value="6" ';
					if($item[21]=="6") echo 'selected="selected"';
					echo '>Bottom</option>';
					
					echo '<option value="7" ';
					if($item[21]=="7") echo 'selected="selected"';
					echo '>Bottom 2</option>';
					
					echo '<option value="8" ';
					if($item[21]=="8") echo 'selected="selected"';
					echo '>Center</option>';

										

		          echo '</select>
				   </td>
						   
						   
						   
						   </tr>
						   <tr>
						   
						   <td>
						   
						   <strong>Background color</strong> <input class="color" type="text" id="colora'.$cont.'"  name="colora'.$cont.'"  value="'.$item[11].'" size="6"/>
						   
						   </td>
						   
						   <td>
						    <strong>Border color</strong> <input class="color" type="text" id="colorb'.$cont.'"  name="colorb'.$cont.'"  value="'.$item[12].'" size="6"/>
						   </td>
						   
						
						   <td>
						   <strong>Border size</strong> <input name="slborder'.$cont.'" id="slborder'.$cont.'" type="text" value="'.$item[15].'" size="3"/>
						   </td>
						   
						   	<td>
							<strong>Border round</strong> <input name="slround'.$cont.'" id="slround'.$cont.'" type="text" value="'.$item[16].'" size="3"/>
						   </td>
						   </tr>
						   
						   
						  
						   
						   </table>
						  
					 ';
					 
					
				

					$width=$width_old;
					$height=$height_old;
					

?>