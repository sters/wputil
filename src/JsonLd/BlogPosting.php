<?php
namespace WPUtil\JsonLd;

class BlogPosting extends Jsonizer
{
    public function __construct()
    {
        $this['@context'] = 'http://schema.org';
        $this['@type'] = 'BlogPosting';
    }

    static function createFromWpPost($post)
    {
        $instance = new static();
        $instance['headline'] = $post->post_title;
        $instance['description'] = mb_substr(strip_tags($post->post_content), 0, 140) . '...';
        $instance['mainEntityOfPage'] = [
            '@type' => 'WebPage',
            '@id' => get_permalink($post),
        ];
        $instance['datePublished'] = $post->post_date;
        $instance['dateModified'] = $post->post_modified;
        $instance['author'] = [
            '@type' => 'Person',
            'name' => get_the_author_meta('nickname', $post->post_author),
        ];

        $logoUrl = get_template_directory_uri() . '/css/logo.png';
        $logoSize = getimagesize($logoUrl);
        $instance['image'] = $logoUrl;
        $instance['publisher'] = [
            '@type' => 'Organization',
            'name' => get_the_author_meta('nickname', $post->post_author),
            "logo" => [
                '@type' => 'ImageObject',
                'width' => "{$logoSize[0]}",
                'height' => "{$logoSize[1]}",
                'url' => $logoUrl,
            ],
        ];

        return $instance;
    }
}
