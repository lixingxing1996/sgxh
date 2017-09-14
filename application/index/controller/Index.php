<?php
namespace app\index\controller;

use app\common\controller\HomeBase;
use think\Db;
// 
use think\Session;
class Index extends HomeBase
{
	
    public function index()
    {
    	//dump($_POST);exit;
		
        $weixin= Db::name('weixin')->field('phone')->where(['id'=>Session::get('weixin_id')])->find();

      	if($weixin['phone']){
        
          $this->success('您已选号成功，跳转到查询页面', 'index/index/search','1');
        }else{
        // 获取姓名
        $username = Session::get('weixin_name');

        // 获取手机号码
        $where['status'] = '1';

        $phone_list= Db::name('phone')->field('phone')->where($where)->paginate(8,true);

        return $this->fetch('index', ['username' => $username,'phone_list' => $phone_list]);
        }
    }
    public function add()
    {
		 if ($this->request->isPost()) {
            $data            = $this->request->only(['phone', 'username','verify']);
            $validate_result = $this->validate($data, 'Add');
			$data['id'] = Session::get('weixin_id');
            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
               return $this->fetch('add',['data'=>$data]);
            }
        }
    }
    public function update()
    {
         if ($this->request->isPost()) {
            $data            = $this->request->only(['id','phone', 'username']);
            // 查询手机号码的。串列号码
            $value =  Db::name('phone')->field('phoneid')->where(['phone' =>$data['phone']])->find();
            $phoneid = $value['phoneid'];

            $result1 = Db::name('weixin')->where(['id'=>$data['id']])->update(['phone' =>$data['phone'],'phoneid' =>$phoneid]);
            $result2 = Db::name('phone')->where(['id'=>$data['id']])->update(['status' => 0] );
            
                $this->success('选号成功', 'index/index/index');
        }   
    }
  	public function search(){
      
       $data = Db::name('weixin')->where(['id'=>Session::get('weixin_id')])->find();

       return $this->fetch('search',['data'=>$data]);
    }
    public function logout()
    {
        Session::delete('weixin_id');
        Session::delete('weixin_name');
        $this->success('退出成功', 'index/login/index');
    }
}
