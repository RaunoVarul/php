<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/19/2017
 * Time: 12:42
 */

class mysql
{//class begin
    //class variables
    var $conn= false; //connection to database server
    var $host= false; //database server name /ip
    var $user = false; //database server user
    var $pass = false;
    var $dbname = false;

    //class method
    // construct

    function __construct($h, $u, $p, $dn){
        $this->host = $h;
        $this->user = $u;
        $this->pass = $p;
        $this->dbname = $dn;
    }

    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->conn){
            echo 'Probleem andmebaasi ühendusega <br />';
            exit;
        }
    }

}