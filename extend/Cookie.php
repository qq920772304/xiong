<?php

namespace extend;

class Cookie
{
    // 过期时间
    private $expire;
    // cookie存储路径
    private $path;
    // 域名
    private $domain;

    /**
     * 构造函数
     * 初始化域名与过期时间
     */
    public function __construct()
    {
        $this->expire = time()+(12*60*60);
        $this->domain = $_SERVER['SERVER_NAME'];
    }

    /**
     * 设置Cookie
     * @param $name
     * @param $data
     * @param $options
     * @return bool
     */
    public function set($name,$data,$options){
        if(array_key_exists("expire",$options)){
            $this->expire = $options['expire'];
        }
        if(array_key_exists("path",$options)){
            $this->path = $options['path'];
        }
        if(array_key_exists("domain",$options)){
            $this->domain = $options['domain'];
        }

        if(is_array($data)){
            $data = json_encode($data);
        }
        return setcookie($name,$data,$this->expire,$this->path,$this->domain);
    }

    /**
     * 获取cookie
     * @param $name
     * @return mixed
     */
    public function get($name){
        return $_COOKIE[$name];
    }

    /**
     * 销毁Cookie
     * @param $name
     */
    public function destroy($name){
        setcookie($name,"",time()-100);
    }
}