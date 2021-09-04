<!doctype html>
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
</html>