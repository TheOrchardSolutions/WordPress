<?php
$sliderwidth=600;
if(isset($_POST['id']) && $id==$_POST['id']) {
	
	//echo '<h3>morpheuspro slider '.$_POST['id'].' updated.</h3>';
}
?>

<style>


.effect3
{
  position: relative;
}
.effect3:before
{
  z-index: -1;
  position: absolute;
  content: "";
  bottom: 15px;
  left: 10px;
  width: 50%;
  top: 80%;
  max-width:300px;
  background: #777;
  -webkit-box-shadow: 0 15px 10px #777;
  -moz-box-shadow: 0 15px 10px #777;
  box-shadow: 0 15px 10px #777;
  -webkit-transform: rotate(-3deg);
  -moz-transform: rotate(-3deg);
  -o-transform: rotate(-3deg);
  -ms-transform: rotate(-3deg);
  transform: rotate(-3deg);
}

.blanc {
	
	background-color:#FFFFFF;
	color:#000000;
}
.lines {
	
	background-image:url('<?php echo plugins_url('', __FILE__); ?>/previous.png');
	position:absolute; top:300px; display:none; left:100px;  width:300px; height: 20px;
	
}

.lines2 {
	
	background-image:url('<?php echo plugins_url('', __FILE__); ?>/next.png');
	position:absolute; top:300px; display:none; left:100px;  width:300px; height: 20px;
	
}
.drag {
  
   cursor: move;
  
   }
   .select1 {
	   
		display:none;
   }
   
   .select2 {
	   
		display:none;
   }
.drop {
 
  

   } 
.divslider {
	width: <?php echo $sliderwidth; ?>px;
	position:relative;
	background-color:<?php echo $color1; ?>;
	background-size: cover;
	background-repeat:no-repeat;
background-position: center center;

}

.divslider img {
	position:absolute;
}
.divslider div {
	position:absolute;
	line-height:normal;
	text-shadow: 0 0 1px rgba(0,0,0,0.3);
}

.addwindow {
	
	position:relative:
	border: 2px;
	display: none;
	
}
.morpheusitemfull<?php echo $id; ?> {
	
	
	
	
	
	
}


