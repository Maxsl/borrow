<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'borrow', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => 'root',  // 密码
	'DB_PORT'   => '3306', // 端口
	'DB_PREFIX' => '', // 数据库表前缀
	'SHOW_PAGE_TRACE' =>false,  //
	'SHOW_ERROR_MSG' =>    false,
	'ERROR_MESSAGE'  =>    '发生错误！',
	'DEFAULT_TIMEZONE'  =>    'Etc/GMT-8',
	// 'ERROR_PAGE' =>'http://www.myDomain.com/Public/error.html'

	//***********************************SESSION设置**********************************
	    'SESSION_OPTIONS'         =>  array(
	        'name'                =>  'YZCSESSION',                    //设置session名
	        'expire'              =>  36000,                      //SESSION保存1小时
	        'use_trans_sid'       =>  1,                               //跨页传递
	        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
	    ),
);

