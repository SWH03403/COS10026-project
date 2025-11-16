<?php
$external_routes = [
	'https://dueordie.atlassian.net/jira/software/projects/WEBTECHPRJ/summary' => 'Jira',
	'https://github.com/SWH03303/swh03303.github.io' => 'Github',
	'mailto:feedbacks@thissitedoesnotexist.au' => 'Email',
]; ?>
<footer class="flex flex-o">
	<nav id="external-navigation" class="fill flex">
		<ul class="fill flex flex-o">
			<?php render('links', $external_routes) ?>
		</ul>
	</nav>
</footer>
