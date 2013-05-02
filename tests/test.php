<?php 

require_once '../index.php';


/*
class varTest extends PHPUnit_Framework_TestCase
{
    var $instance;

    public function varTest($name)
    {
        $this->PHPUnit_TestCase($name);

        // constructor
    }

    public function setUp()
    {
        $this->instance = new CG_Meta('first_meta_box', 'Car Meta Fields', 'Ads');
    }

    function tearDown()
    {
        unset($this->instance);
    }

    function  varValue()
    {
        $this->assertTrue(1==1);
    }
}

$suite = new PHPUnit_Framework_TestSuite("testVar");
$result = PHPUnit::run($suite);

echo $result->toString();
*/

class fetch_test extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $iran = new CG_Meta('first_meta_box', 'Car Meta Fields', 'Ads');
    }


}

