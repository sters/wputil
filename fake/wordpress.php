<?php

class WP_Query
{
    public function __construct($a = null)
    {
        error_log('this is fake.');
    }
}
class WP_REST_Request
{
    public function __construct($a)
    {
        error_log('this is fake.');
    }
}

function wp_get_post_tags($a, $b)
{
    error_log('this is fake.');
}
function get_permalink($a)
{
    error_log('this is fake.');
}
function get_the_author_meta($a, $b)
{
    error_log('this is fake.');
}
function get_template_directory_uri()
{
    error_log('this is fake.');
}
function add_action($a, $b)
{
    error_log('this is fake.');
}
function register_rest_route($a, $b, $c)
{
    error_log('this is fake.');
}
function add_filter($a, $b, $c = null, $d = null)
{
    error_log('this is fake.');
}
function remove_filter($a, $b)
{
    error_log('this is fake.');
}
function wp_deregister_script($a)
{
    error_log('this is fake.');
}
function wp_deregister_style($a)
{
    error_log('this is fake.');
}
function wp_dequeue_script($a)
{
    error_log('this is fake.');
}
function wp_dequeue_style($a)
{
    error_log('this is fake.');
}
function attribute_escape($a)
{
    error_log('this is fake.');
}
function wp_get_archives($a)
{
    error_log('this is fake.');
}
function paginate_links($a)
{
    error_log('this is fake.');
}
function get_categories($a)
{
    error_log('this is fake.');
}
function get_terms($a, $b)
{
    error_log('this is fake.');
}

function esc_html($a) {
    error_log('this is fake.');
}
function get_post_meta($a, $b, $c) {
    error_log('this is fake.');
}
function delete_post_meta($a, $b) {
    error_log('this is fake.');
}
function add_post_meta($a, $b, $c) {
    error_log('this is fake.');
}
function update_post_meta($a, $b, $c) {
    error_log('this is fake.');
}
