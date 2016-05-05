<?php

require_once "majordomo_stubs.php";

require_once("{$script_name}.php");

echo "Objects:\n";
var_dump($objects_db);
echo "Said:\n";
foreach ($said as $s) {
	echo "$s\n";
}
