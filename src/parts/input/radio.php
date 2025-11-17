<?php
$label = $D[0] ?? $D['label'];
$name = $D[1] ?? $D['name'] ?? label_to_name($label);
$options = $D[2] ?? $D['options'];
$persist = $D['persist'] ?? true;
$default = $D['default'] ?? null;
$required = $D['required'] ?? true;

$checked = (Request::is_post() && $persist)? Request::param($name) : null;
$checked = is_null($checked)? $default : $checked;

$id = input_id()[1];
$required = $required? ' required' : '';
echo '<div class="flex input-multi">';
echo "<label>$label</label>";
$idx = 1;
foreach ($options as $value => $label) {
	$child_id = $id . "-$idx";
	echo <<<TEXT
	<input id="$child_id" type="radio" name="$name" value="$value" required>
	<label for="$child_id" class="fill">$label</label>
	TEXT;
	$idx += 1;
}
echo '</div>';
