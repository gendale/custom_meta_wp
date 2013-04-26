<?php
/**
 * @package CG_Theme
 */
/*
Plugin Name: custom_meta_wp
Plugin URI: 
Description: 
Version: 1
Author: EH
Author URI: 

*/

/**
 * Class CG_meta_box
 *
 */

// http://codex.wordpress.org/Function_Reference/add_meta_box

class CG_Meta
{
    private $post;
    private $id;
    private $title;
    private $post_type;
    private $context = 'normal';

    public function __construct($id, $title, $post_type)
    {
        $this->id = $id;
        $this->title = $title;
        $this->post_type = $post_type;

        $generate_meta_box = $this->populate_meta_box($id, $title, $post_type);
    }

    /**
     * @param $id
     * @param $title
     * @param $post_type
     * @param string $context
     * @param string $priority
     * @param null $callback_args
     *
     * just a implementation of WP add_meta_box
     * standard function params used - less relevant params are ommited
     */

    public function populate_meta_box($id, $title, $post_type, $context='normal', $priority='default', $callback_args=null)
    {
        add_meta_box(
            $id,
            $title,
            self::render_meta_callback,
            $post_type,
            $context,
            $priority='default',
            $callback_args
        );
    }

    /**
     * @param $post
     * @return String Echo
     *
     * callback from the add_meta_box
     * renders box custom field on the admin
     * panel post edit page
     */

    private function render_meta_callback($post)
    {
        $value = get_post_meta($post->ID, 'CG_custom_field', true);
        // todo concatenate to single echo command
        echo "<label for='field_content'>Car me</label>";
        echo "<input type='text' id='field_content' name='CG_custom_field' value='".$value."' />";



    }

    public function save_post_data($id) {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && current_user_can('edit_posts') &&
            ( !wp_verify_nonce($_POST['CG_meta_nonce']))) {
            update_post_meta($id,'CG_custom_field',$_POST['CG_custom_field']);
        }
    }
}
