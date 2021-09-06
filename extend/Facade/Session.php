<?php

namespace extend\Facade;

class Session
{
    /**
     * 设置Session
     * @param $name
     * @param $data
     * @return mixed
     */
    public static function set($name,$data){
        $session = new \extend\Session();
        return $session->set($name,$data);
    }

    /**
     * 获取Session
     * @param $name
     * @return mixed
     */
    public static function get($name){
        $session = new \extend\Session();
        return $session->get($name);
    }

    /**
     * 销毁Session
     * @param $name
     */
    public static function destroy($name){
        $session = new \extend\Session();
        $session->destroy($name);
    }
}