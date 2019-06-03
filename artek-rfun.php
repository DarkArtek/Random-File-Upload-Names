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

if( ! class_exists( 'artek_rfun' ) ) {
    final class artek_rfun {
        public function __construct() {
            $this->artek_rfun__define_constants();
            $this->artek_rfun__includes();
        }

        private function artek_rfun__define_constants() {
            define( 'artek_rfun__directory', __DIR__ );
            define( 'artek_rfun__full_name', 'Random File Upload Names' );
        }

        private function artek_rfun__includes() {
            $dir = scandir( artek_rfun__directory . '/includes' );
            if( $dir ) {
                foreach( $dir as $module ) {
                    $path = artek_rfun__directory . '/includes';
                    if( $path && substr( $module, 0, 1 ) !== '.' ) {
                        $file = '/' . $module;
                        if( is_readable( $path . $file ) ) {
                            include_once( $path . $file );
                        }
                    }
                }
            }
        }
    }
}

new wpza_rfun();