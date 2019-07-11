<!DOCTYPE html>
<html>
<head>
    <?php require "./header.php" ?>
    <title>登录</title>
    <link href="./_static/css/login.min.css" rel="stylesheet">
    <script type="text/javascript">
        if (window.top !== window.self) {
            window.top.location = window.location
        }
    </script>
</head>
<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7">
            <div class="signin-info">
                <div class="logopanel m-b">
                    <h1>[ GitGet ]</h1>
                </div>
                <div class="m-b"></div>
                <h4>欢迎使用 <strong>GitGet 后台管理系统</strong></h4>
                <ul class="m-b">
                    <!--                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势一：专注定制开发</li>-->
                    <!--                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势二：自己的核心架构</li>-->
                    <!--                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势三：优质的售后服务</li>-->
                    <!--                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势四：</li>-->
                    <!--                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势五：</li>-->
                </ul>
            </div>
        </div>
        <div class="col-sm-5">
            <form method="post" action="" onsubmit="return false">
                <input type="hidden" name="cmd" value="user/ctrl-login">
                <h4 class="no-margins">登录：</h4>
                <input type="text" class="form-control uname" placeholder="用户名" name="acc"/>
                <input type="password" class="form-control pword" placeholder="密码" name="pwd"/>
                <button class="btn btn-success btn-block">登录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; 2018-2019 All Rights Reserved.
        </div>
    </div>
</div>
<?php require "./footer.php" ?>
<script type="text/javascript" src="./_static/js/login.js"></script>
</body>
</html>
