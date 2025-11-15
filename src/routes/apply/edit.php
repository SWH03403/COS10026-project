<?php
if (!Session::has_user()) { Router::redirect('user/login'); }

$errors = [];
render_page(['forms/applicant'], [
	'title' => 'Applicant Personal Info',
	'style' => 'apply_personal',
	'errors' => $errors,
]);
