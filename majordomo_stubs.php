<?php
$objects_db = [];
$said = [];
$params = [];

function say($message)
{
	global $said;
	$said[] = $message;
}

function addClass($className)
{
	global $objects_db;
	$objects_db[$className] = [];
}

function addClassObject($className, $objectName)
{
	global $objects_db;
	$objects_db[$className][$objectName] = ['TITLE' => $objectName];
}

function getObjectsByClass($className)
{
	global $objects_db;
	return $objects_db[$className];
}

function sg($path, $value)
{
	global $objects_db;
	$keys = explode('.', $path);
	if (count($keys) == 2) { // object.property
		$objectName = $keys[0];
		$propertyName = $keys[1];
		foreach ($objects_db as $className => &$objects) {
			echo "class $className objects:\n";
			var_dump($objects);
			if (isset($objects[$objectName])) {
				echo "Setting property $propertyName to $value\n";
				$objects[$objectName][$propertyName] = $value;
			}
		}
	}
}

function gg($path)
{
	global $objects_db;
	$keys = explode('.', $path);
	if (count($keys) == 2) { // object.property
		$objectName = $keys[0];
		$propertyName = $keys[1];
		foreach ($objects_db as $className => $objects) {
			echo "gg: class $className objects:\n";
			var_dump($objects);
			if (isset($objects[$objectName])) {
				return $objects[$objectName][$propertyName];
			}
		}
	}
	return null;
}

// Getting params
$options = getopt('s:p::');
$script_name = $options["s"];
$params = [];
if ($options["p"]) {
	$pairs = explode('&', $options["p"]);
	foreach ($pairs as $p) {
		$values = explode('=', $p);
		$params[$values[0]] = $values[1];
	}
}
echo "Params: \n";
var_dump($params);
