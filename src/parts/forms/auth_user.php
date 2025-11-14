<form class="box flex-y flex-o" method="post">
	<?php
	render('input', ['Email', 'email']);
	render('input', ['Password', 'pass', 'password']);
	render('csrf');
	?>
	<button type="submit">Login</button>
</form>
<?php render('errors', ['messages' => $data['errors']]); ?>
