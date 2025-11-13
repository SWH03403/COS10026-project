<form class="box flex-y flex-o" method="post">
	<?php
	render('input', ['label' => 'Email', 'name' => 'email']);
	render('input', ['label' => 'Password', 'name' => 'pass', 'type' => 'password']);
	?>
	<button type="submit">Login</button>
</form>
<?php render('errors', ['messages' => $data['errors']]); ?>
