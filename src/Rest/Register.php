<?php
namespace WPUtil\Rest;

class Register
{
    private $apis = [];

    public function add(RestAPI $api)
    {
        $this->apis[] = $api;
    }

    public function register()
    {
        $apis = $this->apis;
        add_action('rest_api_init', function () use ($apis) {
            foreach ($apis as $api) {
                register_rest_route(
                    $api->getNamespace(),
                    $api->getEndpoint(),
                    [
                        'methods' => $api->getMethod(),
                        'callback' => function ($req) use ($api) {
                            return $api->handle($req);
                        },
                    ]
                );
            }
        });
    }
}
