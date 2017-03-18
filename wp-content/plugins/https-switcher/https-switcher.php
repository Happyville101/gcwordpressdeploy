<?php
/*
Plugin Name: Https Switcher Plugin
Description: Force http/https for resources, depending on the scheme you use.
Version: 0.3
Author: Janiko
Author URI: http://geba.fr
License: GPL2
*/


class Https_Switch_Plugin
{
    public function __construct()
    {
        add_filter('the_content', array($this, 'https_switch_content')) ;
        add_filter('style_loader_tag', array($this, 'https_switch_style')) ;
        add_filter('style_loader_src', array($this, 'https_switch_style')) ;
        add_filter('script_loader_tag', array($this, 'https_switch_style')) ;
        add_filter('script_loader_src', array($this, 'https_switch_style')) ;
    }

    public function https_switch_content($content)
    {
        $base_http = home_url($path = '/', $scheme = http);
        $base_https =  home_url($path = '/', $scheme = https);
        if ($_SERVER["HTTPS"] == 'on')
                $content = str_ireplace($base_http, $base_https, $content);
        else
                $content = str_ireplace($base_https, $base_http, $content);
        return $content;
    }

    public function https_switch_style($style)
    {
        $base_http = home_url($path = '/', $scheme = http);
        $base_https =  home_url($path = '/', $scheme = https);
        if ($_SERVER["HTTPS"] == 'on')
                $style = str_ireplace($base_http, $base_https, $style);
        else
                $style = str_ireplace($base_https, $base_http, $style);
        return $style;
    }
}

new Https_Switch_Plugin();

?>
