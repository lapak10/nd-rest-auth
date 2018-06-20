<?php defined('ABSPATH') or exit;

function remove_table(){
    global $wpdb,$table_prefix;
    $table_name = $table_prefix . "anand_table";
    $sql = "DROP TABLE IF EXISTS $table_name;";
    $wpdb->query($sql);
}