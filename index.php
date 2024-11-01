<?php

/*
 *  Plugin Name:  Testimonial Blocks
 *  Description:  Easy to use blocks for posting testimonials
 *  Version:      1.0.1
 *  Author:       Magda Sicknick
 *  Author URI:   https://www.magdasicknick.com/
 *  License:      GPLv3
 *  License URI:  https://www.gnu.org/licenses/gpl-3.0.html
 *  Text Domain:  testimonial-blocks
 */


// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Registers all block assets
 *
 */
function register_ms_testimonial_blocks() {

    if (!function_exists('register_block_type')) {
        // Gutenberg is not active.
        return;
    }

    wp_register_script(
            'testimonial-blocks', plugins_url('block.min.js', __FILE__), array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'underscore'), filemtime(plugin_dir_path(__FILE__) . 'block.min.js')
    );

    wp_register_style(
            'testimonial-blocks-editor', plugins_url('editor.min.css', __FILE__), array('wp-edit-blocks'), filemtime(plugin_dir_path(__FILE__) . 'editor.min.css')
    );

    wp_register_style(
            'testimonial-blocks', plugins_url('style.min.css', __FILE__), array(), filemtime(plugin_dir_path(__FILE__) . 'style.min.css')
    );

    register_block_type('testimonial-blocks/testimonial', array(
        'style' => 'testimonial-blocks',
        'editor_style' => 'testimonial-blocks-editor',
        'editor_script' => 'testimonial-blocks',
    ));

}

add_action('init', 'register_ms_testimonial_blocks');
