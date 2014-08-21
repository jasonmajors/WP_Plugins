<?php get_header(); 

function add_subscriber()
{
	if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
		$name = $_POST['subscriber_name'];
		$email = $_POST['email_address'];
		$subscriber = array(
			'post_title' 	=> $name,
			'post_content'	=> $email,
			'post_type'		=> 'subscriber',
		);
		$post_id = wp_insert_post( $subscriber ); 
		wp_publish_post( $post_id );
		echo "<h1 class='title'>Thank you for subscribing</h1>";
	}	
	else {
		include( dirname(__FILE__) . '/submitform.php' );
	}
}

add_subscriber();

wp_footer(); ?>