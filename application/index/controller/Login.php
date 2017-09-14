<?php
namespace app\index\controller;

use think\Config;
use think\Controller;
use think\Db;
use think\Session;


class Login extends Controller
{
    public function index()
    {
   //dump(session::get('weixin_id'));
        return $this->fetch();
    }
    /**
     * 登录验证
     * @return string
     */
    public function login()
    {
        if ($this->request->isPost()) {
            $data            = $this->request->only(['username', 'sdmu']);
            $validate_result = $this->validate($data, 'Login');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                $where['username'] = $data['username'];
                $where['sdmu'] = $data['sdmu'];

                $weixin = Db::name('weixin')->field('id,username,phone,status')->where($where)->find();
           //dump($weixin_user);exit;
                if (!empty($weixin)) {
                    if ($weixin['status'] != 1) {
                    	// 用户状态
                        $this->error('当前用户已禁用');
                    } else {

                     
                        Session::set('weixin_id', $weixin['id']);
                        Session::set('weixin_name', $weixin['username']);
                      
                        $this->success('登录成功', 'index/index/index',1);
                      
                    }
                } else {
                    $this->error('用户名或sdmu账号错误');
                }
            }
        }
    }

}
