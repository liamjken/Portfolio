<?php 

function port_rest_api_init() {

register_rest_route('port/v1', '/portfolio', [
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'port_rest_api_handler',
    'permission_callback' => '__return_true'
]);

}