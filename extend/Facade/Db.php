<?php

namespace extend\Facade;

class Db
{
    /**
     * 静态查询数据库数据
     * @param $sql string sql语句
     * @param int $type int 0全部取出 1取一条数据
     * @return array
     */
    public static function query($sql,$type = 0){
        $db = new \extend\Db();
        $rows = $db->query($sql,$type);
        return $rows;
    }

    /**
     * 执行一条sql得到影响行数
     * @param $sql string sql语句
     * @return false|int 影响行数
     * @throws \Exception
     */
    public static function exec($sql){
        $db = new \extend\Db();
        $num = $db->exec($sql);
        return $num;
    }
}