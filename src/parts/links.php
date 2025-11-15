<?php
$urls = $arg_0 ?? $arg_urls;
$cur = Request::path();
foreach ($urls as $url => $disp) {
	$is_cur = (str_starts_with($url, '/') && substr($url, 1) === $cur)?
		' class="current-page"' : '';
	echo "<li><a href=\"$url\"$is_cur>$disp</a></li>";
} ?>
