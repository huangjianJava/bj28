<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"/home/wwwroot/dwj/public/../app/admin/view/rule/group.html";i:1510495842;s:59:"/home/wwwroot/dwj/public/../app/admin/view/common/base.html";i:1535125972;s:58:"/home/wwwroot/dwj/public/../app/admin/view/common/nav.html";i:1524635392;}*/ ?>
<!DOCTYPE html>
<html lang="zh_ch">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>后台管理系统</title>
    <link href="/yicai/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="__CSS__/style.css" rel="stylesheet">
    <!--<link href="__CSS__/bootstrap.min.css" rel="stylesheet">-->
    <link href="__CSS__/style-responsive.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="__JS__/html5shiv.js"></script>
    <script src="__JS__/respond.min.js"></script>
    <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo start-->
        <div class="logo">
            <a href="<?php echo url('Index/index'); ?>"><img src="__IMG__/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="<?php echo url('Index/index'); ?>"><img src="__IMG__/logo_icon.png" alt=""></a>
        </div>
        <!--logo  end-->


        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="__IMG__/photos/user-avatar.png" class="media-object">
                    <div class="media-body">
                        <h4><a><?php echo session('admin_login.username'); ?></a></h4>
                    </div>
                </div>
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a  data-toggle="modal" href="#myModal"><i class="fa fa-cog"></i> <span>修改密码</span></a></li>
                    <li><a href="<?php echo url('Login/out'); ?>"><i class="fa fa-sign-out"></i> <span>退出</span></a></li>
                </ul>
            </div>

            <!--左侧菜单 start-->
<ul class="nav nav-pills nav-stacked custom-nav">

    <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): if( count($menu_list)==0 ) : echo "" ;else: foreach($menu_list as $key=>$vo): if(!(empty($vo['sub_menu']) || (($vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator ) && $vo['sub_menu']->isEmpty()))): ?>
            <li class="menu-list <?php if(($controllerName == $vo['control'])): ?>nav-active<?php endif; ?>"><a href="#"><i class="fa <?php echo $vo['icon']; ?>"></i><span><?php echo $vo['name']; ?></span></a>
                <ul class="sub-menu-list">
                    <?php if(is_array($vo['sub_menu']) || $vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator): if( count($vo['sub_menu'])==0 ) : echo "" ;else: foreach($vo['sub_menu'] as $kk=>$vv): ?>
                    <li <?php if(($actionName == $vv['act'])): ?> class="active" <?php endif; ?>><a href="<?php echo url("$vv[control]/$vv[act]"); ?>"><?php echo $vv['name']; ?></a></li>
                   <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </li>
             <?php else: ?>
            <li class="menu-list}">
            <a href="<?php echo url("$vo[control]/$vo[act]"); ?>""><i class="fa <?php echo $vo['icon']; ?>"></i><span><?php echo $vo['name']; ?></span></a>
            </li>
      <?php endif; endforeach; endif; else: echo "" ;endif; ?>

</ul>
<!--左侧菜单 end-->

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">

                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="__IMG__/photos/user-avatar.png" alt="" />
                            <?php echo session('admin_login.username'); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a  data-toggle="modal" href="#myModal"><i class="fa fa-cog"></i> <span>修改密码</span></a></li>
                            <li><a href="<?php echo url('Login/out'); ?>"><i class="fa fa-sign-out"></i>退出</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->
        <!--提示信息-->
        <div id="top-alert" class="fixed alert alert-error">
            <button class="close fixed">&times;</button>
            <div class="alert-content">提示信息</div>

        </div>
        <!--提示信息end-->
        
<link rel="stylesheet" href="__FONT__/css/font-awesome.min.css" />

<style>
    .modal.in .modal-dialog{
        margin-top: 10%;
        z-index: 10000;
    }
    .modal-backdrop{
        z-index: 0;
    }
