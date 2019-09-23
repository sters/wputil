<?php
namespace WPUtil\Filter;

class RemoveThumbnailSize extends Filter
{
    protected $fields = [
        'rss2_head',
        'commentsrss2_head',
        'rss_head',
        'rdf_header',
        'atom_head',
        'comments_atom_head',
        'opml_head',
        'app_head',
    ];

    public function remove()
    {
        foreach ($this->fields as $action){
            remove_action($action, 'the_generator');
        }
    }
}
