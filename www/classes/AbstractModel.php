<?php

namespace App\Classes;

use App\Classes\DB;

abstract class AbstractModel
{
    static protected $table;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function  __isset($k)
    {
        return $this->data[$k];
    }

    public static function getAll()
    {
        $class = get_called_class(); //Получили имя класса который будет использовать текущий метод
        $db = new DB;
        $db->setClassName($class);
        return $db->query( 'SELECT * FROM ' . static::$table);
    }

    public static function getOneById($id)
    {
        $class = get_called_class(); //Получили имя класса который будет использовать текущий метод
        $db = new DB;
        $db->setClassName($class);
        return $db->query('SELECT * FROM ' . static::$table . ' WHERE id=:id', [':id'=>$id])[0];
    }

    public static function getByColumn($column, $value)
    {
        $class = get_called_class();
        $db = new DB();
        $db->setClassName($class);

        $sql = 'SELECT * FROM ' . static::$table . " WHERE " . $column . " LIKE '%". $value ."%'";
        $res = $db->query($sql);

        if (empty($res)) {
            $e = new E404Exception('Ничего не найдено...');
            throw $e;
        }

        return $res;

    }


    protected function insert()
    {
        /*Записываем в переменную $cols масcив состоящий из ключей свойства-массива объекта - $data
        Данный массив сформировался благодаря методу геттер  */
        $cols = array_keys($this->data);
        $data = [];

        /*в цикле формируем массив элементами вида :keys=>values*/
        foreach($cols as $col){
            $data[':' . $col] = $this->data[$col];
        }

        $sql = 'INSERT INTO ' . static::$table . '
         (' . implode(', ', $cols) . ')
         VALUES
         (' . implode(', ', array_keys($data)) . ')
        ';

        $db = new DB();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();

    }

    protected function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v) {
            $data[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $cols[] = $k . '=:' . $k;
        }

        $sql = 'UPDATE ' . static::$table . '
        SET ' . implode(', ', $cols) . '
        WHERE id=:id';

        $db = new DB();
        $db->execute($sql, $data);
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $data = [":id"=>$this->id];
        $db = new DB();
        $db->execute($sql, $data);
    }

    public  function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

}