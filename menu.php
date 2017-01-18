<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/18/2017
 * Time: 10:54
 */
//menu.php - create page menu
// create menu template objects
// for menu and menu items
$menu = new template('menu.menu');
$item = new template('menu.item');
// add pairs of item template element names and real values
$item->set('name', 'Esimene leht');
$link = $http->getLink(array('page'=>'first'));
$item->set('link', $link);
//control created item output
echo '<pre>';
print_r($item);
echo '</pre>';
echo $item->parse();
?>