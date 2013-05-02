<?php 
ob_start(); 
 

$path = 'C:\wamp\www\wp_testing\wordpress\wp-content\plugins\custom_meta_wp\tests\bootstrap.php'; 
 
if (file_exists($path)) {         
    $GLOBALS['wp_tests_options'] = array(
        'active_plugins' => array('myPlugin/index.php')
    );
    require_once $path;
} else {
    exit("Couldn't find wordpress-tests/bootstrap.phpn");
}