<?php

namespace extend\Facade;

class Cookie
{
    /**
     * 设置Cookie
     * @param $name
     * @param $data
     * @param $options array expire过期时间，path存储路径，domain域名
     * @return bool
     */
    public static function set($name,$data,$options = array()): bool
    {
        $cookie = new \extend\Cookie();
        return $cookie->set($name,$data,$options);
    }

    /**
     * 获取Cookie
     * @param $name
     * @return mixed
     */
    public static function get($name){
        $cookie = new \extend\Cookie();
        $str = $cookie->get($name);
        json_decode($str);
        if(json_last_error() == JSON_ERROR_NONE){
            return  json_decode($str,true);
        }else{
            return $str;
        }
    }

    /**
     * 销毁Cookie
     * @param $name
     */
    public static function destroy($name){
        $cookie = new \extend\Cookie();
        $cookie->destroy($name);
    }
}