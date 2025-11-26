<?php

/*
Plugin Name: Event List Plugin
Description: Event list sign up plugin.
Version: 1.0
Author: Web-workshop.eu
*/

register_activation_hook(__FILE__, 'elp_activate');

function elp_activate()
{
    // Code to create database tables
    require_once plugin_dir_path(__FILE__) . 'includes/elp-database-setup.php';
    elp_create_table();
}

add_shortcode('sign_form_1_wolek', 'elp_render_reservation_form');

function elp_render_reservation_form()
{
    ob_start(); // Start output buffering

    // Include the form template
    include plugin_dir_path(__FILE__) . 'templates/sign-form1.php';

    return ob_get_clean(); // Return the form HTML
}

// Hook for logged-in users
add_action('admin_post_nopriv_elp_submit_reservation', 'elp_handle_reservation_submission');
// Hook for non-logged-in users
add_action('admin_post_elp_submit_reservation', 'elp_handle_reservation_submission');

function elp_handle_reservation_submission()
{
    // Verify nonce for security
    if (! isset($_POST['elp_reservation_nonce']) || ! wp_verify_nonce($_POST['elp_reservation_nonce'], 'elp_submit_reservation_action')) {
        wp_die('Security check failed');
    }

    // Sanitize and validate form data
    $user_name = sanitize_text_field($_POST['user_name']);
    $user_email = sanitize_email($_POST['user_email']);

    // Save to database
    global $wpdb;
    $table_name = $wpdb->prefix . 'event_list';

    $wpdb->insert(
        $table_name,
        array(
            'user_name' => $user_name,
            'user_email' => $user_email,
        )
    );
    // Redirect user after submission
    wp_redirect(home_url('/thank-you-page/')); // Create a thank you page first
    exit;
}

function enrolled_people_list()
{
    $page_title = 'Event_peoples';
    $menu_title = 'Event_people_list';
    $capability = 'manage_options';
    $menu_slug  = 'event-people-list';
    $function   = 'enrolled_people_list_page';
    $icon_url   = 'dashicons-businessman';
    $position   = 5;
    add_menu_page(
        $page_title,
        $menu_title,
        $capability,
        $menu_slug,
        $function,
        $icon_url,
        $position
    );
}

//template pokazujący się w menu
function enrolled_people_list_page()
{
    include plugin_dir_path(__FILE__) . 'templates/enrolled-people-list-page.php';
}

add_action('admin_menu', 'enrolled_people_list');

wp_enqueue_style('enroll-style', plugin_dir_url(__FILE__) . 'templates/style.css', array(), '1.0');
