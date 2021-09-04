<?php

//php .\run.php --command demo --name abcname

include "./vendor/autoload.php";

try {
    if(!is_cli()){
        throw new Exception("run是Cli模式下执行，不支持http请求",404);
    }
}catch (Exception $e){
    errorMsg($e);
}

$keys = array();
foreach ($argv as $value){
    if(strpos($value,"--") !== false){
        $key = trim(str_replace("--","",$value));
        $key = $key.":";
        $keys[] = $key;
    }
}
$data = getopt("",$keys);
$command = $data['command'];
if(class_exists('\command\\'.$command)){
    $command = '\command\\'.$command;
    $command = new $command;
    unset($data['command']);
    $command->method($data);
}else{
    echo "未能找到".$command."命令，程序终止\n";
}