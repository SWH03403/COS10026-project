<?php
Session::require_user(true);

render_page(function() {
	echo '<div class="box flex-y">';
	render('list', 'Implemented Features / Enhancements', [
		[ 'title' => '"Create a manager registration page with server side validation requiring unique username and a password rule, and store this information in a table."',
			[ 'title' => 'All accounts are stored on a single database table with extension tables to derive roles and associate extra data.',
				'Anyone can create an applicant profile to submit an EOI.',
				'Changes made in a profile will be reflected on all applications made by its owner.',
				'Management privileges can be granted / revoked.',
			],
			[ 'title' => 'All applicants are required to create an account to use our service.',
				'This helps storing data efficiently by using a single table to store common applicant infomation, such as one'."'".'s first and last name.',
				'By using accounts, users can be authorized to make changes to applications they have submitted.',
			],
			'A manager can not promote an user to a new manager.',
			[ 'title' => 'Shortcomings / Planned features',
				'Currently, only the first account has the role "manager".',
				'A new account type "admin" with can grant access to the distinct "manager" role.',
			],
		],
	]);
	echo '</div>';
},
	title: 'Enhancements',
);
