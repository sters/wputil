<?php
namespace WPUtil\Rest;

interface RestAPI
{
    public function getNamespace();
    public function getEndpoint();
    public function getMethod();
    public function handle(\WP_REST_Request $request);
}
