<div class='content'>
<h2 class='title'><?php the_title(); ?></h2>
<form method="POST" action="<?php the_permalink(); ?>" >
	Name: <input type='text' name='subscriber_name' /><br>
	Email Address: <input type='text' name='email_address' /><br>
	<input type='submit' value='Subscribe' />
</form>	
</div>