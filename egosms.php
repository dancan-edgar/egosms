<?php
/**
 * Plugin Name: Egosms
 * Description: The Egosms integrates the Ego Sms Bulk messaging platform in your wordpress website.
 * Plugin URI: https://github.com/dancan-edgar/egosms.git
 * Author: Ampeire Edgar
 * Version: 1.0.0
 * Author URI: https://github.com/dancan-edgar
 *
 * Text Domain: egosms
 *
 * @package Egosms
 * @author Ampeire Edgar
 * @license GPL-V2
 *
 * Egosms Plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Egosms Plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */


if(! defined('ABSPATH')){
    die("You dont have access!");
}


if(! class_exists('Egosms')){

    class Egosms {
        function register(){

        }
        function activate(){

        }
        function deactivate(){

        }
    }

    $egosms = new Egosms();

    $egosms->register();

    // Activation hook
    register_activation_hook(__FILE__,array($egosms,'activate'));

    // Deactivation hook
    register_deactivation_hook(__FILE__,array($egosms,'deactivate'));
}
