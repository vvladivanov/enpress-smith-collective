<?php

function is_wplogin(){
	$ABSPATH_MY = str_replace(array('\\','/'), DIRECTORY_SEPARATOR, ABSPATH);
	return ((in_array($ABSPATH_MY.'wp-login.php', get_included_files()) || in_array($ABSPATH_MY.'wp-register.php', get_included_files()) ) || (isset($_GLOBALS['pagenow']) && $GLOBALS['pagenow'] === 'wp-login.php') || $_SERVER['PHP_SELF']== '/wp-login.php');
}

if (true === env('MAINTENANCE_MODE', false)) {
	add_action('init', function () {
		if (!is_wplogin() && !is_user_logged_in()) {
			wp_die(
				file_get_contents(base_path('resources/views/maintenance.php')),
				'Smith Collective - Website under maintenance',
				['response' => 200]
			);
	    }
	});
}