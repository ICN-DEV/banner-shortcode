<?php
/**
 * Plugin Name: Banner Shortcode
 * Description: A custom plugin for embedding a banner with dynamic content.
 * Version: 2.9.0
 * Author: Dicky Pratama A
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('banner_customs_shortcode')) {
function banner_customs_shortcode($atts) {
    $defaults = array(
        'banner_copy' => 'Default Banner Copy',
        'button_url' => 'https://coinvestasi.com/',
        'button_label' => 'Default Button Label',
        'banner_image' => 'https://wp.coinvestasi.com/wp-content/uploads/2025/07/Banner_822x192.jpg',
        'banner_image_mobile' => '',
        'banner_url' => 'https://icn-dev.github.io/banner-shortcode/banner.html',
        'iframe_height' => 200,
    );

    $atts = shortcode_atts($defaults, $atts, 'banner_customs');

    // Trust user URL if it starts with http(s). Only strip control chars.
    // esc_url_raw is too aggressive with long URLs containing percent-encoded segments (e.g. Supabase paths with %20).
    $sanitize_url = static function($value, $fallback = '') {
        $value = trim((string) $value);
        if ('' === $value) {
            return $fallback;
        }
        $value = preg_replace('/[\x00-\x1F\x7F<>"\']/', '', $value);
        return preg_match('#^https?://#i', $value) ? $value : $fallback;
    };

    $banner_url = $sanitize_url($atts['banner_url'], $defaults['banner_url']);

    $requested_height = absint($atts['iframe_height']);
    $iframe_height = $requested_height > 0 ? $requested_height : (int) $defaults['iframe_height'];
    $iframe_height = max(157, $iframe_height);

    $banner_image = $sanitize_url($atts['banner_image'], $defaults['banner_image']);
    $banner_image_mobile = $sanitize_url($atts['banner_image_mobile'], $banner_image);

    $query_args = array(
        'banner_copy' => sanitize_text_field($atts['banner_copy']),
        'button_url' => $sanitize_url($atts['button_url'], $defaults['button_url']),
        'button_label' => sanitize_text_field($atts['button_label']),
        'banner_image' => $banner_image,
        'banner_image_mobile' => $banner_image_mobile,
    );

    $dynamic_url = add_query_arg($query_args, $banner_url);

    return sprintf(
        "<iframe src='%s' style='width: 100%%; height: %dpx; border: none;'></iframe>",
        esc_url($dynamic_url),
        $iframe_height
    );
}
}

// Register the shortcode only if it hasn't been claimed by another plugin.
if (!shortcode_exists('banner_customs')) {
    add_shortcode('banner_customs', 'banner_customs_shortcode');
}
