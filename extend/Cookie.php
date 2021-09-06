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
     * @param $expire
     * @param $path
     * @param $domain
     * @return bool
     */
    public function set($name,$data,$expire,$path,$domain){
        if($expire){
            $this->expire;
        }
        if($path){
            $this->path = $path;
        }
        if($domain){
            $this->domain = $domain;
        }
        return setcookie($name,$data,$expire,$path,$domain);
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