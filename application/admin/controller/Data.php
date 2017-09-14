<?php
namespace app\admin\controller;

use app\common\model\Data as DataModel;
use app\common\controller\AdminBase;
use think\Db;
use PHPExcel_IOFactory;
use PHPExcel;
/**
 * 数据管理
 * Class Data
 * @package app\admin\controller
 */
class Data extends AdminBase
{
    protected $data_model;

    protected function _initialize()
    {
        parent::_initialize();
        $this->data_model = new dataModel();
    }

    /**
     * 友情链接
     * @return mixed
     */
    public function index()
    {
       

        return $this->fetch('index');
    }

    /**
     * 导入
     * @return mixed
     */
    public function in()
    {
        return $this->fetch();
    }

    public function upload(){
        if(request()->isPost()){
            // 获取表格数据
            $excel = request()->file('excel')->getInfo();

            $post  = $this->request->param();
            
            // 获取文件后缀
            $type = substr(strrchr($excel['name'], '.'), 1);

          if($type=='xls'||'xlsx')

                $types = array('xls'=>'Excel5','xlsx'=>'Excel2007');
                //设置为Excel5代表支持2003或以下版本，Excel2007代表2007版  
                $xlsReader = PHPExcel_IOFactory::createReader($types[$type]);    
                $xlsReader->setReadDataOnly(true);  
                $xlsReader->setLoadSheetsOnly(true);  
                $Sheets = $xlsReader->load($excel['tmp_name']);  
                //开始读取上传到服务器中的Excel文件，返回一个二维数组  
                $dataArray = $Sheets->getSheet(0)->toArray();  
                // dump($dataArray);exit;
                
               switch ($post['tab']) {
                   case 'weixin':
                        foreach($dataArray as $vo)
                        {
                            $data[] = ['username'=>$vo['0'],'sdmu'=>$vo['1']];
                            
                        }
                        $result = Db::name('weixin')->insertAll($data);
                       break;
                   
                   case 'phone':
                       foreach($dataArray as $vo)
                        {
                            $data[] = ['phone'=>$vo['0'],'phoneid'=>$vo['1']];
                            
                        }
                        $result = Db::name('phone')->insertAll($data);
                       break;
               }

                // 数据传入 姓名与账户
                


                
                if($result){
                    $this->success('导入数据成功，添加'.$result.'条');
                }else{
                    $this->error('请检查表格，或联系管理员！');
                }
                

            }else{
                $this->error('上传文件不合法！');
            }
            
    }
    public function out()
    {
        return $this->fetch();
    }
    /**
     * 导出
     * @return mixed
     */
    public function download()
    {
        $post  = $this->request->param();
        // dump($post);
        // 键名获取成为数组
        // $field = array_keys($post['name']); 
        // 数组转字符串
        // $field = implode(',',$field);
        // dump($field);
        // exit;
        $field = 'id,username,sdmu,sdopen,phone,phoneid,open,remark';
        // 获取导出的数据
        $data = Db::name('weixin')->field($field)->where(['status'=>'1'])->select();
        // dump($data);exit;
        // 建立对象
        $PHPExcel = new PHPExcel();
        // 获取当前活动sheet的操作对象
        $PHPSheet = $PHPExcel->getActiveSheet();
        // 给当前活动sheet设置名称
        $PHPSheet->setTitle('山东管理学院学生表');
        // 标签
        $PHPSheet
            ->setCellValue('A1','id')
            ->setCellValue('B1','姓名')
            ->setCellValue('C1','sdmu')
            ->setCellValue('D1','sdmu开通状态')
            ->setCellValue('E1','手机号码')
            ->setCellValue('F1','手机串号')
            ->setCellValue('G1','手机号码开通状态')
            ->setCellValue('H1','备注');

        $open = ['未开通','开通'];
        // dump($open);exit;
        foreach($data as $k=>$vo)
        {
            $num = $k + 2;
            // 按照指定格式生成Excel文件
            $PHPSheet
            ->setCellValue('A'.$num,$vo['id'])
            ->setCellValue('B'.$num,$vo['username'])
            ->setCellValue('C'.$num,"'".$vo['sdmu'])
            ->setCellValue('D'.$num,$open[$vo['sdopen']])
            ->setCellValue('E'.$num,"'".$vo['phone'])
            ->setCellValue('F'.$num,"'".$vo['phoneid'])
            ->setCellValue('G'.$num,$open[$vo['open']])
            ->setCellValue('H'.$num,$vo['remark']);
        }
        

        $types = array('xls'=>'Excel5','xlsx'=>'Excel2007');
        $PHPWriter = PHPExcel_IOFactory::createWriter($PHPExcel,$types[$post['type']]);
        // 判断是否存在这个文件
        if(is_file('./sdglxy.'.$post['type'])){
            unlink ('./sdglxy.'.$post['type'] );
        }
        
        // 生成文件
        $PHPWriter->save('./sdglxy.'.$post['type']);
        // 获取链接
        $link = 'http://'.$_SERVER['HTTP_HOST'].'/sdglxy.'.$post['type'];
        // dump($link);exit;
        return $this->fetch('download',['link'=>$link]);
    }




}