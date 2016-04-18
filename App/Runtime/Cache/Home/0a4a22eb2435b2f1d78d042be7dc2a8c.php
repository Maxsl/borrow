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
                <h5>借款列表</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12" id="export-btn">
                            <a data-type="xls" href="javascript:;" type="button" class="btn btn-primary btn-sm">导出xls</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table1">
                        <thead>
                            <tr>
                                <th>编号</th>
                                <th>借款信息</th>
                                <th>借款人</th>
                                <th>还款金额</th>
                                <th>应还款时间</th>
                                <th>实际还款时间</th>
                                <th>是否逾期</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($borrow_repayment_list)): foreach($borrow_repayment_list as $key=>$list): ?><tr>
                                <td><?php echo ($list["id"]); ?></td>
                                <td><a href="/borrow/index.php/Home/Borrow/edit/id/<?php echo ($list["borrow_id"]); ?>">编号:<?php echo ($list["borrow_id"]); ?></a></td>
                                <td><a href="/borrow/index.php/Home/User/index/id/<?php echo ($list["uid"]); ?>"><?php echo ($list["name"]); ?></a></td>
                                <td><?php echo ($list["repayment_money"]); ?></td>
                                <td><?php echo (date("Y-m-d",$list["repayment_time"])); ?></td>
                                <td>
                                <?php if(($list["real_repayment_time"] == 0) AND ($list["is_repayment"] == 0)): ?><span class="text-danger">未还</span>
                                <?php else: ?>
                                <?php echo (date("Y-m-d",$list["real_repayment_time"])); endif; ?>
                                </td>
                                <td>
                                <?php  if ($list['is_late'] == 0) { echo "未逾期"; }else if($list['is_late'] == 1){ echo "<span class='text-danger'>逾期</span>"; }else if ($list['repayment_time'] > $today['start'] AND $list['repayment_time'] < $today['end']){ echo "今天逾期"; } ?>
                                </td>
                                <td>
                                <a title="编辑" href="/borrow/index.php/Home/Repayment/edit/id/<?php echo ($list["id"]); ?>"><i class="fa fa-edit text-navy"></i></a>
                                <a title="确认还款" data-toggle="modal" data-target="#user_relation" onclick="change_id(<?php echo ($list["id"]); ?>)"><i class="fa fa-check text-navy"></i></a>
                                <a title="删除" onclick="if(confirm('确认删除这条还款记录？')){location.href='/borrow/index.php/Home/Repayment/del_repayment/id/<?php echo ($list["id"]); ?>';}"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                    <div class = 'dataTables_paginate paging_simple_numbers'>
                    <div class="pagination pull-left'" style="margin-bottom: 0px; margin-top: 0px;">
                        <h3>共 <strong class="text-success"><?php echo ($count); ?></strong> 条数据,
                        当前在第<strong class="text-success"><?php echo ((isset($_GET['p']) && ($_GET['p'] !== ""))?($_GET['p']):"1"); ?></strong>页,
                        本页<strong class="text-success"><?php echo (acount($borrow_repayment_list)); ?></strong>条数据</h3>
                    </div>
                    <?php echo ($page); ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
    <!-- 选择还款时间模态窗口开始 -->
<div class="modal inmodal fade" id="user_relation" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-sm">
              <form method="post" class="form-horizontal" action="/borrow/index.php/Home/Repayment/confirm_repayment">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="text-danger"><i class="fa fa-times"></i></span><span class="sr-only">Close</span></button>
                      <p class="modal-title">设置实际还款时间</p>
                  </div>
                  <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label">实际还款时间</label>
                                    <input id="hello" class="laydate-icon form-control layer-date" name="real_repayment_time">
                            </div>   
                  </div>
                  <div class="modal-footer">
                        <input type="hidden" name="id" value="">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                      <button type="submit" class="btn btn-primary" >确认</button>
                  </div>
              </div>
              </form>
       </div>
    </div>
    <!-- 选择还款时间模态窗口结束 -->
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
            Morris.Bar({
                element: "morris-bar-chart-16",
                data: [<?php echo ($str_2016); ?>],
                xkey: "y",
                ykeys: ["a", "b"],
                labels: ["应收", "实收"],
                hideHover: "auto",
                resize: !0,
                barColors: ["#1ab394", "#ec5464"]
            }),
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
        });
    </script>
    <script>
    var $exportLink = document.getElementById('export-btn');
    $exportLink.addEventListener('click', function(e){
        e.preventDefault();
        if(e.target.nodeName === "A"){

            tableExport('table1', '<?php echo ($title); ?>', e.target.getAttribute('data-type'));
        }
    }, false);
    </script>
    <script>
    function change_id(id) {
            $("input[name='id']").val(id);
    }
    </script>
</body>

</html>