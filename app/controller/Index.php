<?php

namespace app\controller;
use extend\Templates;

/**
 * Class Index
 * @package app\controller
 */
class Index extends Common
{
    public function index(){
        Templates::display("index/index");
    }
}