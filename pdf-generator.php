<?php
/*
Plugin Name: PDF Generator
Plugin URI: http://www.hemmes.it/wordpress-pdf-generator/
Description: Plugin to create PDF files
Version: 0.3
Author: Maarten Hemmes - Hemmes.IT
Author URI: http://www.hemmes.it
License: A "Slug" license name e.g. GPL2
*/

//TODO: catch errors
//TODO: add query builder

//PDF Library function directory
require WP_PLUGIN_DIR.'/'.plugin_basename('/pdf-generator/MPDF/mpdf.php');

include ('includes/settings.class.php');
include ('includes/admin.class.php');
include ('includes/generator.class.php');
include('API/init_api.php');

$settings = new pdf_generator_settings();
$admin = new pdf_generator_admin();
?>