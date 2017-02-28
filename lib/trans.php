<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 2/28/2017
 * Time: 14:58
 */

function tr($txt)
{
    static $trans = false; // static - jatab vaartuse meelde, kui funktsioon juba ei toota - lang fail loetakse ainult esimene kord

    // kui vaikimisi keel
    if(LANG_ID == DEFAULT_LANG)
    {
        return $txt;
    }

    // kui ei ole -otsida vastav lang file

    if($trans === false)
    {
        $fn = LANG_DIR.'lang_'.LANG_ID.'.php';
        if(file_exists($fn) and is_file($fn) and is_readable($fn))
        {
            require_once($fn);
            $trans = $_trans; // lang_en.php saadud massiv
        }
        else
        {
            $trans = array();
        }
    }
    if(isset($trans[$txt]))
    {
        return $trans[$txt];
    }

    // juhul kui mingit vastavust pole - tagastatakse algteks

    return $txt;
}