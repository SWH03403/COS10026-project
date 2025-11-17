<?php
$label = $D[0] ?? $D['label'];
$name = $D[1] ?? $D['name'] ?? label_to_name($label);
$type = $D[2] ?? $D['type'] ?? 'text';
$persist = $D['persist'] ?? ($type !== 'password');
$default = $D['default'] ?? null;
$required = $D['required'] ?? true;
$placeholder = $D['placeholder'] ?? null;
$vert = $D['vertical'] ?? false;
$suffix = $D['suffix'] ?? null;

$value = (Request::is_post() && $persist)? Request::param($name) : null;
$value = is_null($value)? $default : $value;
$value = is_null($value)? '' : ' value="' . html_sanitize($value) . '"';

[$first, $id] = input_id();
$vert = $vert? '-y input-vert' : '';
$focus = $first? ' autofocus' : '';
$required = $required? ' required' : '';
$placeholder = is_null($placeholder)? '' : " placeholder=\"$placeholder\"";

echo <<<TEXT
<div class="flex$vert">
	<label for="$id">$label</label>
	<input id="$id" class="fill" type="$type" name="$name"$value$placeholder$required$focus>
TEXT;
if (!is_null($suffix)) { echo "<span class=\"suffix flex-y flex-o\">$suffix</span>"; }
?>
</div>
