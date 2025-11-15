<?php
$label = $arg_0 ?? $arg_label;
$name = $arg_1 ?? $arg_name;
$type = $arg_2 ?? $arg_type ?? 'text';
$persist = $arg_persist ?? ($type !== 'password');
$default = $arg_default ?? null;
$required = $arg_required ?? true;
$placeholder = $arg_placeholder ?? null;

$value = (Request::is_post() && $persist)? Request::param($name) : null;
$value = is_null($value)? $default : $value;
$value = is_null($value)? '' : ' value="' . html_sanitize($value) . '"';

global $_input_first;
$id = input_id();
$focus = $_input_first? ' autofocus' : '';
$required = $required? ' required' : '';
$placeholder = is_null($placeholder)? '' : " placeholder=\"$placeholder\"";

echo <<<TEXT
	<div class="flex">
		<label for="$id">$label</label>
		<input id="$id" class="fill" type="$type" name="$name"$value$placeholder$required$focus>
	</div>
TEXT;
?>
