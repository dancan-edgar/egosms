<?php

/**
 * @package Egosms
 */

namespace Inc\Base;

class Activate {
    public static function activate()
    {
        //echo "Nice!";
        flush_rewrite_rules();
    }
}