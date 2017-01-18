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
// output act file path
echo $fn.'<br />';

?>