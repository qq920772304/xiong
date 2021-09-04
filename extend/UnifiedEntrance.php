<?php

namespace extend;

use Exception;

class UnifiedEntrance
{
    // 控制器
    private $controller;
    // 方法
    private $method;
    // 当前域名
    private $server_host;
    // 当前url地址
    private $request_uri;
    private $php_self;
    /**
     * 构造函数
     * UnifiedEntrance constructor.
     */
    public function __construct(){
        if(is_cli()){
            echo "仅止web请求，不支持cli模式";
            exit();
        }
        $this->controller = appConfig("controller");
        $this->method = appConfig("method");
        $this->server_host = $_SERVER['HTTP_HOST'];
        $this->request_uri = $_SERVER['REQUEST_URI'];
        $this->php_self = $_SERVER['PHP_SELF'];
    }

    /**
     * 统一入口
     * @throws Exception
     */
    public function entrance(){
        $self = explode("/",$this->php_self);
        $uri = explode("/",$this->request_uri);
        $k = 0;
        foreach ($self as $key => $value){
            if($value == "index.php"){
                $k = $key;
                break;
            }
        }
        if(array_key_exists($k,$uri) && $uri[$k] != ""){
            $this->controller = $uri[$k];
        }
        $k = $k+1;
        if(array_key_exists($k,$uri) && $uri[$k] != ""){
            $this->method = $uri[$k];
        }
        $controller = $this->controller;
        $method = $this->method;
        if(class_exists('\app\controller\\'.$controller)){
            $controller ='\app\controller\\'.$controller;
            $controller = new $controller;
            if(method_exists($controller,$method)){
                $controller->$method();
            }else{
                throw new Exception("{$method} 方法不存在，检查大小写是否正确",404);
            }
        }else{
            throw new Exception("{$controller} 控制器不存在，检查大小写是否正确",404);
        }
    }
    /**
     * 静态调用入口
     */
    public static function run(){
        try {
            $entrance = new UnifiedEntrance();
            $entrance->entrance();
        }catch (Exception $e){
            errorMsg($e);
        }
    }
}