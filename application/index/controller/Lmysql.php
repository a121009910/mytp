<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Lmysql extends Controller{
	public function index(){
		// $data=Db::table('user')->select();
		// $data=Db::name('user')->select();
		// $data=db('user')->select();
		// $data=Db::table('user')->where('id','=','32')->whereor('id','>','35')->select();
		// $data=Db::table('user')->where('name','like','%龙%')->select();
		// $data=Db::table('user')->where('age','18')->where('name','某某')->select();
		// $data=db('user')->limit(1,3)->order('id','asc')->select();
		// $data=Db::table('user')->field('name 名字,age 年龄')->select();
		// $data=Db::table('user')->field("count(*) as tot")->select();
		// $data=Db::table('user')->field('age',true)->limit(3)->select();
		// $data=Db::table('user')->page(4,5)->select();
		// $data=Db::table('user')->field("password,count(*) tot")->group("password")->select();
		// $data=Db::table("user")->field("count(*) tot,password")->group("password")->select();
		$data=Db::table("user")->field("max(age) oldest,name")->having("oldest >= 60")->group("name")->select();
		// $data=Db::table("user")->field("count(name) num")->select();
		echo Db::getLastsql();
		dump($data);
		echo "<hr/>";
	}



	
}



