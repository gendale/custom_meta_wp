<?php

/**
 * general CG meta plugin Core tests
 */

require_once '../index.php';

class WP_Test_WordPress_Plugin_Tests extends WP_UnitTestCase {

    /**
     * Run a simple test to ensure that the tests are running
     */
     function test_tests() {

        $this->assertTrue( true );

     }

}

/*
class fetch_test extends PHPUnit_Framework_TestCase
{
    public $input;

    public function setUp()
    {
        $the_class = new CG_Meta('test_meta_box', 'test car fields', 'Ads');
        do_action('wp_insert_post');
        $this->input = $the_class->test_mapper($input);
    }

    function testFailure()
    {
        $this->assertEmpty($this->input);
    }
}


*/