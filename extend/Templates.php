<?php

namespace extend;

use Smarty;
use SmartyException;

class Templates
{
    // 定义模板引擎
    private $smarty;

    /**
     * 构造函数，初始化模板引擎参数
     * Templates constructor.
     */
    public function __construct()
    {
        $smarty = new Smarty();
        $smarty->left_delimiter = templatesConfig("left_delimiter");
        $smarty->right_delimiter = templatesConfig("right_delimiter");
        $smarty->setTemplateDir(getPath("view"));
        $smarty->setCacheDir("runtime/cache");
        $smarty->setCompileDir("runtime/temp");
        $smarty->caching = templatesConfig("caching");
        $smarty->cache_lifetime = templatesConfig("cache_lifetime");
        $this->smarty = $smarty;
    }

    /**
     * 输出值到模板
     * @param $name
     * @param $data
     */
    public function outputVariable($name,$data){
        $this->smarty->assign($name,$data);
    }

    /**
     * 渲染模板路径和名称
     * @param $path_file_name
     * @throws SmartyException
     */
    public function renderTemplate($path_file_name){
        $this->smarty->display($path_file_name);
    }

    /**
     * 输出值到模板
     * 静态调用
     * @param $name
     * @param $data
     */
    public static function assign($name,$data){
        $temp = new Templates();
        $temp->outputVariable($name,$data);
    }

    /**
     * 渲染模板路径和名称
     * 静态调用
     * @param $path_file_name
     * @throws SmartyException
     */
    public static function display($path_file_name){
        $temp = new Templates();
        $suffix = templatesConfig('suffix');
        $temp->renderTemplate($path_file_name.".".$suffix);
    }
}