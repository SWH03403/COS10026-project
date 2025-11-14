<?php $acc = $data['user']->account(); ?>
<h1>Hi, <?= $acc->display ?></h1>
<article id="account-info" class="box flex-y">
	<div class="flex">
		<h2>Account Info</h1>
		<div class="fill"></div>
		<a id="account-edit" class="flex-y" href="/user/edit">Edit</a>
	</div>
	<div id="account-grid">
		<span>Email:</span>
		<span><?= $acc->email ?></span>
		<span>Created at:</span>
		<span><?= $acc->created->format(DateTimeInterface::W3C) ?></span>
		<span>Updated at:</span>
		<span><?= $acc->updated->format(DateTimeInterface::W3C) ?></span>
		<span>Is manager:</span>
		<span><?= $acc->is_manager? 'Yes' : 'No' ?></span>
	</div>
</article>
