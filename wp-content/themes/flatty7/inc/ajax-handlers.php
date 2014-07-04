<?php
	add_action('init', 'frederick_ajax_init');
	function frederick_ajax_init() {
		wp_enqueue_script('frederick-ajax-request', get_template_directory_uri() . '/js/ajax.js', array('jquery'));
		wp_localize_script('frederick-ajax-request', 'frederickAJAX', array('ajaxurl' => admin_url('admin-ajax.php'),'ThemePath' => get_template_directory_uri()));
	}
	
	add_action('wp_ajax_nopriv_contact_action', 'contact_callback');
	add_action('wp_ajax_contact_action', 'contact_callback');
	
	function contact_callback() {
		try {
			$name = $_POST["name"];
			$email = $_POST["email"];
			$message = $_POST["message"];			
			$message .= "\n\n";					
			$message .= $_POST["website"];
			$emailTo = get_option('tz_email');
			if (!isset($emailTo) || ($emailTo == '')) {
				$emailTo = get_option('admin_email');
			}
			$subject = '[Message] From ' . $name;
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
			$headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
			mail($emailTo, $subject, $body, $headers);
			echo "Message is sent!";
		} catch (Exception $e) {
			echo "Mail sending failed!";
		}
		die();
	}
?>