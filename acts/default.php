<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/18/2017
 * Time: 15:18
 */

echo 'default faili sisu <br />';
$page_id = $http->get('page_id'); //get page id from url
//get page content from fb according to page_id
$sql = 'SELECT * FROM content where content_id="'.$page_id.'"';
// query to db
$res = $db->getArray($sql);
// if query has result
if($res !== FALSE){
    // control result test output
    $page = $res[0];
    $http->set('content', $page['content']);
}
?>