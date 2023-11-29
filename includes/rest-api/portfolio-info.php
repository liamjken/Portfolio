<?php

function port_rest_api_handler(){
    global $wpdb;

    $table_name = $wpdb->prefix . 'portfolio_item';

    $query = "SELECT title, category, github_link, live_link, `desc`, image_url FROM $table_name";
    $results = $wpdb->get_results($query, ARRAY_A);

    $response = array();

    foreach ($results as $result) {
        $response[] = array(
            'title' => $result['title'],
            'category' => $result['category'],
            'github_link' => $result['github_link'],
            'live_link' => $result['live_link'],
            'desc' => $result['desc'],
            'image_url' => $result['image_url'],
        );
    }

return $response;
}