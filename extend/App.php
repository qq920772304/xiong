<?php

namespace extend;

class App
{
    // 定义全局参数
    var $parameter;
    // 前置操作
    public $preOperation = array();
    // 后置操作
    public $postOperation = array();

    /**
     * 开启cors跨域请求
     * @param string $content_type string Content-type
     * @param string $origin string Access-Control-Allow-Origin
     * @param string[] $methods string|array Access-Control-Request-Methods
     * @param string[] $headers string|array Access-Control-Allow-Headers
     */
    protected function cors($content_type = "application/json",$origin = "*",$methods = array('GET','POST','PUT','DELETE','OPTIONS'),$headers = array('x-requested-with','content-type')){
        header('Content-type: '.$content_type);
        header('Access-Control-Allow-Origin:'.$origin);
        if(is_array($methods)){
            $methods = implode(",",$methods);
        }
        header('Access-Control-Request-Methods:'.$methods);
        if(is_array($headers)){
            $headers = implode(",",$headers);
        }
        header('Access-Control-Allow-Headers:'.$headers);
    }
}