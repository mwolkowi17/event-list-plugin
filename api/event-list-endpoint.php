<?php
register_rest_route('event-list-plugin/v1', '/test1', array(
    'methods' => 'GET',
    'callback' => 'handle_get_all1',
    // 'permission_callback' => function () {
    //     return current_user_can('edit_others_posts');
    // }
));

function handle_get_all1($data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "event_list";
    $user = $wpdb->get_results("SELECT * FROM $table_name");

    return $user;
}
