<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/19/2017
 * Time: 12:35
 */
//framework configuration
// create and template object
define('CLASSES_DIR', 'classes/'); // classes path
define('TMPL_DIR', 'tmpl/'); // templates path
define('STYLE_DIR', 'css/'); // styles path
define('ACTS_DIR', 'acts/'); // acts path
define('LIB_DIR', 'lib/'); // lib path
define('DEFAULT_ACT', 'default'); // default act file name
// user roles
define('ROLE_NONE', 0);
define('ROLE_ADMIN', 1);
define('ROLE_USER', 2);

define('DEFAULT_LANG', 'et'); //default language
// import useful functions
require_once LIB_DIR.'utils.php';
require_once CLASSES_DIR.'template.php'; // import template class
require_once CLASSES_DIR.'http.php'; // import http class
require_once CLASSES_DIR.'linkobject.php'; // import linkobject class
require_once CLASSES_DIR.'mysql.php'; // import database class
require_once CLASSES_DIR.'session.php'; // import session class
require_once 'db_conf.php'; // import database configuration
// create and output http object from linkobject class
$http = new linkobject();
// create database object
$db = new mysql(DBHOST,DBUSER,DBPASS,DBNAME);
// create session object
$sess = new session($http, $db);

//oanguage support
//sites used langs

$siteLangs = array(
    'et' => 'estonian',
    'en' => 'english',
    'ru' => 'russian'
);

// get lang_id from url
$lang_id = $http->get('lang_id');
if(!isset($siteLangs[$lang_id])){
    // if such lang id is not supported
    $lang_id = DEFAULT_LANG;// use default lang - et
    $http->set('lang_id', $lang_id); // fix used lang_id
}
define('LANG_ID', $lang_id); //define useful constant which describe right now active lang
//language support
$lang_id = DEFAULT_LANG;
$http->set('lang_id', $lang_id);
?>