<?php

namespace app\controller;

/**
 * Class Index
 * @package app\controller
 */
class Index extends Common
{
    public function index(){
        return json([
            'code'=>200,
            'msg'=>'成功访问index',
            'data'=>[
                'ip'=>$_SERVER["REMOTE_ADDR"],
                'date'=>date("Y-m-d H:i:s")
            ]
        ]);
    }
}