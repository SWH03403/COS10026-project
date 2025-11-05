#!/bin/sh
set -ue
cd "$(dirname "$0")"
ENTRY='init.php'
ADDRESS='127.0.0.1:9524'

_err() { echo "Err: $1!" >&2; exit 1; }

for php in \
	"$(which php 2>dev/null)" \
	'/bin/php' \
	'/usr/bin/php' \
	'/c/xampp/php/php' \
	'/c/program files/php/php' \
	'/c/program files (x86)/php/php'
do
	[ -x "$php" ] && break
done

if [ -z "$php" ]; then
	echo 'Error: Failed to find `php` executable!'
	exit 1
fi

[ $# -gt 0 ] && exec "$php" "$ENTRY" "$@"
exec "$php" --server "$ADDRESS" "$ENTRY"
