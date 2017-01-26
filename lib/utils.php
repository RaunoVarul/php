<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/26/2017
 * Time: 14:52
 */
// useful function for sql queries
function fixDb($val){
    return '"'.addslashes($val).'"';
}
?>