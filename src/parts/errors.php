<?php
$messages = $arg_0 ?? $arg_messages ?? [];

$show = !empty($messages);
if ($show) { echo '<ul class="box errors-box flex-y">'; }
foreach ($messages as $msg) { echo '<li>' . "$msg" . '!</li>'; }
if ($show) { echo '</ul>'; }
?>
