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

        function query($sql){
            $res = mysqli_query($this->conn, $sql);//sql query
            if($res === FALSE){
                echo 'Viga päringus <b>'.$sql.'</b><br />';
                echo mysqli_error($this->conn).'<br />';
                exit;
            }
            return $res;
        }// query

        // query with data result
        function getArray($sql){
            $res = $this->query($sql);
            $data = array();
            while($record = mysqli_fetch_assoc($res)){
                $data[] = $record;
            }
            if(count($data) == 0){
                return false;
            }
            return $data;
        }// getArray
    }

}