<?php $D = $D[0];?>

<article id="single_eoi" class="flex-y box">
    <?php
        $db = Database::get();

        
        $delete_individual = $_POST['delete_individual'] ?? '';
        $status_change_individual = $_POST["status_change_individual"] ?? '';
        $id = $_POST['id'] ?? '';
        $accpeted_statuses = ['New', 'Current', 'Final'];

        if ($delete_individual && $id == $D['id']) {
            $db->query('DELETE FROM eoi WHERE id = ?', [$D['id']]);
            return;
        } elseif ($status_change_individual && $id == $D['id']) {
            if (in_array($status_change_individual, $accpeted_statuses)) {
                $db->query('UPDATE eoi SET status = ? WHERE id = ?', [$status_change_individual, $D['id']]);
                $D['status'] = $status_change_individual;
            }
        }

        $J = Job::get($D['job_id']);
    ?>

    <?php $A = $D['applicant_info']; $A = $A[0]?>

	<div class="flex eoi-front">
		<p>[<?= $D['id'] ?>] <?= $A['first_name'] . ' ' . $A['last_name'] ?> || User ID: <?= $D['user_id'] ?> || Job ID: <?= $D['job_id'] ?> || Status: <?= $D['status'] ?> || Desired Salary: <?= $D['desired_salary'] ?> || Start Date: <?= $D['start_date'] ?> </p>
	</div>

    <details class="flex flex-y eoi-details">
        <summary></summary>
        <br>
        <h2>Applicant profile</h2>
        <hr>

        <p class="applicant-name"><?= $A['first_name'] . ' ' . $A['last_name'] ?></p>
        <p class="applicant-dob"><?= $A['dob'] ?></p>
        <p class="applicant-gender"><?= $A['gender'] ?></p>

        <p class="applicant-address"><?= $A['street'] ?>, <?= $A['town'] ?>, <?= $A['state'] ?> <?= $A['postcode'] ?></p>
        <p class="applicant-phone"><?= $A['phone'] ?></p>

        <p class="applicant-background"><?= $A['can_check_background'] ? 'Yes' : 'No' ?></p>
        <p class="applicant-convict"><?= $A['is_convict'] ? 'Yes' : 'No' ?></p>
        <p class="applicant-veteran"><?= $A['is_veteran'] ? 'Yes' : 'No' ?></p>
        <hr>

        <p>EOI Extra: <?= $D['extra'] ?></p>
        <p>Reason: <?= $D['reason'] ?></p>

        <br><br>
        
        <h2>Job applied for</h2>
        <hr>
        <p class="job-ident"><?= $J->id ?></p>
		<p class="job-company"><?= html_sanitize($J->company) ?></p>
		<p class="job-superior"> <?= html_sanitize($J->superior) ?></p>
		<p class="job-description flex-y"><?= html_sanitize($J->description) ?></p>
		<div class="job-essentials"></div>
		<ul>
			<li class="job-langs"><?= html_sanitize($J->reqs->must['langs']) ?>.</li>
			<li class="job-frameworks"><?= html_sanitize($J->reqs->must['tools']) ?>.</li>
			<li class="job-experience">
				<?= $J->experience->begin ?> ~ <?= $J->experience->end ?> years.
			</li>
		</ul>
		<div class="job-preferences"></div>
		<ul>
			<?php
			foreach ($J->reqs->opts as $opt) {
				$pref = html_sanitize($opt);
				echo "<li>$pref.</li>";
			}
			?>
		</ul>
        <hr><br>
        
        
        

    <div>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?=$D['id']?>">
            <input type="Submit" name="delete_individual" value="Delete">
        </form>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?=$D['id']?>">
            <input type="Submit" name="status_change" value="Change Status">
            <select name="status_change_individual">
                <option value="New">New</option>
                <option value="Current">Current</option>
                <option value="Final">Final</option>
            </select>
        </form>
    </div>

    


        
    </details>
</article>

