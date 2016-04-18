<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
	  //初始化方法
    	 function _initialize(){
                  $this->change_late();
                  $this->check_login(U(MODULE_NAME/CONTROLLER_NAME));
         }

         public function change_late(){
                  M('borrow_repayment')->where('repayment_time < '.time().' AND is_repayment = 0')->setField('is_late',1);
         	        M('borrow_repayment')->where('is_repayment = 1')->setField('is_late',0);
         }

         protected function check_login($return){
                     if($_SESSION['name'] == ""){
                        $_SESSION['surl']="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                        $this->error('未登录！请先登录！',U('Login/index'));
                     }
            }

}
