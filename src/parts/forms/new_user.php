<form class="box flex-y flex-o" method="post">
	<?php
	render('input', ['Display Name', 'dname', 'required' => false]);
	render('input', ['Email', 'email']);
	render('input', ['Password', 'pass1', 'password']);
	render('input', ['Repeat Password', 'pass2', 'password']);
	?>
	<button type="submit">Sign up!</button>
</form>
<?php render('errors', ['messages' => $data['errors']]); ?>
