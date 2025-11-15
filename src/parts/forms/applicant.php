<?php function head(string $text) { echo "<h2>$text</h2>"; } ?>
<section class="flex-y flex-o">
	<h1>Personal Info Submission</h1>
	<p>
		Before submitting EOIs, you must first provide some information about yourself,
		which will be reflected on <span class="important">all</span> of your future EOIs.
	</p>
	<p>You can always update these data in the <span class="important">Profile</span> page.</p>
</section>

<?php render('errors', ['messages' => $data['errors']]); ?>

<form id="personal-info" class="box flex-y" method="post">
	<?php
		head('Identity');
		render('input', ['First Name', 'first-name']);
		render('input', ['Last Name', 'last-name']);
		render('input', ['Date of Birth', 'dob', 'date', 'persist' => true]);
		render('input/select', ['Gender', 'gender', [
			'm' => 'Male (he/him)',
			'f' => 'Female (she/her)',
			'x' => 'Non-binary (they/them)',
			'?' => 'Prefer not to say',
		]]);

		head('Address');
		render('input', ['Street', 'street']);
		render('input', ['Town', 'town']);
		render('input/select', ['State', 'state', State::options()]);
		render('input', ['Postcode', 'postcode', 'number']);

		head('Contact');
		render('input', ['Phone No.', 'phone']);

		head('Questions');
		render('input/binary', [
			'Are you willing to submit to a background check if selected for employment?',
			'background',
		]);
		render('input/binary', ['Have you ever been convicted of a felony?', 'felony']);
		render('input/binary', ['Are you a veteran?', 'veteran']);
		render('csrf');
	?>
	<button type="submit">Submit</button>
</form>
