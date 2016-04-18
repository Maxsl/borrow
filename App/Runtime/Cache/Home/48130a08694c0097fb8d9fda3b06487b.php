<?php if (!defined('THINK_PATH')) exit();?><!-- 调用头部文件 -->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($title); ?></title>
    <meta name = "keywords" content="<?php echo ($SiteInfo["keywords"]); ?>" >
    <meta name = "description" content="<?php echo ($SiteInfo["description"]); ?>" >
    <link href="/borrow/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/borrow/Public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/borrow/Public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/borrow/Public/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="/borrow/Public/css/animate.css" rel="stylesheet">
    <link href="/borrow/Public/css/style.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/borrow/Public/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link rel="shortcut icon" href="/borrow/Public/img/favicon.ico" />

</head>

<body>

    <div id="wrapper">
        <!-- 侧边菜单-开始 -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header" style="text-align:center;">
                        <div class="dropdown profile-element"> <span>
                        <a href="/borrow/index.php">
                            <img alt="image" class="img-circle" src="/borrow/Public/img/borrow_log_600x600.png" width="80px;"  height="80px;" />
                        </a>
                        </span>
                        <span class="clear">
                        <span class="block m-t-xs" style = "color:#fff;">
                        <strong class="font-bold">借贷管理系统</strong>
                        </span> 
<!--                         <span class="text-muted text-xs block">内部使用</span> -->
                        </span>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">借款管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/borrow/index.php/Home/Borrow/add" data-index="0">添加借款</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/borrow/index.php/Home/Borrow" data-index="1">借款列表</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-cny"></i>
                            <span class="nav-label">还款管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/borrow/index.php/Home/Repayment" data-index="2">还款列表</a>
                            </li>

                            <li>
                                <a class="J_menuItem" href="/borrow/index.php/Home/Repayment/ajaxtest" data-index="2">ajaxtable测试</a>
                            </li>

                            <li>
                                <a class="J_menuItem" href="/borrow/index.php/Home/Repayment/chart" data-index="3">还款统计</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">借款人</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/borrow/index.php/Home/User" data-index="4">借款人列表</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/borrow/index.php/Home/User/add" data-index="5">添加借款人</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            </nav>
            <!-- 侧边菜单-结束 -->
            <!-- 头部导航-开始 -->
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-left">
                            <li>
                                <a class="m-r-lg text-muted welcome-message"><?php echo ($title); ?></a>
                            </li>
                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                        <span class="m-r-sm text-muted welcome-message">欢迎你,</span>
                        <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="javascript:void(0)">
                                       <strong><span class="text-success"><?php echo (session('name')); ?></span></strong>
                                </a>
                                <ul class="dropdown-menu dropdown-messages" style="width: 120px;">
                                    <li>
                                        <strong><a href="/borrow/index.php/Home/login/logout">退出登陆</a></strong>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- 头部导航-结束 -->
<div style="padding:10px;"></div>


