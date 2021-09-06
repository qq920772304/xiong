<?php

namespace extend;

class Session
{
    /**
     * 构造函数
     * 开启Session
     */
    public function __construct(){
        session_start();
    }
    /**
     * 设置Session
     * @param $name
     * @param $data
     * @return mixed
     */
    public function set($name,$data){
        return $_SESSION[$name] = $data;
    }
    /**
     * 获取Session
     * @param $name
     * @return mixed
     */
    public function get($name){
        return $_SESSION[$name];
    }
    /**
     * 销毁Session
     * @param $name
     */
    public function destroy($name){
        unset($_SESSION[$name]);
    }
}