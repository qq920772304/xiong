<?php

namespace extend\Facade;

class Cookie
{
    /**
     * 设置Cookie
     * @param $name
     * @param $data
     * @param int $expire
     * @param string $path
     * @param string $domain
     * @return bool
     */
    public static function set($name,$data,$expire = 0,$path = "",$domain = ""): bool
    {
        $cookie = new \extend\Cookie();
        return $cookie->set($name,$data,$expire,$path,$domain);
    }

    /**
     * 获取Cookie
     * @param $name
     * @return mixed
     */
    public static function get($name){
        $cookie = new \extend\Cookie();
        return $cookie->get($name);
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