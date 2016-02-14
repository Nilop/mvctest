<?php

class DB
{
    //Подключение к базе данных в констуркторе класса
    public function __construct()
    {
        mysql_connect('localhost','root','');
        mysql_select_db('test');
    }

    //Получение массива объектов из БД заданного класса согласно запроса
    public function queryAll($sql, $class = 'stdClass')
    {
        $res = mysql_query($sql);
        if (false === $res) {
            return false;
        }
        $ret = [];
        while ($row = mysql_fetch_object($res, $class)){
            $ret[] = $row;
        }
        return $ret;
    }

    //Получение конкретного объекта из БД согласно запроса
    public function queryOne($sql, $class = 'stdClass')
    {
      return $this->queryAll($sql, $class = 'stdClass')[0];
    }

    //Выполнение любого запроса к БД
    public function queryAny($sql)
    {
        mysql_query($sql);
    }


}