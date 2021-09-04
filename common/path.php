<?php
/**
 * 获取项目路径
 * 并且支持在项目根目录后追加路径
 * @param string $path
 * @return string
 */
function getPath($path = ""){
    $root_path = __DIR__;
    $root_path_s = explode(DIRECTORY_SEPARATOR,$root_path);
    $root_path = "";
    foreach ($root_path_s as $value){
        if($value == "common"){
            break;
        }else{
            $root_path = $root_path.$value."/";
        }
    }
    if($path){
        $root_path = $root_path.$path;
    }
    if(!is_dir($root_path)){
        mkdir($root_path,777,true);
    }
    return $root_path;
}