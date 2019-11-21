<?php
add_action('init', function () {
	register_nav_menus(
		[
			'primary-menu'   => 'Primary Menu',
		]);
});
