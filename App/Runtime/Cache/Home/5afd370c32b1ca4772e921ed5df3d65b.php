<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[title]</title>
    <meta name = "keywords" content="<?php echo ($SiteInfo["keywords"]); ?>" >
    <meta name = "description" content="<?php echo ($SiteInfo["description"]); ?>" >
    <link href="/borrow/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/borrow/Public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/borrow/Public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/borrow/Public/css/animate.css" rel="stylesheet">
    <link href="/borrow/Public/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="/borrow/Public/img/favicon.ico" />

</head>

<body class="gray-bg">
<div class="row">
    <div class="col-sm-12">
        <div class="middle-box text-center loginscreen  animated fadeInDown">
            <div>
                <div>
                    <h2 >借贷管理系统</h2>
                </div>

                <form class="m-t" role="form" action="/borrow/index.php/Home/Login/login_a" method="post">
                    <div class="form-group">
                        <input type="name" class="form-control" placeholder="用户名">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="密码">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>

                </form>
            </div>
        </div>
 </div>
 </div>
<!-- 调用脚部文件 -->
        <div class="footer">
            <div class="pull-right">
                One more thing！
            </div>
            <div>
                <strong>Copyright</strong> <a target="_bank" href="http://www.yangzhongchao.com/">羊种草</a> &copy; 2016
            </div>
        </div>

        </div>
        </div>

    <script src="/borrow/Public/js/jquery-2.1.1.js"></script>
    <script src="/borrow/Public/js/jquery-ui-1.10.4.min.js"></script>
    <script src="/borrow/Public/js/bootstrap.min.js"></script>
    <script src="/borrow/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/borrow/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/borrow/Public/js/inspinia.js"></script>
    <script src="/borrow/Public/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="/borrow/Public/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Jvectormap -->
    <script src="/borrow/Public/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/borrow/Public/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Flot -->
    <script src="/borrow/Public/js/plugins/flot/jquery.flot.js"></script>
    <script src="/borrow/Public/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/borrow/Public/js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- laydate -->
    <script src="/borrow/Public/js/plugins/layer/laydate/laydate.js"></script>
    
    <!-- laydate -->
    <script src="/borrow/Public/js/plugins/validate/jquery.validate.min.js"></script>

    
    <script>
        laydate({elem:"#hello",event:"focus"});
    </script>

    <script>
        var s_url=window.location.pathname;
        var now_url = '';
        for(var i = 0;i<$("#side-menu li").length;i++){
            now_url=$("#side-menu li a").eq(i).attr("href");
            if(now_url == s_url){
                $("#side-menu a").eq(i).parent().addClass("active");
                $("#side-menu a").eq(i).parent().parent().parent().addClass("active");
                $("#side-menu a").eq(i).parent().parent().addClass("in");
            }else{
                $("#side-menu a").eq(i).parent().removeClass("active");
            }
        }

    </script>
    <script>
    $.validator.setDefaults({
        highlight: function(e) {
            $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
        },
        success: function(e) {
            e.closest(".form-group").removeClass("has-error").addClass("has-success")
        },
        errorElement: "span",
        errorPlacement: function(e, r) {
            e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent())
        },
        errorClass: "help-block m-b-none",
        validClass: "help-block m-b-none"
    }),
    $().ready(function() {
        $("#add_borrow").validate();
        var e = "<i class='fa fa-times-circle'></i> ";
        $("#signupForm").validate({
            rules: {
                name: "required",
                lastname: "required",
                username: {
                    required: !0,
                    minlength: 2
                },
                password: {
                    required: !0,
                    minlength: 5
                },
                confirm_password: {
                    required: !0,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: !0,
                    email: !0
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                name: e + "请输入你的姓",
                lastname: e + "请输入您的名字",
                username: {
                    required: e + "请输入您的用户名",
                    minlength: e + "用户名必须两个字符以上"
                },
                password: {
                    required: e + "请输入您的密码",
                    minlength: e + "密码必须5个字符以上"
                },
                confirm_password: {
                    required: e + "请再次输入密码",
                    minlength: e + "密码必须5个字符以上",
                    equalTo: e + "两次输入的密码不一致"
                },
                email: e + "请输入您的E-mail",
                agree: {
                    required: e + "必须同意协议后才能注册",
                    element: "#agree-error"
                }
            }
        }),
        $("#username").focus(function() {
            var e = $("#firstname").val(),
            r = $("#lastname").val();
            e && r && !this.value && (this.value = e + "." + r)
        })
    });
    </script>
</body>

</html>