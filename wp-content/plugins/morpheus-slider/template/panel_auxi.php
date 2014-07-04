<?php
$sliderwidth=400;
if(isset($_POST['id']) && $id==$_POST['id']) {
	
	echo '<h3>morpheus slider '.$_POST['id'].' updated.</h3>';
}
?>

<style>

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
  +
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
}

.addwindow {
	
	position:relative:
	border: 2px;
	display: none;
	
}
.morpheusitemfull<?php echo $id; ?> {
	
	margin: 10px;
	padding: 10px;
	
	
	
	display: none;
	
}


.morpheusdelete<?php echo $id; ?>{
	
	
	display: none;
	
}
.edititem {
	
	position:relative:
	border: 2px;
	display: none;
	margin: 8px;
	line-height:250%;
	padding: 8px;
	background-color:#CCC;
	
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


tb_show('', 'media-upload.php?type=image&amp;amp;amp;amp;TB_iframe=true&uploadID<?php echo $id; ?>=' + uploadID<?php echo $id; ?>);

return false;
});


jQuery('#newelem<?php echo $id; ?>').click(function() {
	
	
 formfield = jQuery('#unewelem<?php echo $id; ?>').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
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
   
    
    <tr>
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
    <div id="icon-tools" class="icon32"></div>
    </td>
    <td>
    <div id="icon-tools" class="icon32"></div>
    </td>
    </tr>
    <tr>
    <td>
     <button id="ideditmorpheusa<?php echo $id; ?>" class="button-secondary editmorpheusa<?php echo $id; ?>"><h4>Images</h4></button>
    </td>
    <td><button id="ideditmorpheusb<?php echo $id; ?>" class="button-secondary editmorpheusb<?php echo $id; ?>"><h4>Settings</h4></button>
    </td>
    <td><button id="ideditmorpheusc<?php echo $id; ?>" class="button-secondary editmorpheusc<?php echo $id; ?>"><h4>Effects</h4></button>
    </td>
    <td><button id="ideditmorpheusd<?php echo $id; ?>" class="button-secondary editmorpheusd<?php echo $id; ?>"><h4>Design</h4></button>
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
	
	echo morpheus_render2("[morpheus ".$id." /]");
	
	?>
    </textarea>
     
    </th>
    
    <th id="columnname" class="manage-column column-columnname" scope="col">  
    
    <form method="post" action="">
	  <input name="borrar" type="hidden" id="borrar" value="<?php echo $id; ?>">
     
      
      <button class="button-secondary deletebuton<?php echo $id; ?>"><h3>Delete</h3></button>
      <div class="morpheusdelete<?php echo $id; ?>">
      <button class="deletebuton<?php echo $id; ?>">CANCEL</button>
     <input type='submit' name='' value='OK' />
     </div>
    </form>
    </th>
   
    </tr>
   
   
<tr>
<td colspan="6" bgcolor="#FFFFFF">

<?php
$tverono="display: none;";
if(isset($_POST["seccion".$id]) && $_POST["seccion".$id]=="items") {
	$tverono="display: block;";
	
}



?>


<div class="morpheusitemfull<?php echo $id; ?>" style=" <?php echo $tverono; ?> "> 

	<form class="form-slider<?php echo $id; ?>" method="post" action="">
		<fieldset>

             
              
              <div id="morpheussliderconfiga<?php echo $id; ?>" style=" <?php echo $tverono; ?>">
              
              <div id="icon-upload" class="icon32"><br /></div><h2>SCENES</h2><br/>
             
              <input name="operation" type="hidden" id="operation" value="0" />
               <input name="itemselect<?php echo $id; ?>" type="hidden" id="itemselect<?php echo $id; ?>" value="" />
             
            <button class="button-primary additem">New scene</button> <button class="button-secondary deleteitem">Delete scenes</button> 
            <div class="addwindow">
             <hr />
           <input type='submit' name='' value='OK' /><button class="button-secondary cancel">Cancel</button>
            
            </div>
            
            <ul>
            <?php
			
			
			
			// items
			$cont=0;
			if($values!="") {
				$items=explode("kh6gfd57hgg", $values);
				$cont=1;
				foreach ($items as &$value) {
					
					// MODIFICAR PARA FORMULARIOS MAS PEQUESSSSSSSSSSSS ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡
					
					include("scene.php");	
					
					
				}
			}
			 $cont--;
			echo '</ul><input class="widefat" name="total" type="hidden" id="total" value="'.$cont.'" />';
			
	
			
			
			?>
 
 </div>
          
            
             <div id="morpheussliderconfigb<?php echo $id; ?>" style="display:none;">
             
             <div id="icon-options-general" class="icon32"><br /></div><h2>Settings</h2>


<table class="form-table">

<tr valign="top">
<th scope="row"><label for="blogname">Title</label></th>
<td><input id="stitle<?php echo $id; ?>" name="stitle<?php echo $id; ?>" type="text" size="100" value="<?php echo $title; ?>" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Max Plugin width</label></th>
<td><input type='text' id='width<?php echo $id; ?>'  name='width<?php echo $id; ?>'  value='<?php echo $width; ?>' size="6"/>
<p class="description">Number.</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Max Plugin height</label></th>
<td><input type='text' id='height<?php echo $id; ?>'  name='height<?php echo $id; ?>'  value='<?php echo $height; ?>' size="6"/>
<p class="description">Number.</p></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Max Plugin width in mobiles</label></th>
<td><input type='text' id='tborder<?php echo $id; ?>'  name='tborder<?php echo $id; ?>'  value='<?php echo $tborder; ?>' size="6"/>
<p class="description">Number.</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Max Plugin height in mobiles</label></th>
<td><input type='text' id='font<?php echo $id; ?>'  name='font<?php echo $id; ?>'  value='<?php echo $font; ?>' size="6"/>
<p class="description">Number.</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Max Plugin width in tablet</label></th>
<td><input type='text' id='color1<?php echo $id; ?>'  name='color1<?php echo $id; ?>'  value='<?php echo $color1; ?>' size="6"/>
<p class="description">Number.</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Max Plugin height in tablet</label></th>
<td><input type='text' id='color2<?php echo $id; ?>'  name='color2<?php echo $id; ?>'  value='<?php echo $color2; ?>' size="6"/>
<p class="description">Number.</p></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Transition time</label></th>
<td><input type='text' id='border<?php echo $id; ?>'  name='border<?php echo $id; ?>'  value='<?php echo $border; ?>' size="6"/>
<p class="description">Number in milliseconds.</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Animation time</label></th>
<td><input type='text' id='op4<?php echo $id; ?>'  name='op4<?php echo $id; ?>'  value='<?php echo $op4; ?>' size="6"/>
<p class="description">Number in milliseconds.</p></td>
</tr>



<tr valign="top">
<th scope="row"><label for="blogname">Link target</label></th>
<td><input type='text' id='thumbnail_round<?php echo $id; ?>'  name='thumbnail_round<?php echo $id; ?>'  value='<?php echo $thumbnail_round; ?>' size="12"/></td>
</tr>




</table>            

			     
</div>

 <div id="morpheussliderconfigd<?php echo $id; ?>" style="display:none;">
                  
                 
                  
                  <div id="icon-tools" class="icon32"><br /></div><h2>Design</h2><br/>
                  
                  
                  
                  
<table class="form-table">



<tr valign="top">
<th scope="row"><label for="blogname">Border size</label></th>
<td><input type='text' id='color3<?php echo $id; ?>'  name='color3<?php echo $id; ?>'  value='<?php echo $color3; ?>' size="6"/>
<p class="description">Number in pixels. 0 not border.</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Border round</label></th>
<td><input type='text' id='op11<?php echo $id; ?>'  name='op11<?php echo $id; ?>'  value='<?php echo $op11; ?>' size="6"/>
<p class="description">Number in pixels. 0 not border round.</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Shadow size</label></th>
<td><input type='text' id='op12<?php echo $id; ?>'  name='op12<?php echo $id; ?>'  value='<?php echo $op12; ?>' size="6"/>
<p class="description">Number in pixels. 0 not shadow.</p></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Main color</label></th>
<td><input class="color" type='text' id='op6<?php echo $id; ?>'  name='op6<?php echo $id; ?>'  value='<?php echo $op6; ?>' size="6"/>
<p class="description">Select color</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Title color</label></th>
<td><input class="color" type='text' id='op7<?php echo $id; ?>'  name='op7<?php echo $id; ?>'  value='<?php echo $op7; ?>' size="6"/>
<p class="description">Select color</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Title size</label></th>
<td><input type='text' id='op9<?php echo $id; ?>'  name='op9<?php echo $id; ?>'  value='<?php echo $op9; ?>' size="6"/>
<p class="description">Number</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Description color</label></th>
<td><input class="color" type='text' id='op8<?php echo $id; ?>'  name='op8<?php echo $id; ?>'  value='<?php echo $op8; ?>' size="6"/>
<p class="description">Select color</p></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Description size</label></th>
<td><input type='text' id='op10<?php echo $id; ?>'  name='op10<?php echo $id; ?>'  value='<?php echo $op10; ?>' size="6"/>
<p class="description">Number</p></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Text position</label></th>
<td> <select name="op2<?php echo $id; ?>" id="op2<?php echo $id; ?>">
			        <option value="left" <?php if($op2=="left" || $op2=="") echo ' selected="selected"'; ?>>Left</option>
                    
			        <option value="right" <?php if($op2=="right") echo ' selected="selected"'; ?>>Right</option>
                     <option value="top" <?php if($op2=="top") echo ' selected="selected"'; ?>>Top</option>
                     <option value="bottom" <?php if($op2=="bottom") echo ' selected="selected"'; ?>>Bottom</option>
			       

		          </select></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Text effect</label></th>
<td> <select name="op5<?php echo $id; ?>" id="op5<?php echo $id; ?>">
			        <option value="1" <?php if($op5=="1" || $op5=="") echo ' selected="selected"'; ?>>None</option>
                    
			        <option value="2" <?php if($op5=="2") echo ' selected="selected"'; ?>>Enter</option>
                     <option value="3" <?php if($op5=="3") echo ' selected="selected"'; ?>>Opacity</option>

                    
			       

		          </select> </td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Navegation</label></th>
<td> <select name="number_thumbnails<?php echo $id; ?>" id="number_thumbnails<?php echo $id; ?>">
			        <option value="true" <?php if($number_thumbnails=="true" || $number_thumbnails=="") echo ' selected="selected"'; ?>>True</option>
                     <option value="false" <?php if($number_thumbnails=="false") echo ' selected="selected"'; ?>>False</option>
			        
			       

		          </select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="blogname">Navegation placement</label></th>
<td>			      
<select name="op3<?php echo $id; ?>" id="op3<?php echo $id; ?>">
			        <option value="inside" <?php if($op3=="inside" || $op3=="") echo ' selected="selected"'; ?>>Inside</option>
                     <option value="outside" <?php if($op3=="outside") echo ' selected="selected"'; ?>>Outside</option>
			        
			       

		          </select></td>
</tr>



<tr valign="top">
<th scope="row"><label for="blogname">Navegation style</th>
<td><select name="op15<?php echo $id; ?>" id="op15<?php echo $id; ?>">
			        <option value="1" <?php if($op15=="1" || $op15=="") echo ' selected="selected"'; ?>>Main color</option>
                     <option value="2" <?php if($op15=="2") echo ' selected="selected"'; ?>>Transparent</option>
                     <option value="3" <?php if($op15=="3") echo ' selected="selected"'; ?>>Only links</option>
			        
			       

		    </select>     </td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Show Thumbnails?</label></th>
<td><select name="op1<?php echo $id; ?>" id="op1<?php echo $id; ?>">
			        <option value="true" <?php if($op1=="true" || $op1=="") echo ' selected="selected"'; ?>>True</option>
                     <option value="false" <?php if($op1=="false") echo ' selected="selected"'; ?>>False</option>
			        
			       

		    </select>     </td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Show next prev buttons?</label></th>
<td> <select name="sizetitle<?php echo $id; ?>" id="sizetitle<?php echo $id; ?>">
			        <option value="false" <?php if($sizetitle=="false") echo ' selected="selected"'; ?>>False</option>
			        <option value="true" <?php if($sizetitle!="false") echo ' selected="selected"'; ?>>True</option>
                    
		          </select>
                  
			      </td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Next prev buttons style</label></th>
<td> <select name="op13<?php echo $id; ?>" id="op13<?php echo $id; ?>">
			        <option value="1" <?php if($op13=="1") echo ' selected="selected"'; ?>>Black</option>
                    <option value="4" <?php if($op13=="4") echo ' selected="selected"'; ?>>White</option>
			        <option value="2" <?php if($op13=="2") echo ' selected="selected"'; ?>>Transparent</option>
                    <option value="3" <?php if($op13=="3") echo ' selected="selected"'; ?>>Arrows</option>
                    
		          </select>
                  
			      </td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Next prev buttons position</label></th>
<td> <select name="op14<?php echo $id; ?>" id="op14<?php echo $id; ?>">
			        <option value="1" <?php if($op14=="1") echo ' selected="selected"'; ?>>Middle outside</option>
			        <option value="2" <?php if($op14=="2") echo ' selected="selected"'; ?>>Middle inside</option>
                    <option value="3" <?php if($op14=="3") echo ' selected="selected"'; ?>>Top outside</option>
			        <option value="4" <?php if($op14=="4") echo ' selected="selected"'; ?>>Top inside</option>
                    <option value="5" <?php if($op14=="5") echo ' selected="selected"'; ?>>Bottom outside</option>
			        <option value="6" <?php if($op14=="6") echo ' selected="selected"'; ?>>Bottom inside</option>
                    
		          </select>
                  
			      </td>
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
                  
            
           
              <label>Effect columns(Number): </label> <input type='text' id='twidth<?php echo $id; ?>'  name='twidth<?php echo $id; ?>'  value='<?php echo $twidth; ?>' size="6"/>    
                  
                  <label>Effect rows(Number): </label> <input type='text' id='theight<?php echo $id; ?>'  name='theight<?php echo $id; ?>'  value='<?php echo $theight; ?>' size="6"/>          

 <label>Apply effects randomly: </label> 
             <select name="round<?php echo $id; ?>" id="round<?php echo $id; ?>">
                <option value="false" <?php if($round=='false') echo ' selected="selected"'; ?>>False</option>
                <option value="true" <?php if($round!='false') echo ' selected="selected"'; ?>>True</option>
              </select>
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

<input type='hidden' id='sizedescription<?php echo $id; ?>'  name='sizedescription<?php echo $id; ?>'  value='<?php echo $sizedescription; ?>'/>

           
        



       




        

<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"></p>
	
		 
      </fieldset>
	</form>		 
   

  </div>
</td>
</tr>