<?php

namespace App\Classes;

use \PDO;

class DB
{
    private $dbh;
    private $className = 'StdClass';


    public function __construct()
    {
            $this->dbh = new PDO('mysql:dbname=test;host=localhost;charset=UTF8', 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }


     public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }


    public function execute($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}