<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/18/2017
 * Time: 9:12
 */
// only for testing
// require http
require_once 'http.php';
// only for testing
class linkobject extends http
{
    //class begins
    var $baseUrl = false; // base url
    var $protocol= 'http://'; //protocol for url
    var $delim= '&amp;'; // & html tag name1 = value1
    var $eq= '='; // = for url

    function __construct(){
        parent ::__construct();
        $this ->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }//constructor
    // create http data pairs and merge them
    //merge is realised by $link
    function addToLink($link, $name, $val){
        //if link is not empty - pair is created
        if ($link != ''){
            $link.=$this->delim; //$link = $link.$this->delim;
        }
        //create pair: element_name = element_value
        $link = $link.fixUrl($name).$this->eq.fixUrl($val);
        echo $link.'<br />';
    }//addToLink end
}//class end
?>