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
//menu item creation - begin
// add pairs of item template element names and real values
$item->set('name', 'Esimene leht');
$link = $http->getLink(array('act'=>'first'));
$item->set('link', $link);
//control created item output
/*echo '<pre>';
print_r($item);
echo '</pre>';*/
$menu->set('items', $item->parse());
//menu item creation - end
//
//menu item creation - begin
// add paris of item template element names and real values
$item->set('name', 'Teine leht');
$link = $http->getLink(array('act'=>'second'));
$item->set('link', $link);
// control created menu output
/* echo '<pre>';
print_r($item);
echo '</pre>';*/
//add menu item to menu
$menu->add('items', $item->parse());
// menu item creation - end
//
//control created menu output
/*echo '<pre>';
print_r($menu);
echo '</pre>';*/
//output menu
//echo $menu->parse();
?>