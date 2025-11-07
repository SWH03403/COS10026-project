#!/bin/sh
set -ue
cd "$(dirname "$0")"
ENTRY='init.php'
ADDRESS='127.0.0.1:9524'

_err() { echo "Err: $1!" >&2; exit 1; }

find_php() {
	for php in \
		'/bin/php' \
		'/usr/bin/php' \
		'/c/xampp/php/php' \
		'/c/program files/php/php' \
		'/c/program files (x86)/php/php'
	do
		[ -x "$php" ] && return
	done
	echo 'Error: Failed to find `php` executable!'
	exit 1
}

has_php && php='php' || find_php

[ $# -gt 0 ] && exec "$php" "$ENTRY" "$@"
exec "$php" --server "$ADDRESS" "$ENTRY"
