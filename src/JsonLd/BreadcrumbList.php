<?php
namespace WPUtil\JsonLd;

class BreadcrumbList extends Jsonizer
{
    public function __construct()
    {
        $this['@context'] = 'http://schema.org';
        $this['@type'] = 'BreadcrumbList';
        $this['itemListElement'] = [];
    }

    public function addItem($item = ['url' => '', 'name' => ''])
    {
        $this['itemListElement'][] = [
            '@type' => 'ListItem',
            'position' => count($this->json['itemListElement']) + 1,
            'item' => [
                '@id' => $item['url'],
                'name' => $item['name'],
            ],
        ];
    }
}
