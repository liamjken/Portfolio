<?php 
//testing
function create_portfolio_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'portfolio_item';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        title varchar(255) NOT NULL,
        category varchar(255),
        github_link varchar(255),
        live_link varchar(255),
        `desc` text,
        image_url varchar(255),
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}