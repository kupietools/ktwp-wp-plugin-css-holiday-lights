<?php
/*
Plugin Name: Kupietools CSS Holiday Lights
Description: Creates an interactive pure CSS string of holiday lights across the top of the screen
Version: 1.0
Author: Michael Kupietz
Author URI: https://michaelkupietz.com
Kupietools Framework Version: 2025-aug-9
Plugin URI: https://michaelkupietz.com/?p=12640
Codepen demo: https://codepen.io/kupietz/pen/dPbNywN

TO THE USER INSTALLING THIS PLUGIN: 
In the /js/script.js file, the constant "htmlToInsert", which creates the HTML used to create the 
lights, contains an HTML comment crediting the author by name and URL, visible if anyone looks at
your site's underlying HTML code in their browser's Inspector. As I'm aware some WP performance 
plugins remove HTML comments, you're welcome to remove that comment before using this on your site. 
However, I'd like it if you would leave it in.

*/

// Prevent direct access
if (!defined('ABSPATH')) { 
    exit;
}

/* REMOVED KUPIETOOLS FRAMEWORK SECTIONS 1, 2, 3 - not using for holiday lights 2025 */
 
/* * * * * DON'T MESS WITH ANYTHING BELOW HERE UNLESS YOU KNOW WHAT YOU ARE DOING * * * * */

function ktwp_css_holiday_lights_enqueue_css() {
    wp_enqueue_style('ktwp_css_holiday_lights-styles', plugins_url('css/style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'ktwp_css_holiday_lights_enqueue_css');

function ktwp_css_holiday_lights_enqueue_assets() {
    wp_enqueue_script('ktwp_css_holiday_lights-script', plugins_url('js/script.js', __FILE__), array('jquery'), '1.0', array('in_footer' => true,'strategy'  => 'defer'));
}

add_action('wp_enqueue_scripts', 'ktwp_css_holiday_lights_enqueue_assets');

/* NOTE: If you really wanted to completely avoid javascript, replace the above add_action by checking 
   for the wp_body_open hook and using that if it's available, and falling back to javascript for the 
   small percentage of WP sites on WP or theme versions that don't support it: 
 
 <?php
function insert_lightrope_html() {
    ?>
    <ul id="lightrope">
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li class="broken"><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    <li><div></div></li>
    </ul>
    <?php
}

// Try to use wp_body_open hook
add_action('wp_body_open', 'insert_lightrope_html');

// Fallback: Check if wp_body_open was actually called
function lightrope_fallback_check() {
    static $wp_body_open_called = false;
    
    if (!$wp_body_open_called && !did_action('wp_body_open')) {
        // wp_body_open hook was never called, use JavaScript fallback
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var htmlToInsert = '<ul id="lightrope"><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li class="broken"><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li></ul>';
            document.body.insertAdjacentHTML('afterbegin', htmlToInsert);
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'lightrope_fallback_check');

   This could be made even more efficient by storing the lightrope HTML in a variable so you don't 
   have to specify it twice, but I'm just trying to crank this out right now. 
*/ 
