<?php

/**
 * Copyright (c) 2011, Frank Karlitschek <karlitschek@kde.org>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

require_once('../../../lib/base.php');
OC_Util::checkAdminUser();

$sites = array();
for ($i = 0; $i < sizeof($_POST['site_name']); $i++) {
	if (!empty($_POST['site_name'][$i]) && !empty($_POST['site_url'][$i])) {
		array_push($sites, array($_POST['site_name'][$i], $_POST['site_url'][$i]));
	}
}

if (sizeof($sites) == 0)
	OC_Appconfig::deleteKey('external', 'sites');
else
	OC_Appconfig::setValue('external', 'sites', json_encode($sites));

echo 'true';
?>
