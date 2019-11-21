<?php

add_filter('acf/settings/save_json', 'acf_store_path');

add_filter('acf/settings/load_json', function(){ return [ acf_store_path() ]; });

function acf_store_path(){
    return resource_path('acf-json');
}

add_action('plugins_loaded', function() {
    acf_add_options_page([
        'page_title' => 'Weather Widget',
        'icon_url' => 'dashicons-cloud',
    ]);
    acf_add_options_page([
        'page_title' => 'Global Options',
        'icon_url' => 'dashicons-admin-site',
    ]);
});