<?php
if (!Session::has_user()) { Router::return(); }

$errors = [];
if (Request::is_post()) {
	$display = Request::param('display');
	$email = Request::param('email');
	$pass_old = Request::param('pass', false);
	$pass_new = Request::param('new-pass', false);
	$pass_rep = Request::param('new-passrep', false);

	// TODO: Validation & DB opertions

	Router::redirect('user');
}
end_post:

render_page(['forms/edit_user'], [
	'title' => 'Edit profile',
	'errors' => $errors,
]);