</style>
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb panel">
                <li><a href="<?php echo url('Index/index'); ?>"><i class="fa fa-home"></i> 控制台</a></li>
                <li><a href="<?php echo url('index'); ?>">权限控制</a></li>
                <li class="active">用户组管理</li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>

    <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">用户组列表</a></li>
        <li><a href="javascript:;" onclick="add()">添加用户组</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <th>用户组名</th>
                    <th>操作</th>
                </tr>
                <?php foreach($data as $v): ?>
                <tr>
                    <td><?php echo $v['title']; ?></td>
                    <td><a href="javascript:;" ruleId="<?php echo $v['id']; ?>" ruleTitle="<?php echo $v['title']; ?>" onclick="edit(this)">修改</a>
                        |
                        <a href="<?php echo url('rule/delete_group',array('id'=>$v['id'])); ?>">删除</a>
                        | <a href="<?php echo url('rule/rule_group',array('id'=>$v['id'])); ?>">分配权限</a>
                        | <a href="  <?php echo url('rule/check_user',array('group_id'=>$v['id'])); ?>">添加成员</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="modal fade" id="bjy-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                    <h4 class="modal-title" id="myModalLabel"> 添加用户组</h4></div>
                <div class="modal-body">
                    <form id="bjy-form" class="form-inline" action="<?php echo url('rule/add_group'); ?>" method="post">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tr>
                                <th width="15%">用户组名：</th>
                                <td><input class="form-control" type="text" name="title"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input class="btn btn-success" type="submit" value="添加"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bjy-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                    <h4 class="modal-title" id="myModalLabel"> 修改规则</h4></div>
                <div class="modal-body">
                    <form id="bjy-form" class="form-inline" action="  <?php echo url('rule/edit_group'); ?>" method="post"><input
                            type="hidden" name="id">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tr>
                                <th width="12%">规则名：</th>
                                <td><input class="form-control" type="text" name="title"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input class="btn btn-success" type="submit" value="修改"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // 添加菜单
    function add() {
        $("input[name='title']").val('');
        $('#bjy-add').modal('show');
    }

    // 修改菜单
    function edit(obj) {
        var ruleId = $(obj).attr('ruleId');
        var ruletitle = $(obj).attr('ruletitle');
        $("input[name='id']").val(ruleId);
        $("input[name='title']").val(ruletitle);
        $('#bjy-edit').modal('show');
    }
</script>
<!--body wrapper end-->

        <!--footer section start-->
        <footer class="sticky-footer">
            2014-2017 ©
            天猫国际出品
        </footer>
        <!--footer section end-->

    </div>
    <!-- main content end-->
</section>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                <h4 class="modal-title">修改密码</h4>
            </div>
            <form class="form-horizontal form-post" action="<?php echo url('Users/psd'); ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label  class="col-lg-2 col-sm-2 control-label">原密码</label>
                    <div class="col-lg-10">
                        <input type="password" name="old" class="form-control"  placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-2 col-sm-2 control-label">新密码</label>
                    <div class="col-lg-10">
                        <input type="password" name="password" class="form-control"  placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-2 col-sm-2 control-label">确认密码</label>
                    <div class="col-lg-10">
                        <input type="password" name="passwords" class="form-control"  placeholder="">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                <button class="btn btn-primary ajax-post" type="submit" target-form="form-post">提交</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="__JS__/jquery-1.10.2.min.js"></script>
<script src="__JS__/jquery-ui-1.9.2.custom.min.js"></script>
<script src="__JS__/jquery-migrate-1.2.1.min.js"></script>
<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/modernizr.min.js"></script>
<script src="__JS__/jquery.nicescroll.js"></script>
<script src="__JS__/layer/layer.js"></script>


<script>
    $(document).ready(function(){
        setInterval(is_recharge,8000);
    });
    function is_recharge() {
        $.ajax({
            type: "post",
            url: "<?php echo url('money/is_recharge'); ?>",
            data: "",
            dataType: "json",
            async: false,
            success: function(data) {
                var ret = data.ret;
                var type = data.data.type;
                var name = data.data.name;
                if(ret=="200"){
                    var audio = document.createElement("audio");
                    audio.src = "URL_IMG/recharge.mp3";
                    audio.play();
                    if(type==1){
                        var msg = "您有一个新的充值订单:"+name;
                        layer.alert(msg, {
                            skin: 'layui-layer-molv' //样式类名
                            ,closeBtn: 0
                            ,anim: 4 //动画类型
                        });
                    }
                    if(type==2){
                        var msg = "您有一个新的提现订单:"+name;
                        layer.alert(msg, {
                            skin: 'layui-layer-molv' //样式类名
                            ,closeBtn: 0
                            ,anim: 4 //动画类型
                        });
                    }
                }
            }
        });
    }
    function showNotice(msg,name) {
        Notification.requestPermission(function (perm) {
            if (perm == "granted") {
                var notification = new Notification(msg, {
                    dir: "auto",
                    lang: "hi",
                    tag: "易彩",
                    icon: "/yicai/favicon.ico",
                    body: name
                });
            }
        })
    }
</script>

<!--common scripts for all pages-->
<script src="__JS__/scripts.js"></script>
<script src="__JS__/common.js"></script>

</body>
</html>
