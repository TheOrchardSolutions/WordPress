<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>        
        <meta charset="<?php bloginfo('charset'); ?>" />        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title><?php bloginfo('name') . wp_title(); ?> | <?php bloginfo('description'); ?></title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />  		
		<?php if (get_option('frederick_fav_icon')): ?>
			<link rel="shortcut icon" href="<?php echo get_option('frederick_fav_icon'); ?>" /> 
		<?php endif; ?>				
        <?php wp_head(); ?>
		
		  <!--[if lt IE 9]>
                <script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		  <![endif]-->
						
    </head>
    <body <?php body_class(); ?>>
        <?php
        if (!isset($content_width))
            $content_width = 960;
        ?>
        <table class="doc-loader">
            <tr>
                <td>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ajax-document-loader.gif" alt="Loading..." />
                </td>
            </tr>
        </table>         