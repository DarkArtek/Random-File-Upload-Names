<?php
/*
Plugin Name: Random File Upload Names
Plugin URI: https://ahd-creative.com
Description: Artek Random File Upload Names provides your website randomised file names when you upload files into WordPress.
Version: 1.0.0
Author: Luca Forzutti
Author URI: https://www.ahd-creative.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
defined( 'ABSPATH' ) or die();

/* Change File Upload Names */
if( ! function_exists('artek_rfun_rename_uploaded_filename')) {
    function artek_rfun_rename_uploaded_filename( $filename ) {
        $ext = empty( pathinfo( $filename )['extension'] ) ? '' : '.' . pathinfo( $filename )['extension'];
        return substr( md5( $filename), 0, 8) . $ext;
    }
    add_filter( 'sanitize_file_name', 'artek_rfun_rename_uploaded_filename', 10);
}