.morpheusdelete<?php echo $id; ?>{
	
	
	display: none;
	
}
.edititem {
	
	position:relative:
	
	
}
</style>
    <script type="text/javascript">

        jQuery(document).ready( function () { 
	
	
		jQuery.fn.exists = function(){return this.length>0;}
		
		var uploadID<?php echo $id; ?> = ''; /*setup the var in a global scope*/

jQuery('.upload-button<?php echo $id; ?>').click(function() {
	
	

//uploadID = jQuery(this).prev('input');
uploadID<?php echo $id; ?> = jQuery(this).prev('input');


window.send_to_editor = function(html) {

var textt=html;


if(textt.search("img")!=-1) imgurl = jQuery('img',html).attr('src');

else {

	imgurl = jQuery(html).attr('href');

}

uploadID<?php echo $id; ?>.val(imgurl)
tb_remove();
}




if ( typeof wp !== 'undefined' && wp.media && wp.media.editor ) wp.media.editor.open();

else tb_show('', 'media-upload.php?type=image&amp;amp;amp;amp;TB_iframe=true&uploadID<?php echo $id; ?>=' + uploadID<?php echo $id; ?>);

return false;
});


jQuery('#newelem<?php echo $id; ?>').click(function() {
	
	
 formfield = jQuery('#unewelem<?php echo $id; ?>').attr('name');
 
 if ( typeof wp !== 'undefined' && wp.media && wp.media.editor ) wp.media.editor.open();

else tb_show('', 'media-upload.php?type=image&post_id=1&TB_iframe=true&flash=0&backdrop=true');

 return false;
});
 
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#unewelem<?php echo $id; ?>').val(imgurl);
 tb_remove();
 

 jQuery('#save<?php echo $id; ?>').trigger("click");
 

 
 
}
		
function new_item(cont, tipo) {
	
	if(tipo==1) {
	}
	else {
	}
}
		
          
	jQuery('.editmorpheusa<?php echo $id; ?>').click(function() {
		
		
	if(jQuery('#morpheussliderconfiga<?php echo $id; ?>').css("display")=="none") {
		
		jQuery('#ideditmorpheusa<?php echo $id; ?>').removeClass("button-secondary").addClass("button-primary");
		
				
		jQuery('#ideditmorpheusb<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusc<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusd<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		
		jQuery('.morpheusitemfull<?php echo $id; ?>').show();
		jQuery('#morpheussliderconfiga<?php echo $id; ?>').show();
		jQuery('#morpheussliderconfigb<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigc<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigd<?php echo $id; ?>').css("display", "none");
	}
	else {
		jQuery('#ideditmorpheusa<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusb<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusc<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusd<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('.morpheusitemfull<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfiga<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigb<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigc<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigd<?php echo $id; ?>').css("display", "none");
	}
	
	
	
	
	return false;
	
	
})

jQuery('.editmorpheusb<?php echo $id; ?>').click(function() {
		
		
	if(jQuery('#morpheussliderconfigb<?php echo $id; ?>').css("display")=="none") {
		jQuery('#ideditmorpheusb<?php echo $id; ?>').removeClass("button-secondary").addClass("button-primary");
		
				jQuery('#ideditmorpheusa<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		
		jQuery('#ideditmorpheusc<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusd<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('.morpheusitemfull<?php echo $id; ?>').show();
		jQuery('#morpheussliderconfigb<?php echo $id; ?>').show();
		jQuery('#morpheussliderconfiga<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigc<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigd<?php echo $id; ?>').css("display", "none");
	}
	else {
		jQuery('#ideditmorpheusa<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusb<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusc<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusd<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('.morpheusitemfull<?php echo $id; ?>').css("display", "none");
		
		jQuery('#morpheussliderconfiga<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigb<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigc<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigd<?php echo $id; ?>').css("display", "none");
	}
	
	
	
	
	return false;
	
	
})

jQuery('.editmorpheusc<?php echo $id; ?>').click(function() {
		
		
	if(jQuery('#morpheussliderconfigc<?php echo $id; ?>').css("display")=="none") {
		jQuery('#ideditmorpheusc<?php echo $id; ?>').removeClass("button-secondary").addClass("button-primary");
				jQuery('#ideditmorpheusa<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusb<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusd<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		
		jQuery('.morpheusitemfull<?php echo $id; ?>').show();
		jQuery('#morpheussliderconfigc<?php echo $id; ?>').show();
		jQuery('#morpheussliderconfigb<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfiga<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigd<?php echo $id; ?>').css("display", "none");
	}
	else {
		jQuery('#ideditmorpheusa<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusb<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusd<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusc<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('.morpheusitemfull<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfiga<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigb<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigc<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigd<?php echo $id; ?>').css("display", "none");
	}
	
	
	
	
	return false;
	
	
})
	
	jQuery('.editmorpheusd<?php echo $id; ?>').click(function() {
		
		
	if(jQuery('#morpheussliderconfigd<?php echo $id; ?>').css("display")=="none") {
		jQuery('#ideditmorpheusd<?php echo $id; ?>').removeClass("button-secondary").addClass("button-primary");
				jQuery('#ideditmorpheusa<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusb<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusc<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		
		jQuery('.morpheusitemfull<?php echo $id; ?>').show();
		jQuery('#morpheussliderconfigd<?php echo $id; ?>').show();
		jQuery('#morpheussliderconfigb<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfiga<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigc<?php echo $id; ?>').css("display", "none");
	}
	else {
		jQuery('#ideditmorpheusa<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusb<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusd<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('#ideditmorpheusc<?php echo $id; ?>').removeClass("button-primary").addClass("button-secondary");
		jQuery('.morpheusitemfull<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfiga<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigb<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigc<?php echo $id; ?>').css("display", "none");
		jQuery('#morpheussliderconfigd<?php echo $id; ?>').css("display", "none");
	}
	
	
	
	
	return false;
	
	
})
	

	jQuery('.deletebuton<?php echo $id; ?>').click(function() {
		
		
		
			if(jQuery('.morpheusdelete<?php echo $id; ?>').css("display")=="none") jQuery('.morpheusdelete<?php echo $id; ?>').show();
	else jQuery('.morpheusdelete<?php echo $id; ?>').css("display", "none")
		

	
	
	
	return false;
	
	
})	
		 
	jQuery('.additem').click(function() {
		
		
		
	//jQuery('.widget-wp_morpheus-__i__-savewidget').trigger('click');
	jQuery('input[name=operation]').val('1');
	jQuery('.addwindow').show();
	
	
	
	return false;
	
	
})

	jQuery('.deleteitem').click(function() {
		
		
		
	//jQuery('.widget-wp_morpheus-__i__-savewidget').trigger('click');
	jQuery('input[name=operation]').val('2');
	jQuery('.addwindow').show();
	
	
	
	return false;
	
	
})

	jQuery('.cancel').click(function() {
		
		
		
	//jQuery('.widget-wp_morpheus-__i__-savewidget').trigger('click');
	jQuery('input[name=operation]').val('0');
	jQuery('.addwindow').hide();
	
	
	
	return false;
	
	
})

jQuery('.<?php echo $id; ?>editbutton').click(function() {
		
		
		
	//jQuery('.widget-wp_morpheus-__i__-savewidget').trigger('click');
	

	if(jQuery('#<?php echo $id; ?>edit'+jQuery(this).attr("rel")).css("display")=="none") { 
		
		jQuery('#<?php echo $id; ?>edit'+jQuery(this).attr("rel")).show()
		jQuery(this).text("-")
	}
	else { 
		jQuery(this).text(' Edit ')
		jQuery('#<?php echo $id; ?>edit'+jQuery(this).attr("rel")).css("display", "none")
	}
	return false;
	
	
})

		  
        });
		
		
function morpheus_selector<?php echo $id; ?>(xx)
{
if(xx==1)document.getElementById("morpheus_selectortxt<?php echo $id; ?>").select();
else document.getElementById("morpheus_selectortxtc<?php echo $id; ?>").select();
}



    </script>
   
   
   <?php
   
   if($editscene==0) {
   
   ?>
    
    <tr bgcolor="#ddd">
    <th id="columnname" class="manage-column column-columnname" scope="col" ><h2><?php echo $id; ?></h2> 
    </th>
    <th id="columnname" class="manage-column column-columnname" scope="col"> 
    <table style="text-align:center;">
    <tr>
    <td>
    <div id="icon-upload" class="icon32"></div>
    </td>
    <td>
    <div id="icon-options-general" class="icon32"></div>
    </td>
    <td>
    
    </td>
    <td>
   
    </td>
    </tr>
    <tr>
    <td>
     <button id="ideditmorpheusa<?php echo $id; ?>" class="button-primary editmorpheusa<?php echo $id; ?>">SCENES</button>
    </td>
    <td><button id="ideditmorpheusb<?php echo $id; ?>" class="button-secondary editmorpheusb<?php echo $id; ?>">EDIT SLIDER(Sizes, design, options, ...)</button>
    </td>
    <td>
    </td>
    <td>
    </td>
    </tr>
    </table>             
    </th>
     <th id="columnname" class="manage-column column-columnname" scope="col">  
    <input type="text"  id="morpheus_selectortxtc<?php echo $id; ?>" name="morpheus_selectortxtc<?php echo $id; ?>" onclick="morpheus_selector<?php echo $id; ?>(0);" value="[morpheus <?php echo $id; ?> /]" readonly /> 
    </th>
     <th id="columnname" class="manage-column column-columnname" scope="col">  
    <legend>Widget "morpheus video" with <?php echo $id; ?> slider.</legend> 
    </th>
     <th id="columnname" class="manage-column column-columnname" scope="col">  
    <textarea readonly rows="5" style="width:100%" id="morpheus_selectortxt<?php echo $id; ?>" name="morpheus_selectortxt<?php echo $id; ?>" onclick="morpheus_selector<?php echo $id; ?>(1);">
    <?php 
	
	
	echo "<?php echo apply_filters( 'the_content','[morpheus ".$id." /]'); ?>";
	?>
    </textarea>
     
    </th>
    
    <th id="columnname" class="manage-column column-columnname" scope="col">  
    
    <form method="post" action="">
	  <input name="borrar" type="hidden" id="borrar" value="<?php echo $id; ?>">
     
      
      <button class="button-secondary deletebuton<?php echo $id; ?>">Delete</button>
      <div class="morpheusdelete<?php echo $id; ?>">
      <button class="deletebuton<?php echo $id; ?>">CANCEL</button>
     <input type='submit' name='' value='OK' />
     </div>
     
    </form>
    <form method="post" action="">
    <input name="cloneid" type="hidden" id="cloneid" value="<?php echo $id; ?>">
      <input name="crear" type="hidden" id="crear" value="1">
    <button name="cloneslider" id="cloneslider" class="button-secondary clonebuton<?php echo $id; ?>">Clone slider</button>
    </form>
    </th>
   
    </tr>
   
   
   
   <?php
   
   }
   
   ?>
   
<tr>
<td colspan="6" bgcolor="#FFFFFF">

<?php
$tverono="display: none;";
if(isset($_POST["seccion".$id]) && $_POST["seccion".$id]=="items") {
	$tverono="display: block;";
	
}

if($editscene==1) $tverono="display: block;";

?>


<div class="morpheusitemfull<?php echo $id; ?>"> 

	<form class="form-slider<?php echo $id; ?>" id="form-slider<?php echo $id; ?>" name="form-slider<?php echo $id; ?>" method="post" action="">
		<fieldset>

            
              
              <div id="morpheussliderconfiga<?php echo $id; ?>" style="">
               <?php if($editscene==0) { ?>
              <div id="icon-upload" class="icon32"><br /></div><h2>SCENES</h2><br/>
             
              <input name="operation" type="hidden" id="operation" value="0" />
               <input name="itemselect<?php echo $id; ?>" type="hidden" id="itemselect<?php echo $id; ?>" value="" />
             
            <button class="button-primary additem">New scene</button> <button class="button-secondary deleteitem">Delete selected scenes</button> 
            <div class="addwindow">
             <hr />
           <input type='submit' name='' value='OK' /><button class="button-secondary cancel">Cancel</button>
            
            </div>
            <?php }
			
			else { ?>
            
            
           
            
            <?php } ?>
            <ul>
            <?php
			
			
			
			// items
			$cont=0;
			if($values!="") {
				if($editscene==0) echo '<table><tr><th></th><th>Order</th><th>Title</th><th>Duration</th><th colspan="2">Background image</th><th colspan="2">Thumbnail image</th><th>Effect</th><th>Effect time</th><th>Easing</th><th>Border color</th><th></th></tr>';
				$items=explode("kh6gfd57hgg", $values);
				array_pop($items);
				$cont=1;
				foreach ($items as &$value) {
					
					
					
					$item=explode("t6r4nd", $value);
					
					
					
					
					if($editscene==1 && $scene==$cont) {
						
						echo '<input name="item'.$cont.'" type="checkbox" value="hide" style="display:none;"/> <input name="order'.$cont.'" type="hidden" value="'.$cont.'" size="2"/>';
						
						include("scene.php");
					}
					
					else {
						if($editscene==0)  {echo '<tr><td><input name="item'.$cont.'" type="checkbox" value="hide" /> </td><td> <input name="order'.$cont.'" type="text" value="'.$cont.'" size="3"/></td><td>
					 <input name="title'.$cont.'" id="title'.$cont.'" type="text" value="'.$item[0].'" size="6"/>
					  </td><td>
					 <input type="text" name="image'.$cont.'" id="image'.$cont.'" value="'.($item[2]).'" size="3"/>
					  </td><td><img src="'.$item[5].'"  width="30px"/></td><td>
					 <input type="text" name="timage'.$cont.'" id="timage'.$cont.'" value="'.$item[5].'" class="upload'.$id.'" size="6"/>
						  <input class="upload-button'.$id.'" name="wsl-image-add" type="button" value="Select" /> 
						  
						   </td>
						   <td><img src="'.$item[4].'"  width="30px"/></td>
					 <td>
						  <input type="text" name="video'.$cont.'" id="video'.$cont.'" value="'.$item[4].'" class="upload'.$id.'" size="6"/>
						  <input class="upload-button'.$id.'" name="wsl-image-add" type="button" value="Select" /> 
						  
						   </td><td>
					 
				  
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
					  </td> <td>
					 
					 <input name="xeffect'.$cont.'" id="xeffect'.$cont.'" type="text" value="'.$item[10].'" size="3"/>
				  </td>
						   <td>';
						   
						  
						   
						echo '<select id="colorc'.$cont.'" name="colorc'.$cont.'">
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
						   
						   
						   
					 				  
				  echo ' </td> <td>
						    <input class="color" type="text" id="colorb'.$cont.'"  name="colorb'.$cont.'"  value="'.$item[12].'" size="4"/>
						   </td>  ';
						   
						   
						   
						   echo '<td><input type="submit" name="eitem'.$cont.'" id="eitem'.$cont.'" class="button-primary" value="EDIT"></td></tr>';
						   
						}
						else 
						
						echo '<input name="item'.$cont.'" type="checkbox" value="hide" style="display:none;"/> <input name="order'.$cont.'" type="hidden" value="'.$cont.'" size="4"/>';
						
						}
					
					
					$cont++;
					
				}
				if($editscene==0) echo '</table><br/><strong>Write duration and effect time in miliseconds. Leave fields blank to load the default values. <br/>Edit the scene to insert text, images and youtube videos. You also have many more options like shadows, borders, colors, ...</strong>';
			}
			 $cont--;
			echo '</ul><input class="widefat" name="total" type="hidden" id="total" value="'.$cont.'" />';
			
	
			
			
			?>
 
 </div>
          
            
             <div id="morpheussliderconfigb<?php echo $id; ?>" style="display:none;">
             
             <div id="icon-options-general" class="icon32"><br /></div><h2>Edit <?php echo $title; ?></h2>

<br/>
<table class="form-table">

<tr valign="top">
<th scope="row"><label for="blogname">Title</label></th>
<td colspan="7"><input id="stitle<?php echo $id; ?>" name="stitle<?php echo $id; ?>" type="text" size="100" value="<?php echo $title; ?>" /></td>

</tr>

<tr valign="top">
<th scope="row"><h3>SIZES</h3></th>

</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Max Plugin width</label></th>
<td><input type='text' id='width<?php echo $id; ?>'  name='width<?php echo $id; ?>'  value='<?php echo $width; ?>' size="6"/>
<p class="description">Number.</p></td>

<th scope="row"><label for="blogname">Max Plugin height</label></th>
<td><input type='text' id='height<?php echo $id; ?>'  name='height<?php echo $id; ?>'  value='<?php echo $height; ?>' size="6"/>
<p class="description">Number.</p></td>
</tr>

<tr valign="top">
<th scope="row"><h3>TRANSITIONS</h3></th>

</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Transition time</label></th>
<td><input type='text' id='border<?php echo $id; ?>'  name='border<?php echo $id; ?>'  value='<?php echo $border; ?>' size="6"/>
<p class="description">Number in milliseconds.</p></td>


<th scope="row"><label for="blogname">Animation time</label></th>
<td><input type='text' id='op4<?php echo $id; ?>'  name='op4<?php echo $id; ?>'  value='<?php echo $op4; ?>' size="6"/>
<p class="description">Number in milliseconds.</p></td>
</tr>

<tr valign="top">
<th scope="row"><h3>DESIGN</h3></th>

</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Border size</label></th>
<td><input type='text' id='color3<?php echo $id; ?>'  name='color3<?php echo $id; ?>'  value='<?php echo $color3; ?>' size="6"/>
<p class="description">Number in pixels. 0 not border.</p></td>

<th scope="row"><label for="blogname">Border round</label></th>
<td><input type='text' id='op11<?php echo $id; ?>'  name='op11<?php echo $id; ?>'  value='<?php echo $op11; ?>' size="6"/>
<p class="description">Number in pixels. 0 not border round.</p></td>

<th scope="row"><label for="blogname">Border color</label></th>
<td><input class="color" type='text' id='op6<?php echo $id; ?>'  name='op6<?php echo $id; ?>'  value='<?php echo $op6; ?>' size="6"/>
<p class="description">Select color</p></td>

</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Background color</label></th>
<td><input class="color" type='text' id='op7<?php echo $id; ?>'  name='op7<?php echo $id; ?>'  value='<?php echo $op7; ?>' size="6"/>
<p class="description">Select color</p></td>
<th scope="row"><label for="blogname">Shadow</label></th>
<td>


<select name="op12<?php echo $id; ?>" id="op12<?php echo $id; ?>">
			        
					<?
					
					echo'
					<option value="0" ';
					echo 'selected="selected"';
					echo '>None</option>';
					
					
					echo '<option value="5" ';
					if($op12=="5") echo 'selected="selected"';
					echo '>Normal</option>';
					
					echo '<option value="6" ';
					if($op12=="6") echo 'selected="selected"';
					echo '>Bottom</option>';
					
					echo '<option value="7" ';
					if($op12=="7") echo 'selected="selected"';
					echo '>Bottom 2</option>';
					
					echo '<option value="8" ';
					if($op12=="8") echo 'selected="selected"';
					echo '>Center</option>';
					

										

		          echo '</select>';
				  
				  
				  ?>





</td>
</tr>

<tr valign="top">
<th scope="row"><h3>MARGIN</h3></th>

</tr>
<tr valign="top">
<th scope="row"><label for="blogname">Margin top</label></th>
<td><input type='text' id='op8<?php echo $id; ?>'  name='op8<?php echo $id; ?>'  value='<?php echo $op8; ?>' size="6"/>
<p class="description">Number</p></td>

<th scope="row"><label for="blogname">Margin bottom</label></th>
<td><input type='text' id='op10<?php echo $id; ?>'  name='op10<?php echo $id; ?>'  value='<?php echo $op10; ?>' size="6"/>
<p class="description">Number</p></td>
</tr>
<tr valign="top">
<th scope="row"><label for="blogname">Margin left</label></th>
<td> 
                  
                  <input type='text' id='op2<?php echo $id; ?>'  name='op2<?php echo $id; ?>'  value='<?php echo $op2; ?>' size="6"/>
<p class="description">Number</p>
                  </td>

<th scope="row"><label for="blogname">Margin right</label></th>
<td>
                  <input type='text' id='op5<?php echo $id; ?>'  name='op5<?php echo $id; ?>'  value='<?php echo $op5; ?>' size="6"/>
<p class="description">Number</p>
                  
                  </td>
</tr>


<tr valign="top">
<th scope="row"><h3>THUMBNAILS</h3></th>

</tr>
<tr valign="top">
<th scope="row"><label for="blogname">Show Thumbnails?</label></th>
<td><select name="op1<?php echo $id; ?>" id="op1<?php echo $id; ?>">
			        <option value="0" <?php if($op1=="0" || $op1=="") echo ' selected="selected"'; ?>>Not show</option>
                     <option value="1" <?php if($op1=="1") echo ' selected="selected"'; ?>>Bottom scroll</option>
                     <option value="2" <?php if($op1=="2") echo ' selected="selected"'; ?>>Left scroll</option>
     
			        
			       

		    </select>     </td>

<th scope="row"><label for="blogname">Number of thumbnails x row/column</label></th>
<td> 
<input type='text' id='number_thumbnails<?php echo $id; ?>'  name='number_thumbnails<?php echo $id; ?>'  value='<?php echo $number_thumbnails; ?>' size="6"/>
</td>

<th scope="row"><label for="blogname">Margin</label></th>
<td>	
<input type='text' id='op3<?php echo $id; ?>'  name='op3<?php echo $id; ?>'  value='<?php echo $op3; ?>' size="4"/>

</td>
</tr>
<tr valign="top">
<th scope="row"><label for="blogname">Size</label></th>
<td>	
<input type='text' id='round<?php echo $id; ?>'  name='round<?php echo $id; ?>'  value='<?php echo $round; ?>' size="4"/>

<p class="description">In horizontal scrolls indicates the height of the thumbnails in pixels, in vertical scrolls indicates the% of width of the thumbnails.</p>
</td>

<th scope="row"><label for="blogname">Background color</th>
<td>
<input class="color" type='text' id='op15<?php echo $id; ?>'  name='op15<?php echo $id; ?>'  value='<?php echo $op15; ?>' size="4"/>

   </td>
   
   <th scope="row"><label for="blogname">Font color</th>
<td>
<input class="color" type='text' id='op9<?php echo $id; ?>'  name='op9<?php echo $id; ?>'  value='<?php echo $op9; ?>' size="4"/>

   </td>
   </tr>
<tr valign="top">
      <th scope="row"><label for="blogname">Font size</th>
<td>
<input type='text' id='theight<?php echo $id; ?>'  name='theight<?php echo $id; ?>'  value='<?php echo $theight; ?>' size="4"/>

   </td>

   <th scope="row"><label for="blogname">Shadow</th>
<td>


<select name="twidth<?php echo $id; ?>" id="twidth<?php echo $id; ?>">
			        
					<?
					
					echo'
					<option value="0" ';
					echo 'selected="selected"';
					echo '>None</option>';
					
					
					echo '<option value="5" ';
					if($twidth=="5") echo 'selected="selected"';
					echo '>Normal</option>';
					
					echo '<option value="6" ';
					if($twidth=="6") echo 'selected="selected"';
					echo '>Bottom</option>';
					
					echo '<option value="7" ';
					if($twidth=="7") echo 'selected="selected"';
					echo '>Bottom 2</option>';
					
					echo '<option value="8" ';
					if($twidth=="8") echo 'selected="selected"';
					echo '>Center</option>';

										

		          echo '</select>';
				  
				  
				  ?>
</td>
</tr>
<tr valign="top">
<th scope="row"><h3>NEXT/PREV BUTTONS</h3></th>

</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Show next prev buttons?</label></th>
<td> <select name="sizetitle<?php echo $id; ?>" id="sizetitle<?php echo $id; ?>">
			        <option value="false" <?php if($sizetitle=="false") echo ' selected="selected"'; ?>>False</option>
			        <option value="true" <?php if($sizetitle!="false") echo ' selected="selected"'; ?>>True</option>
                    
		          </select>
                  
			      </td>

<th scope="row"><label for="blogname">Next prev buttons color</label></th>
<td> <input class="color" type='text' id='op13<?php echo $id; ?>'  name='op13<?php echo $id; ?>'  value='<?php echo $op13; ?>' size="6"/>
                  
			      </td>

<th scope="row"><label for="blogname">Arrow color</label></th>
<td><input class="color" type='text' id='tborder<?php echo $id; ?>'  name='tborder<?php echo $id; ?>'  value='<?php echo $tborder; ?>' size="6"/></td>
<th scope="row"><label for="blogname">Next prev buttons position</label></th>
<td> <select name="op14<?php echo $id; ?>" id="op14<?php echo $id; ?>">
			  

			        <option value="2" <?php if($op14=="2") echo ' selected="selected"'; ?>>Top</option>
      <option value="1" <?php if($op14=="1") echo ' selected="selected"'; ?>>Middle </option>

			        <option value="3" <?php if($op14=="3") echo ' selected="selected"'; ?>>Bottom</option>
                    
		          </select>
                  
			      </td>
</tr>


<tr valign="top">



<th scope="row"><h3>BULLETS</h3></th>

</tr>
<tr valign="top">



<th scope="row"><label for="blogname">Show</label></th>
<td>

<select name="font<?php echo $id; ?>" id="font<?php echo $id; ?>">
			  
<option value="1" <?php if($font=="1") echo ' selected="selected"'; ?>>Not show</option>
			        <option value="2" <?php if($font=="2") echo ' selected="selected"'; ?>>Inside Bottom slider</option>
      <option value="4" <?php if($font=="4") echo ' selected="selected"'; ?>>Inside Top slider</option> 

			        <option value="3" <?php if($font=="3") echo ' selected="selected"'; ?>>Out Bottom slider</option>
                    
		          </select>


</td>
<th scope="row"><label for="blogname">Color</label></th>
<td><input class="color" type='text' id='color1<?php echo $id; ?>'  name='color1<?php echo $id; ?>'  value='<?php echo $color1; ?>' size="6"/>
</td>


<th scope="row"><label for="blogname">Opacity</label></th>
<td><input type='text' id='color2<?php echo $id; ?>'  name='color2<?php echo $id; ?>'  value='<?php echo $color2; ?>' size="4"/>
<p class="description">Number with decimals, 0 not visible, 1 maxim</p></td>
</tr>


<tr valign="top">
<th scope="row"><h3>More</h3></th>

</tr>





<tr valign="top">
<th scope="row"><label for="blogname">Link target</label></th>
<td><input type='text' id='thumbnail_round<?php echo $id; ?>'  name='thumbnail_round<?php echo $id; ?>'  value='<?php echo $thumbnail_round; ?>' size="12"/></td>

</tr>


<?php

/*

<tr valign="top">
<th scope="row"><label for="blogname">SLIDER DESIGN</label></th>
<td>		      <select name="time<?php echo $id; ?>" id="time<?php echo $id; ?>">
			        <option value="1" <?php if($time=="1" || $time=="") echo ' selected="selected"'; ?>>Black design</option>
                    
			        <option value="2" <?php if($time=="2") echo ' selected="selected"'; ?>>White design</option>
                     <option value="3" <?php if($time=="3") echo ' selected="selected"'; ?>>Transparent design</option>
                    
			       

		          </select> </td>
</tr>
*/
?>







</table>            
                  
                  
                  
                  
                  
                  
                  
   </div>


 <div id="morpheussliderconfigc<?php echo $id; ?>" style="display:none;">
                  
                 
                  
                  <div id="icon-tools" class="icon32"><br /></div><h2>Effects</h2><br/>
                  
            
           
               
                  
                    <br/>   <br/>   
                    
                    <?php
					
					$efectsa=array('swirlFadeOutRotate', 'swirlFadeOutRotateFancy', 'swirlFadeIn', 'swirlFadeOut', 'slabs', 'spiral', 'spiralReverse', 'diagonalShow', 'diagonalShowReverse', 'spiralDimension', 'spiralReverseDimension', 'boxFadeIn', 'boxFadeOutOriginal', 'boxFadeOutOriginalRotate', 'diagonalFade', 'diagonalFadeReverse', 'randomFade', 'randomDimensions', 'boxes', 'explode', 'explodeFancy', 'linearPeal', 'linearPealReverse', 'linearPealDimensions', 'linearPealReverseDimensions', 'blind', 'blindHorizontal', 'barsUp', 'barsDown', 'barsDownReverse', 'blindFade', 'fallingBlindFade', 'raisingBlindFade', 'mixBars', 'mixBarsFancy', 'fade', 'blindFadeReverse', 'slideIn',         'slideInFancy', 'slideInReverse', 'chop', 'chopDimensions', 'chopDiagonal', 'chopDiagonalReverse', 'slideLeft', 'slideRight', 'slideUp', 'slideDown');
					
					
					$auxarr=str_replace("--", "*", $sizethumbnail);
					$auxarr=str_replace("-", "", $auxarr);
					
					$arref=explode("*", $auxarr);
					$contae=0;
					
					echo '
<p>					<strong>Select the effects you want, next to each effect you can change a number that indicates the order of appearance.</strong></p>
					<table  cellspacing="2">';
					
					while($contae<count($arref)) {
						
						if($contae%3==0) echo '<tr>';
						
						if($arref[$contae]!="") {
						echo '<td style="background-color:#ddd; padding:10px;"><input type="checkbox" name="e'.$contae.'" id="e'.$contae.'" checked="checked" value="'.$arref[$contae].'"/> ';
						
						echo ' <input type="text" size="3" id="or'.$contae.'" name="or'.$contae.'" value="'.$contae.'" /> <label>'.$arref[$contae].'</label></td>';
						}
						$contae++;
						if($contae%3==0) echo '</tr>';
					}
					
					
					
					$contae2=0;
					
					while($contae2<count($efectsa)) {
						if(strpos($sizethumbnail, "-".$efectsa[$contae2]."-")===false) {
							if($contae%3==0) echo '<tr>';
						echo '<td style="background-color:#ddd; padding:10px;"><input type="checkbox" name="e'.$contae.'" id="e'.$contae.'" value="'.$efectsa[$contae2].'"/> 
						
						 <input type="text" size="3" id="or'.$contae.'" name="or'.$contae.'" value="'.$contae.'" /> <label>'.$efectsa[$contae2].'</label></td>';
						 $contae++;
						 if($contae%3==0) echo '</tr>';
						}
						$contae2++;
					}
					 if($contae%3!=0) echo '</tr>';
					echo '</table>';
					?>
                  
      




</div>



           
        



       




        

<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"></p>
	
		 
      </fieldset>
	</form>		 
   

  </div>
</td>
</tr>