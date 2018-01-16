<?php
/*
 * @wordpress-plugin
 * Plugin Name:       All-in-One GDPR: Example Integration
 * Plugin URI:        https://github.com/Ideea-Technologies/All-in-One-GDPR-Integration
 * Description:       This is an example All-in-One GDPR integration
 * Version:           1
 * Author:            Anthony Budd, Ideea
 * Author URI:        http://ideea.co.uk/
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       all-in-one-gdpr
 */

function exampleIntegrationCallback(){
	require 'ExampleIntegration.php';
}

add_action('AIO_GDPR_booted', 'exampleIntegrationCallback');

