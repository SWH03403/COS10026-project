<?php
$label = $data['label'];
$name = $data['name'];
$type = $data['type'] ?? 'text';
$value = $data['persist'] ?? ($type == 'text');
$required = $data['required'] ?? true;

$value = Request::is_post()? html_sanitize(Request::param($name)) : null;
$value = is_null($value)? '' : ' value="' . html_sanitize($value) . '"';

global $_input_counter;
$_input_counter = is_null($_input_counter)? 0 : $_input_counter;
$id = 'input-auto-' . ($_input_counter += 1);
$required = $required? ' required' : '';

echo <<<TEXT
	<div class="flex">
		<label for="$id">$label</label>
		<input id="$id" class="fill" type="$type" name="$name"$value$required>
	</div>
TEXT;
?>
