<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
Route::get([
	'tdata'=>'index/index/tdata',
	'data2'=>'index/index/data2',
	'slct'=>'index/user/slct',
	'insert'=>'index/user/insert',
	'del'=>'index/user/del',
		]);

Route::resource('user','index/user');
