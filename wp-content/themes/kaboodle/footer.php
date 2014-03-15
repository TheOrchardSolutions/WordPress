<?php global $woo_options; ?>

	<?php 
		$total = $woo_options[ 'woo_footer_sidebars' ]; if (!isset($total)) $total = 4;				   
		if ( ( woo_active_sidebar( 'footer-1') ||
			   woo_active_sidebar( 'footer-2') || 
			   woo_active_sidebar( 'footer-3') || 
			   woo_active_sidebar( 'footer-4') ) && $total > 0 ) : 
		
  	?>
	<div id="footer-widgets" class="col-full col-<?php echo $total; ?>">
		
		<?php $i = 0; while ( $i < $total ) : $i++; ?>			
			<?php if ( woo_active_sidebar( 'footer-'.$i) ) { ?>

		<div class="block footer-widget-<?php echo $i; ?>">
        	<?php woo_sidebar( 'footer-'.$i); ?>    
		</div>
		        
	        <?php } ?>
		<?php endwhile; ?>
        		        
		<div class="fix"></div>

	</div><!-- /#footer-widgets  -->
    <?php endif; ?>
    
	<div id="footer" class="col-full">
	
		<div id="copyright" class="col-left">
		<a href="/directions"><img src="/media/icons/i-12-icon.jpg"/> Directions</a> | <a href="/takein"><img src="/media/icons/form.jpg"/> Drop Off Form</a> | <a href="/service/remote-support"><img src="/media/icons/teamviewer.jpg"/> Remote Support</a> | <a href="/paymentform"><img src="/media/icons/payments.jpg"/> Payment Form</a> | <a href="http://help.theorchardsolutions.com"><img src="/media/icons/webhelpdesk.jpg"/> Support Site</a> | <a href="https://mail.mcghosting.com/"> <img src="/media/icons/webmail-icon.jpg"> Web Mail</a>
	</div><!-- /#footer  -->



</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>