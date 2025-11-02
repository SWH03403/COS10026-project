<?php
function html_sanitize(string $data): string {
	return htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
