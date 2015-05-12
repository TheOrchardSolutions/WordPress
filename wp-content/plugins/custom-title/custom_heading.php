<?php 
    /*
    Plugin Name: Custom Title 
    Plugin URI: http://dyuthichand.in/ 
    Description:  A new plugin to customize title of a page/post  is easier than ever! 
    Author: Dyuthi & Junaid
    Version: 2.0
   
    */

add_action( 'admin_head-post.php', 'tinymce_title_js');
add_action( 'admin_head-post-new.php', 'tinymce_title_js');


function tinymce_title_js(){ ?>
<script type="text/javascript">

jQuery( document ).ready(function() {
 
jQuery("#title").addClass("mceEditor");

tinyMCE.execCommand("mceAddEditor", true, "title");

});

jQuery("#title-prompt-text").click(function(){
  jQuery("label").css("display","none");
});
</script>
<style type='text/css'>
#titlewrap{border:solid 1px #e5e5e5 !important;}
tr.mceLast{display:none;}
#title_ifr{height:50px !important;}
#title-prompt-text{
	z-index: 999;
	padding:74px 10px !important;
}
</style>
<?php }?>


