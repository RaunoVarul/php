<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/18/2017
 * Time: 9:12
 */
// useful function for this class
function fixUrl($val)
{
    return urlencode($val);
}
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
    // add if exists
    var $aie = array('sid'=>'sid');

    function __construct(){
        parent ::__construct();
        $this ->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }//constructor
    // create http data pairs and merge them
    //merge is realised by &$link
    function addToLink(&$link, $name, $val){
        //if link is not empty - pair is created
        if ($link != ''){
            $link.=$this->delim; //$link = $link.$this->delim;
        }
        //create pair: element_name = element_value
        $link = $link.fixUrl($name).$this->eq.fixUrl($val);
    }//addToLink end

    function getLink($add = array(), $aie = array(), $not = array()){
        $link = '';
        foreach ($add as $name => $val){
            $this->addToLink($link, $name, $val);
        }
        foreach($aie as $name){
            $val = $this->get($name);
            if($val !== false){
                $this->addToLink($link, $name, $val);
            }
        }
        foreach($this->aie as $name){
            $val = $this->get($name);
            if($val !== false and !in_array($name, $not)){
                $this->addToLink($link, $name, $val);
            }
        }
        // control, is link not empty - pairs is created
        if($link != ''){
            $link = $this->baseUrl.'?'.$link; // http://IP/path_to_script.php?name=value
        } else {
            $link = $this->baseUrl;
        }
        return $link; // return created link to base program
    }// getLink

}//class end
?>