<?php
$D = $D[0];
$salary = $D['desired_salary'] . ' ' . $D['salary_currency'];
$gender = ucfirst(Gender::from($D['gender'])->label());
$addr = implode(', ', [$D['street'], $D['town'], $D['state'], $D['postcode']]);
?>
<details class="box flex flex-y eoi-entry">
	<summary class="flex">
		<span><?= $D['first_name'] . ' ' . $D['last_name'] ?></span>
		<span class="fill"></span>
		<span class="important"><?= $D['job_id'] ?></span>
	</summary>
	<hr><h2>Entry Info</h2>
	<p class="eoi-salary"><?= $salary ?></p>

	<hr><h2>Applicant Info</h2>
	<p class="applicant-dob"><?= $D['dob'] ?></p>
	<p class="applicant-gender"><?= $gender ?></p>
	<p class="applicant-address"><?= $addr ?></p>
	<p class="applicant-phone"><?= $D['phone'] ?></p>
	<p class="applicant-background"><?= $D['can_check_background']? 'Yes' : 'No' ?></p>
	<p class="applicant-convict"><?= $D['is_convict']? 'Yes' : 'No' ?></p>
	<p class="applicant-veteran"><?= $D['is_veteran']? 'Yes' : 'No' ?></p>

	<hr><h2>Job Info</h2>
	<p class="job-name"><?= $D['name'] ?></p>
	<p class="job-company"><?= html_sanitize($D['company']) ?></p>
	<p class="job-location"><?= html_sanitize($D['location']) ?></p>
</details>
