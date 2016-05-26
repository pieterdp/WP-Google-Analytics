<?php
/*
Plugin Name: Google Analytics
Plugin URI: http://www.helptux.be/plugins
Description: Google Analytics
Author: Pieter De Praetere
Version: 2.0
Author URI: http://www.helptux.be
License: GPL v. 3.0
*/
require_once('lib/html.php');

add_action('wp_footer', 'analytics_tag');

function ga_settings_init() {
    add_settings_section(
        'ga_settings_section',
        'Google Analytics',
        'ga_settings_callback',
        'writing'
    );

    add_settings_field(
        'ga_settings_tracking',
        'Tracking ID',
        'ga_settings_tracking_callback',
        'writing',
        'ga_settings_section'
    );

    register_setting('writing', 'ga_settings_tracking');
}

add_action('admin_init', 'ga_settings_init');

function ga_settings_callback() {
    echo '<p>Please provide your Google Analytics Tracking ID</p>';
}

function ga_settings_tracking_callback() {
    $input = '<label for="tracking_id" style="display:none">Tracking ID</label><input id="tracking_id" name="ga_settings_tracking" type="text" value="%s" />';
    echo sprintf($input, get_option('ga_settings_tracking'));
}
