<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/18/2017
 * Time: 14:46
 */
//get act element value from url
$act = $http->get('act');
//define act file path according to the element value
$fn = ACTS_DIR.str_replace('.','/',$act).'.php';
// control act file
if(file_exists($fn) and is_file($fn) and is_readable($fn)){
    // import act file
    require_once $fn;
} else {
    // use default act
    // define default act file path
    $fn = ACTS_DIR.DEFAULT_ACT.'.php';
	// define new value for act element in url
	$http->set('act', DEFAULT_ACT);
	// use default act
    require_once $fn;
}

?>