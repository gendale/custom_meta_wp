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
 *
 *
 * Class CG_meta_box
 *
 */

class CG_Meta
{
    private $post;
    private $id;
    private $title;
    private $post_type;
    private $value;

    /**
     *   currently omitted vars45
     */
    private static $context = 'normal';
    private static $priority = 'default';
    private static $callback_args = null;

    public function __construct($id, $title, $post_type)
    {
        add_action( 'wp_insert_post', array(&$this,'save_post_data') );

        $this->title = $title;
        $this->post_type = $post_type;
        $this->id = $id;
        $this->populate_meta_box();

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

    public function populate_meta_box()
    {
        add_meta_box(
            $this->id,
            $this->title,
            array(&$this, 'render_meta_box'),
            $this->post_type,
            self::$context,
            self::$priority,
            self::$callback_args
        );
    }

    /**
     * @param $post
     * @return String Echo
     *
     * callback from the add_meta_box
     * renders box custom field on the admindr
     * panel post edit page
     */

    public function render_meta_box($post)
    {
        $this->post = $post; // todo: vprasaj se, ali je mogoce post dobiti ze v constructorju
        $this->value = get_post_meta($this->post->ID,'CG_custom_field', true);
        var_dump($post);

        //$this->value = get_post_meta($post->ID, 'CG_custom_field', true);
        var_dump(get_post_meta($post->ID));

        $second_D = get_post_meta($post->ID);
        var_dump($this->value);
        //todo - vprasaj se, ali ima concat kak smisel

        echo "<label for='field_content'>Car me</label>".
        "<input type='text' id='".$this->id."' name='$this->id' value='".$this->value."' />";
        //add_post_meta(18,'brueje', 'obvladalec');

    }

    public function save_post_data() {

        /**
         * @param1 int|post id
         * @param2 string|key of custom field
         * @param3 sting|new value
         */

        $variabl = $_POST[$this->id];
        $postID = get_the_ID();

        add_post_meta($postID, $variabl, 'carujem');
    }
}

// todo: one task per method!

