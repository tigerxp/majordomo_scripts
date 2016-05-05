<?php
$idesp = $params['idesp'];
$hostname = $params['hostname'];
if (!$idesp || !$hostname) {
	return;
}

say('ESP node received: ' . $hostname);
addClass('ESP8266');
addClassObject('ESP8266', $hostname);
sg($hostname . '.idesp', $idesp);
$esp = getObjectsByClass('ESP8266');
foreach ($esp as $obj) {
	if (gg($obj['TITLE'] . '.idesp') == $idesp) //
	{
		if (is_array($params)) {
			$updated = time();
			sg($obj['TITLE'] . '.updated', date('Y-m-d H:i:s', $updated));
			sg($obj['TITLE'] . '.timestamp', $updated);
			foreach ($params as $k => $v) {
				if ($k != "script") {
					sg($obj['TITLE'] . "." . $k, $v);
				}
			}
		}
	}
}
