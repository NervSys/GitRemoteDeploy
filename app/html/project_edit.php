<!DOCTYPE HTML>
<html>
<head>
    <?php require __DIR__ . '/header.php'; ?>
    <title>编辑项目</title>
    <link href="./_static/css/plugins/iCheck/custom.css" rel="stylesheet">
    <style type="text/css">
        .radio {
            display: inline
        }
    </style>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>编辑项目</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" id="form-member-add">
                        <input type="hidden" name="proj_id" value="0">
                        <input type="hidden" name="token" value="">
                        <input type="hidden" name="cmd" value="project/ctrl-add">
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">项目名称：</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="proj_name" name="proj_name"
                                       placeholder="请输入项目名称">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">项目简介：</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="proj_desc" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Git 地址：</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="proj_git_url" name="proj_git_url"
                                       placeholder="请输入Git 地址">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">本地路径：</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="proj_local_path" name="proj_local_path"
                                       placeholder="请输入本地路径">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">开发者名称：</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="proj_user_name" name="proj_user_name"
                                       placeholder="请输入开发者名称">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">开发者邮箱：</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="proj_user_email" name="proj_user_email"
                                       placeholder="请输入开发者邮箱">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">环境类型：</label>
                            <div class="col-sm-10">
                                <div class="radio i-checks">
                                    <label><input type="radio" checked="" value="0" name="env_type"> <i></i>
                                        测试环境</label>
                                </div>
                                <div class="radio i-checks">
                                    <label><input type="radio" value="1" name="env_type"> <i></i> 生产环境</label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">备份文件：</label>

                            <div class="col-sm-10" id="backup">
                                <div class="col-sm-12" style="margin-bottom:10px;">
                                    <a onclick="add()" href="javascript:void(0);"
                                       class="btn btn-success">添加</a>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">保存内容</button>
                                <button class="btn btn-white" type="button" onclick="layer_close()">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/footer.php'; ?>

<!--请在下方写此页面业务相关的脚本-->
<script src="./_static/js/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="./_static/js/project_edit.js"></script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>