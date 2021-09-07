<?php
/**
 * 数据库配置
 * @param string $key
 * @return array|mixed|string
 */
function dbConfig($key = ""){
    $data = [
        // 数据库类型
        'dbms'=>'mysql',
        // 数据库地址
        'host'=>'127.0.0.1',
        // 数据库名字
        'dbname'=>'test',
        // 数据库账户
        'user'=>'root',
        // 数据库密码
        'pass'=>'root',
        // 数据库端口
        'port'=>3306
    ];
    return getValue($data,$key);
}

/**
 * 默认控制器和方法
 * @param string $key
 * @return string|string[]
 */
function appConfig($key = ""){
    $data = [
        'controller'=>"Index",
        'method'=>"index"
    ];
    return getValue($data,$key);
}

/**
 * 模板配置
 * @param string $key
 * @return string|string[]
 */
function templatesConfig($key = ""){
    $data = [
        "left_delimiter" => "<{",
        "right_delimiter" => "}>",
        "caching" => false,
        "cache_lifetime" => 60*60*12,
        "suffix" => "tpl"
    ];
    return getValue($data,$key);
}
/**
 * redis配置参数
 * @var string
 */
function redisConfig($key = ""){
    $data = [
        'host'=>"127.0.0.1",
        'port'=>6379,
        'auth'=>""
    ];
    return getValue($data,$key);
}

/**
 * 获取配置value值
 * @param $data
 * @param $key
 * @return mixed|string
 */
function getValue($data,$key){
    if(is_null($key)){
        return $data;
    }else if(array_key_exists($key,$data)){
        return $data[$key];
    }else{
        return "";
    }
}


/**
 * json返回值处理
 * @param $data
 * @param int $state
 * @return false|string
 */
function json($data,$state = 200){
    http_response_code($state);
    return json_encode($data,JSON_UNESCAPED_UNICODE);
}

/**
 * 判断是否是cli请求
 * @return bool
 */
function is_cli(): bool
{
    return preg_match("/cli/i", php_sapi_name()) ? true : false;
}

function errorMsg($e){
    if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
        $res['message'] = $e->getMessage();
        $res['file'] = str_replace(getPath(),"",str_replace("\\","/",$e->getFile()));
        $res['line'] = $e->getLine();
        $res['code'] = $e->getCode();
        json($res);
    }else{
        http_response_code($e->getCode());
        echo "<h2>".$e->getMessage()."</h2>";
        echo "<span>错误代码文件：".str_replace(getPath(),"",str_replace("\\","/",$e->getFile()))."</span><br />";
        echo "<span>错误行数:".$e->getLine()."</span><br />";
        echo "<span>错误状态：".$e->getCode()."</span><br />";
    }
}