<?php
namespace app\admin\controller;

use app\common\model\Weixin as WeixinModel;
use app\common\controller\AdminBase;
use think\Config;
use think\Db;

/**
 * 用户管理
 * Class AdminUser
 * @package app\admin\controller
 */
class Weixin extends AdminBase
{
    protected $weixin_model;

    protected function _initialize()
    {
        parent::_initialize();
        $this->weixin_model = new WeixinModel();
    }

    /**
     * 用户管理
     * @param string $keyword
     * @param int    $page
     * @return mixed
     */
    public function index($keyword = '', $page = 1)
    {
        // dump($_GET);exit;
        $map = [];
        if ($keyword) {
            $map['username|sdmu|phone'] = ['like', "%{$keyword}%"];
        }
        $weixin_list = $this->weixin_model->where($map)->order('id DESC')->paginate(15, false, ['page' => $page]);

        return $this->fetch('index', ['weixin_list' => $weixin_list, 'keyword' => $keyword]);
    }
    /**
     * 已经办卡用户
     * @param string $keyword
     * @param int    $page
     * @return mixed
     */
    public function index1($keyword = '',$phone = '', $page = 1)
    {
        $map = [];
        if(!$phone){
            $map['phone'] = ['like', "1%"];
        }else{
            $map['phone'] = ['like', "%{$phone}%"];
        }
       
        if ($keyword) {
            $map['username|sdmu'] = ['like', "%{$keyword}%"];
        }
        $weixin_list = $this->weixin_model->where($map)->order('id DESC')->paginate(15, false, ['page' => $page]);
     

        return $this->fetch('index1', ['weixin_list' => $weixin_list, 'keyword' => $keyword,'phone' => $phone]);
    }

     /**
     * 没有办卡用户
     * @param string $keyword
     * @param int    $page
     * @return mixed
     */
    public function index2($keyword = '',$phone = '', $page = 1)
    {
        $map = [];
        if(!$phone){
            $map['phone'] = ['like', ""];
        }else{
            $map['phone'] = ['like', "%{$phone}%"];
        }
       
        if ($keyword) {
            $map['username|sdmu'] = ['like', "%{$keyword}%"];
        }
        $weixin_list = $this->weixin_model->where($map)->order('id DESC')->paginate(15, false, ['page' => $page]);
     

        return $this->fetch('index2', ['weixin_list' => $weixin_list, 'keyword' => $keyword,'phone' => $phone]);
    }
    public function index3($keyword = '', $page = 1)
    {
        $map = [];
        if ($keyword) {
            $map['username|sdmu'] = ['like', "%{$keyword}%"];
        }
        $weixin_list = $this->weixin_model->where($map)->order('id DESC')->paginate(15, false, ['page' => $page]);
     

        return $this->fetch('index3', ['weixin_list' => $weixin_list, 'keyword' => $keyword]);
    }




    /**
     * 添加用户
     * @return mixed
     */
    public function add()
    {
        return $this->fetch();
    }

    /**
     * 保存用户
     */
    public function save()
    {
        if ($this->request->isPost()) {
            $data            = $this->request->post();
            $validate_result = $this->validate($data, 'Weixin');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                
                if ($this->weixin_model->allowField(true)->save($data)) {
                    $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }

    /**
     * 编辑用户
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $weixin = $this->weixin_model->find($id);

        return $this->fetch('edit', ['weixin' => $weixin]);
    }

    /**
     * 更新用户
     * @param $id
     */
    public function update($id)
    {
        if ($this->request->isPost()) {
            $data            = $this->request->post();

            $validate_result = $this->validate($data, 'Weixin');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                $user           = $this->weixin_model->find($id);
                $user->id       = $id;
                $user->username = $data['username'];
                // 手机号码不参与修改
                // $user->phone    = $data['phone'];
                $user->sdmu     = $data['sdmu'];
                $user->remark   = $data['remark'];
                $user->status   = $data['status'];
                
                
                if ($user->save() !== false) {
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
            }
        }
    }
    public function ajax($id)
    {
        if ($this->request->isPost()) {
            $data            = $this->request->post();

            $result = Db::name('weixin')->where(['id'=>$data['id']])->update(['open' => $data['open']] );
            
            echo $result;
        }
    }
    public function sdajax($id)
    {
        if ($this->request->isPost()) {
            $data            = $this->request->post();

            $result = Db::name('weixin')->where(['id'=>$data['id']])->update(['sdopen' => $data['open']] );
            
            echo $result;
        }
    }




    /**
     * 删除用户
     * @param $id
     */
    public function delete($id)
    {
        if ($this->weixin_model->destroy($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}