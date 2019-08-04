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
    public function __construct($a=null)
    {
        error_log('this is fake.');
    }
}

function wp_get_post_tags($a=null, $b=null)
{
    error_log('this is fake.');
}
function get_permalink($a=null)
{
    error_log('this is fake.');
}
function get_the_author_meta($a=null, $b=null)
{
    error_log('this is fake.');
}
function get_template_directory_uri()
{
    error_log('this is fake.');
}
function add_action($a=null, $b=null)
{
    error_log('this is fake.');
}
function register_rest_route($a=null, $b=null, $c=null)
{
    error_log('this is fake.');
}
function add_filter($a=null, $b=null, $c = null, $d = null)
{
    error_log('this is fake.');
}
function remove_filter($a=null, $b=null)
{
    error_log('this is fake.');
}
function wp_deregister_script($a=null)
{
    error_log('this is fake.');
}
function wp_deregister_style($a=null)
{
    error_log('this is fake.');
}
function wp_dequeue_script($a=null)
{
    error_log('this is fake.');
}
function wp_dequeue_style($a=null)
{
    error_log('this is fake.');
}
function attribute_escape($a=null)
{
    error_log('this is fake.');
}
function wp_get_archives($a=null)
{
    error_log('this is fake.');
}
function paginate_links($a=null)
{
    error_log('this is fake.');
}
function get_categories($a=null)
{
    error_log('this is fake.');
}
function get_terms($a=null, $b=null)
{
    error_log('this is fake.');
}

function esc_html($a=null) {
    error_log('this is fake.');
}
function get_post_meta($a=null, $b=null, $c=null) {
    error_log('this is fake.');
}
function delete_post_meta($a=null, $b=null) {
    error_log('this is fake.');
}
function add_post_meta($a=null, $b=null, $c=null) {
    error_log('this is fake.');
}
function update_post_meta($a=null, $b=null, $c=null) {
    error_log('this is fake.');
}
