<?php
/**
* Plugin Name: Jason's Email Sender
* Plugin URI: /opt/lampp/htdocs/wp/wp-content/plugins
* Version: 1.0
*/

if (!class_exists('JasonEmailSender')) 
{
	class JasonEmailSender
	{
		public function __construct()
		{
			// Put the add_action hooks here.
			add_action('wp_head', array(&$this, 'addHeaderComment'));
			add_action('publish_post', array(&$this, 'sendNotificationEmail'));
		}

		public function addHeaderComment()
		{
			?>
			<!-- IM ALIVEEEEE! -->
			<?
		}

		public function sendNotificationEmail() 							// Sends emails even if a post is updated currently... fix that shit; that'd be annoying.
		{
			$subscribers = array( "post_type" => "subscriber" );
			$blog_title = get_bloginfo( 'name' );
			$subj = 'Test';
			$body = 'Hello! You are receiving this email because you are subscribed to ' . $blog_title . '.';
			$headers = 'From: ' . $blog_title . ' <myname@example.com>' . "\r\n";
			$loop = new WP_Query( $subscribers );
			while ( $loop->have_posts() ) {
				$loop->the_post();
				$name = the_title('', '', false);
				$email_address = get_the_content();
				wp_mail( $email_address, $subj, $body, $headers );
			}
		}
	}
}


if (class_exists('JasonEmailSender'))
{
	register_activation_hook(__FILE__, array('JasonEmailSender', 'activate'));
	register_deactivation_hook(__FILE__, array('JasonEmailSender', 'deactivate'));

	$JasonEmailSender = new JasonEmailSender();
}
?>