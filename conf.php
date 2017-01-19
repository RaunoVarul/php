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
define('DEFAULT_ACT', 'default'); // default act file name
require_once CLASSES_DIR.'template.php'; // import template class
require_once CLASSES_DIR.'http.php'; // import http class
require_once CLASSES_DIR.'linkobject.php'; // import linkobject class
// create and output http object from linkobject class
$http = new linkobject();
?>