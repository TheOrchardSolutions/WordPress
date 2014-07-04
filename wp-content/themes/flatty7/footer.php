<!--Footer-->

<footer class="clear center-text"> 
        <?php 
		$get_footer_content = get_theme_mod('copyright_text','<style>
ul.sitemapfoot
{
color:red;
margin-left:0;
list-style-type: none;

}
ul.sitemapfoot li
{
color:red;
margin-left:0;

}
ul.sitemapfoot li a:link {
display:block;
text-decoration:none;   
color:#63686c;
}
</style>

[col size="one_fourth"]
<p style="font-weight:bold; margin-bottom:0; text-align:center;">SERVICES</p><hr style="margin-top: 0; margin-bottom:0;">
[pagelist child_of="4429" depth="1" class="sitemapfoot"]
[/col]

[col size="one_fourth"]
<p style="font-weight:bold; margin-bottom:0; text-align:center;">CLASSES</p><hr style="margin-top: 0; margin-bottom:0;">
[pagelist child_of="312" depth="1" class="sitemapfoot"]
[/col]

[col size="one_fourth"]
[/col]

[col size="one_fourth_last"]
[/col]');
		echo do_shortcode($get_footer_content);
		?>
</footer>

<?php wp_footer(); ?>
</body>
</html>