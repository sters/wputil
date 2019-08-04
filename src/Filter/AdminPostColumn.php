<?php
namespace WPUtil\Filter;

class AdminPostColumn extends Filter {
    private $columnName;
    private $columnHook;
    private $columnDisplayName;

    public function __construct($name, $displayName, $hook)
    {
        $this->columnName = $name;
        $this->columnDisplayName = $displayName;
        $this->columnHook = $hook;
    }

    public function add()
    {
        $name = $this->columnName;
        $displayName = $this->columnDisplayName;
        $hook = $this->columnHook;

        add_filter('manage_posts_columns', function ($columns) use ($name, $displayName) {
            $columns[$name] = $displayName;
            return $columns;
        });

        add_filter('manage_posts_custom_column', function ($columnName, $postId) use ($name, $hook) {
            if ($columnName == $name) {
                $hook($postId);
            }
        });

        add_filter('admin_head', function () use ($name) {
            echo '<style type="text/css">';
            echo '.column-' . attribute_escape($name) . ' { width: 80px !important; }';
            echo '</style>';
        });
    }
}
