<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/18/2017
 * Time: 10:54
 */
// menu.php - create page menu
// create menu template objects
// for menu and menu itmes

$menu = new template('menu.menu'); // in menu directory is file menu.html menu/menu.html
$menu->set('items',false); // kui kasutaja ei ole sisselogitud, siis menüüd ei näe
$item = new template('menu.item');
// menu item creation - begin
// add pairs of item temlate element names and real values

//Menüü kuvamine
$sql = 'SELECT content_id, title FROM content WHERE'.
    'parent_id = 0 AND '.
    'show_in_menu = 1';

//Mitte adminile näitame ainult lubatud sisu, kui hidden on 1 -nähtav ainult adminile
if(ROLE_ID != ROLE_ADMIN)
{
    $sql.='AND is_hidden = 0';
}
$sql .= 'ORDER BY sort ASC';
$res = $db->getArray($sql);

if($res != false)
{
    foreach($res as $page)
    {
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link', $link);
        $item->set('name', tr($page['title']));
        $menu->add('items', $item->parse());
    }
}
// kui kasutaja on susteemisiseselt -kas admin või tavakasutaja
//tekitame temale voimaluse ka valja logida
if(USER_ID != ROLE_NONE)
{
    $link = $http->getLink(array('act'=>'logout'));
    $item->set('link', $link);
    $item->set('name', tr('Logi v&auml;lja'));
    $menu->add('items', $item->parse());
}

$tmpl->set('menu', $menu->parse());

?>