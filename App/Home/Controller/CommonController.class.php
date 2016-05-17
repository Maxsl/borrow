<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
	  //初始化方法
    	 function _initialize(){
                  $this->change_late();
                  $this->check_login(U(MODULE_NAME/CONTROLLER_NAME));
                  $this->check_root();
         }

         public function change_late(){
                  $time  = getdate();
                  $now_time = mktime(0,0,0,$time['mon'],$time['mday'],$time['year']);
                  M('borrow_repayment')->where('real_repayment_time <= repayment_time')->setField('is_late',0);
                  M('borrow_repayment')->where('repayment_time < '.$now_time.' AND is_repayment = 0 OR real_repayment_time > repayment_time')->setField('is_late',1);
         }

         protected function check_login($return){
                     if($_SESSION['name'] == ""){
                        $_SESSION['surl']="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                        $this->error('未登录！请先登录！',U('Login/index'));
                     }
            }

            //检查权限
            public function check_root(){
                 $admin_name = $_SESSION['name'];
                 $admin_class = M('admin')->where("name='".$admin_name."'")->getfield('class');
                 $this->assign("admin_class",$admin_class);
                 $not_login = array("add_admin","add_admin_act","admin","del_user");
                 if ($admin_class == 2) {
                     if (in_array(ACTION_NAME,$not_login) || in_array(CONTROLLER_NAME,$not_login)) {
                             $this->error('你没有访问权限！',U('index/index'));
                     }
                 }
            }

}
