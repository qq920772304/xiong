<?php

namespace app\controller;
use extend\Facade\Cookie;
use extend\Templates;

/**
 * Class Index
 * @package app\controller
 */
class Index extends Common
{
    public function index(){
        Cookie::set("name",['name'=>"张三"]);
        var_dump(Cookie::get("name"));
        Templates::display("index/index");
    }
}