<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>添加续借 <small>包括自定义样式的复选和单选按钮</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#" tppabs="http://www.zi-han.net/theme/hplus/form_basic.html#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="form_basic.html#" tppabs="http://www.zi-han.net/theme/hplus/form_basic.html#">选项1</a>
                        </li>
                        <li><a href="form_basic.html#" tppabs="http://www.zi-han.net/theme/hplus/form_basic.html#">选项2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="/borrow/index.php/Home/Borrow/renew_act">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">借款人</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" disabled="" value="<?php echo ($borrow_list["name"]); ?>">
                            <input type="hidden" class="form-control" value="<?php echo ($borrow_list["borrow_uid"]); ?>" name="borrow_uid">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">合同号</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="contract_number" name="contract_number">
                        </div>
                    </div>
					
                     <div class="form-group">
                            <label class="col-sm-2 control-label">借款期限</label>
                            <div class="col-md-3">
                                           <select class="form-control m-b" name="borrow_duration">
                                               <option value="1">1</option>
                                               <option value="2">2</option>
                                               <option value="3">3</option>
                                               <option value="4">4</option>
                                               <option value="5">5</option>
                                               <option value="6">6</option>
                                               <option value="7">7</option>
                                               <option value="8">8</option>
                                               <option value="9">9</option>
                                               <option value="10">10</option>
                                               <option value="11">11</option>
                                               <option value="12">12</option>
                                           </select>
                                            <span class="help-block m-b-none">单位:月</span>
                             </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">借款金额</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?php echo ($borrow_list["borrow_money"]); ?>" name="borrow_money">
                            <span class="help-block m-b-none">单位:元</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">利率</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?php echo ($borrow_list["borrow_interest_rate"]); ?>" name="borrow_interest_rate">
                            <span class="help-block m-b-none">%</span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">手续费率</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?php echo ($borrow_list["borrow_procedures_rate"]); ?>" name="borrow_procedures_rate">
                            <span class="help-block m-b-none">%</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">借款时间</label>
                        <div class="col-md-3">
                            <input id="hello" class="laydate-icon form-control layer-date" name="borrow_time">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">还款方式</label>
                        <div class="col-md-3">
                            <select class="form-control m-b" name="repayment_type">
                                <option value="付息还本">付息还本</option>
                                <option value="到期本息">到期本息</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <input type="hidden" name="renew_id" value="<?php echo ($borrow_list["id"]); ?>">
                            <input type="hidden" name="borrow_number" value="<?php echo ($borrow_list["borrow_number"]); ?>">
                            <button class="btn btn-primary" type="submit">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 调用脚部文件 -->
        <div style="padding:20px;"></div>
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
    <script src="/borrow/Public/js/plugins/validate/messages_zh.min.js"></script>

    <!-- morris -->
    <script src="/borrow/Public/js/plugins/morris/morris.js"></script>
    <script src="/borrow/Public/js/plugins/morris/raphael-2.1.0.min.js"></script>
    
    <!-- morris -->
    <script src="/borrow/Public/js/plugins/tableexport/Blob.js"></script>
    <script src="/borrow/Public/js/plugins/tableexport/FileSaver.js"></script>
    <script src="/borrow/Public/js/plugins/tableexport/tableExport.js"></script>
    
    <!-- Data Tables -->
    <script src="/borrow/Public/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/borrow/Public/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <script>
        laydate({elem:"#hello",event:"focus"});
    </script>
    <!-- 菜单 -->
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
    <!-- 应收实收柱状图 -->
    <script>
        $(function() {
            var morris_bar_chart_16  = $("#morris-bar-chart-16");
            if (morris_bar_chart_16[0]) {
                    Morris.Bar({
                        element: "morris-bar-chart-16",
                        data: [<?php echo ($str_2016); ?>],
                        xkey: "y",
                        ykeys: ["a", "b"],
                        labels: ["应收", "实收"],
                        hideHover: "auto",
                        resize: !0,
                        barColors: ["#1ab394", "#ec5464"]
                    });
            };
            var morris_bar_chart_16  = $("#morris-bar-chart-15");
            if (morris_bar_chart_16[0]) {
                    Morris.Bar({
                        element: "morris-bar-chart-15",
                        data: [<?php echo ($str_2015); ?>],
                        xkey: "y",
                        ykeys: ["a", "b"],
                        labels: ["应收", "实收"],
                        hideHover: "auto",
                        resize: !0,
                        barColors: ["#1ab394", "#ec5464"]
                    });
            };
        });
    </script>
    <script>
    var export_btn  = $("#export-btn");
    if (export_btn) {
            var $exportLink = document.getElementById('export-btn');
            $exportLink.addEventListener('click', function(e){
                e.preventDefault();
                if(e.target.nodeName === "A"){

                    tableExport('table1', '<?php echo ($title); ?>', e.target.getAttribute('data-type'));
                }
            }, false);
    };
    </script>
    <script>
    function change_id(id) {
            $("input[name='id']").val(id);
    }
    </script>
    <script>
            $(document).ready(function() {
                console.log('ready');
                $("#tabletest").dataTable({
                      "oLanguage": {
                      "sLengthMenu": "每页显示 _MENU_ 条记录",
                      "sZeroRecords": "抱歉， 没有找到",
                      "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
                      "sInfoEmpty": "没有数据",
                      "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                      "oPaginate": {
                            "sFirst": "首页",
                            "sPrevious": "前一页",
                            "sNext": "后一页",
                            "sLast": "尾页"
                            },
                      "sZeroRecords": "没有检索到数据",
                      "sProcessing": "<img src='./loading.gif' />"
                      },
                      "bProcessing": true,
                      "sAjaxSource": './ajaxquery',

                      "bServerSide": true,
                      "sPaginationType": "full_numbers",
                            /*使用post方式
                            "fnServerData": function ( sSource, aoData, fnCallback ) {
                                  $.ajax( {
                                      "dataType": 'json',
                                      "type": "POST",
                                      "url": sSource,
                                      "data": aoData,
                                      "success": fnCallback
                                  } );
                              }*/
                        "aoColumns": [
                                { "sName": "还款" },
                                  { "sName": "version" },
                                  { "sName": "engine" },
                                  { "sName": "browser" },
                                  { "sName": "grade" },
                                  { "sName": "grade2" },
                                  { "sName": "grade3" }
                              ]//$_GET['sColumns']将接收到aoColumns传递数据
                });
            });
    </script>
</body>

</html>