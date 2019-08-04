<?php
namespace WPUtil\JsonLd;

class BreadcrumbList
{
    private $json;

    public function __construct()
    {
        $this->json = [];
        $this->json['@context'] = 'http://schema.org';
        $this->json['@type'] = 'BreadcrumbList';
        $this->json['itemListElement'] = [];
    }

    public function addItem($item = ['url' => '', 'name' => ''])
    {
        $this->json['itemListElement'][] = [
            '@type' => 'ListItem',
            'position' => count($this->json['itemListElement']) + 1,
            'item' => [
                '@id' => $item['url'],
                'name' => $item['name'],
            ],
        ];
    }

    public function removeItem($index)
    {
        $this->json[$index] = null;
        $this->json = array_filter($this->json);
    }

    public function getJson()
    {
        return json_encode($this->json);
    }
}
