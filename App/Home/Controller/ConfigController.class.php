<?php
/*借用的别人的代码
/url:http://www.sucaihuo.com/php/165.html
*/
namespace Home\Controller;
use Think\Controller;
class ConfigController extends CommonController {

          public function admin(){
                $this->assign("title","管理员列表-会员积分管理系统");
                $this->display();
          }

          public function add_admin(){
                $this->assign("title","添加管理员-会员积分管理系统");
                $this->display();
          }

          public function add_admin_act(){
                $data['name'] = I('post.name');
                $data['real_name'] = I('post.real_name');
                $data['class'] = 2;
                $data['add_time'] = time();

                if (empty($data['name'])||empty($data['real_name'])||empty($data['class'])||empty($data['add_time'])) {
                      $this->error("某项没填！");
                }
                $password = I('post.password');
                $re_password = I('post.re_password');
                if ($password != $re_password ) {
                    $this->error('2次输入的密码不一致');
                }else{
                    $data['password'] = md5($password);
                    $result = M('Admin')->add($data);
                    if ($result>0){
                         $this->success("添加管理员成功！",U("Config/admin"));
                     }else{
                         $this->error("添加管理员失败！",U("Config/admin"));
                    };
                }
          }

          public function admin_query(){

                $order_column = $_GET['order'][0]['column'];
                $order_data = $_GET['columns'][$order_column]['data'];
                $dir = $_GET['order'][0]['dir'];
                //生成排序规则
                $order = $order_data.' '.$dir;
                //datatable全部数据   
                $columns = $_GET['columns'];

                // 查询规则
                $where = "";
                //登录名
                if (!empty($columns[1]['search']['value'])) {
                      if (!empty($where)) {
                            $where.= " AND ";
                      };
                      $where.= "name LIKE '%".$columns[1]['search']['value']."%'";
                }
                //真实姓名
                if (!empty($columns[2]['search']['value'])) {
                      if (!empty($where)) {
                            $where.= " AND ";
                      };
                      $where.= "real_name LIKE '%".$columns[2]['search']['value']."%'";
                }


                //全部管理员
                $admin_list = M('Admin')
                ->field('id, name, add_time, class, real_name')
                 ->where($where)
                 ->order($order)
                 ->limit(I('get.start').','.I('get.length'))
                 ->select();

                 //最后运行的sql，便于测试
                $sql = M('Admin')->getlastsql();

                // 全部管理员数量
                $count = M('Admin')
                ->where($where)
                ->count();// 查询总记录
                //处理数据
                foreach ($admin_list as $key => $value) {
                        $admin_list[$key]['add_time'] = date('Y-m-d',$value['add_time']);
                        
                        if ($value['class'] == 1) {
                                    $admin_list[$key]['class'] = "总管理";
                        }else if($value['class'] == 2){
                                    $admin_list[$key]['class'] = "小管理";
                        }

                        $edit_admin_url = U('Config/edit_admin',array('id' =>$value['id']));
                        $del_admin_url = U('Config/del_admin',array('id' =>$value['id']));

                        $admin_list[$key]['action'] = <<<HTML
                       <a title="编辑" href="$edit_admin_url">编辑</a>
                       <a title="删除" onclick=if(confirm("确认删除这个管理员？")){location.href="$del_admin_url";}><span class="text-danger">删除</span></a>
HTML;
                }


                $output = array(
                    "draw" => intval($_GET['draw']),
                    "recordsTotal" => $count,       //总数目
                    "recordsFiltered" => $count,        //过滤数目
                    "sql" => $sql,
                    "order" => $order,
                    "data" => $admin_list
                );

                // var_dump($output);
                $this->ajaxreturn($output,'json');
          }

          public function edit_admin(){
                $admin_id = I('get.id');
                $admin_info = M('Admin')->where('id='.$admin_id)->find();
                $this->assign("admin_info",$admin_info);
                $this->assign("title","编辑管理员-会员积分管理系统");
                $this->display();
          }

          public function edit_admin_act(){
                $admin_id = I('post.id');
                $password = I('post.password');
                $re_password = I('post.re_password');
                if ($password != $re_password ) {
                    $this->error('2次输入的密码不一致');
                }else{
                    $result = M('Admin')->where('id='.$admin_id)->setField('password',md5($password));
                    if ($result>0){
                         $this->success("修改管理员密码成功！",U("Config/admin"));
                     }else{
                         $this->error("修改管理员密码失败！",U("Config/admin"));
                    };
                }
          }

          public function del_admin(){
                $admin_id = I('get.id');
                $admin_class = M('Admin')->where('id='.$admin_id)->getfield('class');
                if ( 1 == $admin_class) {
                    $this->error('你疯了？总管理不能删！',U("Config/admin"));
                    exit();
                }else{
                    $result = M('Admin')->where('id='.$admin_id)->delete();
                    if ($result>0){
                         $this->success("删除管理员成功！",U("Config/admin"));
                     }else{
                         $this->error("删除管理员失败！",U("Config/admin"));
                    };
                }
          }



    public function dbbak(){
            $DataDir = "databak/";
            mkdir($DataDir);

            if (!empty($_GET['Action'])) {
                  import("Common.Org.MySQLReback");
                  $config = array(
                       'host' => C('DB_HOST'),
                       'port' => C('DB_PORT'),
                       'userName' => C('DB_USER'),
                       'userPassword' => C('DB_PWD'),
                       'dbprefix' => C('DB_PREFIX'),
                       'charset' => 'UTF8',
                       'path' => $DataDir,
                       'isCompress' => 0, //是否开启gzip压缩
                       'isDownload' => 0
                        );

                $mr = new MySQLReback($config);
                $mr->setDBName(C('DB_NAME'));
                if ($_GET['Action'] == 'backup') {
                      $mr->backup();
                      $this->success( '数据库备份成功！',U("Config/dbbak"),1);
                } elseif ($_GET['Action'] == 'RL') {
                      $mr->recover($_GET['File']);
                      $this->success( '数据库还原成功！',U("Config/dbbak"),1);
                } elseif ($_GET['Action'] == 'Del') {
                      if (@unlink($DataDir . $_GET['File'])) {
                          $this->success('删除成功！',U("Config/dbbak"));
                      } else {
                          $this->error('删除失败！',U("Config/dbbak"));
                      }
                }

                if ($_GET['Action'] == 'download') {
                    function DownloadFile($fileName) {
                            ob_end_clean();
                            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                            header('Content-Description: File Transfer');
                            header('Content-Type: application/octet-stream');
                            header('Content-Length: ' . filesize($fileName));
                            header('Content-Disposition: attachment; filename=' . basename($fileName));
                            readfile($fileName);
                    }
                    DownloadFile($DataDir . $_GET['file']);
                    exit();
                }
            }

            $file_list= $this->MyScandir('databak/');
            $this->assign("datadir",$DataDir);
            $this->assign("file_list", $file_list);
            $this->assign("title"," 备份数据库-借贷管理系统");
            $this->display();
    }

    private function MyScandir($FilePath = './', $Order = 0) {
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath))) {
            $FileAndFolderAyy[] = $filename;
        }

        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }
}