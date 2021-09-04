<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/view/layui/css/layui.css">
    <script src="/view/layui/layui.js"></script>
</head>
<body style="background-color: #e2e2e2">
<div class="layui-fluid">
    <div class="layui-card" style="margin-top: 25px">
        <div class="layui-card-body" style="margin: -15px 0 -20px 0">
            <blockquote style="border-left: 0">
                <form class="layui-form" lay-filter="searchForm">
                    <div class="layui-inline">
                        <div class="layui-inline">
                            <label style="padding-right: 10px">书名：</label>
                            <div class="layui-input-inline">
                                <input type="text" name="book_name" id="book_name" class="layui-input" placeholder="输入书名" />
                            </div>
                        </div>
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="radio" name="engine" value="笔趣阁" title="笔趣阁">
                                <input type="radio" name="engine" value="新笔趣阁" title="新笔趣阁">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <button type="button" class="layui-btn-sm layui-btn" lay-submit lay-filter="search">search</button>
                        </div>
                    </div>
                </form>
            </blockquote>
        </div>
    </div>
</div>
<div class="layui-fluid" style="margin-top: 25px">
    <div class="layui-row layui-col-space5">
        <div class="layui-col-md2">
            <div class="layui-card">
                <div class="layui-card-header">搜索结果</div>
                <div class="layui-card-body">
                    卡片式面板面板通常用于非白色背景色的主体内<br>
                    从而映衬出边框投影
                </div>
            </div>
        </div>
        <div class="layui-col-md8">
            <div class="layui-card">
                <div class="layui-card-header">详情</div>
                <div class="layui-card-body">
                    卡片式面板面板通常用于非白色背景色的主体内<br>
                    从而映衬出边框投影
                </div>
            </div>
        </div>
        <div class="layui-col-md2">
            <div class="layui-card">
                <div class="layui-card-header">收藏列表</div>
                <div class="layui-card-body">
                    卡片式面板面板通常用于非白色背景色的主体内<br>
                    从而映衬出边框投影
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    layui.use(['layer', 'form','jquery'], function(){
        var layer = layui.layer
            ,form = layui.form
            ,$ = layui.jquery;
        form.on('submit(search)', function(data){
            data = data.field;
            if(data['book_name'] === ""){
                layer.alert("Book名称为空！",{title:"温馨提示",icon:2});
            }
            if(!data.hasOwnProperty("engine")){
                layer.alert("搜索引擎未选择",{title:"温馨提示",icon:2});
            }
            $.get("/Search/book",data,function (res){
                console.log(res);
            },'json')
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
</script>
</body>
</html>