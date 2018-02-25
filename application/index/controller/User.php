<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //查询user表数据
        // $data=Db::query("select * from user order by id desc");
        $data
        //给页面分配数据
        $this->assign('data',$data);
        //加载页面
        return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //加载页面
        return view();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //接收数据
        $data=input("post.");
        //插入数据库
        $rst=Db::execute("insert into user value(null,:name,:password,:age)",$data);
        if ($rst) {
            $this->success("用户已添加！",'/user/create','','1');
        }else{
            $this->error("用户添加失败！");
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //获取数据
        $data=Db::query("select * from user where id =?",[$id]);
        $this->assign('data',$data[0]);
        return view();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=input();
        $data=Request::instance()->except('_method');          
        $rst=Db::execute("update user set name=:name,password=:password,age=:age where id=:id",$data);
        // echo Db::getLastSql();
        if ($rst) {
            $this->success("修改成功！",'/user','',1);
        }else{
            $this->error("失败！");
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        $rst=Db::execute("delete from user where id=$id");
        if ($rst) {
                $this->success("删除成功！",'/user','',1);
        }else{
                $this->error('删除失败');
        }
    }


    public function ajax_del(){
        $id=input("post.id/d");
       $code=Db::execute("delete from user where id =$id");
       if ($code) {
           $data=[
                'statu'=>20,
                'info'=>'删了！'

           ];
       }else{
        $data=[
            'statu'=>10,
            'info'=>'没删掉！'

        ];
       }
       return $data;
    }




      // ajax 删除数据

    // public function ajax_del(){
        // 接收用户想要删除的ID

        // $id=input("post.id/d");

        // 执行删除操作

        // $code=Db::execute("delete from user where id =$id");

        // 判断是否删除成功

    //     if ($code) {
    //         # code...
    //         $data=[
    //             'statu'=>200,
    //             "info"=>'删除成功'
    //         ];
    //     }else{
    //         $data=[
    //             'statu'=>400,
    //             "info"=>'删除失败'
    //         ];
    //     }

    //     return $data;
    // }






}
