<?php
/* Smarty version 3.1.39, created on 2021-09-04 06:40:22
  from 'D:\phpStudy\PHPTutorial\WWW\demo\view\index\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_613314d64e8224_70259850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc1f54bd6cc59103e2134f6f4853674662c39e25' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\demo\\view\\index\\index.tpl',
      1 => 1630737620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_613314d64e8224_70259850 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" method="get" enctype="multipart/form-data">
            <div>
                <label>书名：</label>
                <input type="text" placeholder="书名" name="book_name" id="book_name">
            </div>
            <div>
                <label>搜索引擎：</label>
                <input type="radio" name="search">笔趣阁
                <input type="radio" name="search">新笔趣阁
            </div>
            <div>
                <input type="button" value="搜索" id="btn_search" name="btn_search">
            </div>
        </form>
    </div>
</body>
</html><?php }
}
