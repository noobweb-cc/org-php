<?php
namespace app\index\controller;

class Index extends \think\Controller
{
    public function index()
    {
        return 'nima';
    }
    public function home()
    {
        return 'home';
    }
    public function upload()
    {
        return $this->fetch('upload/index');
    }
    public function uploads(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        if($file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'upfiles');
            if($info){
                // 成功上传后 获取上传信息
                echo $info->getExtension(); // 文件后缀
                echo $info->getSaveName(); // 文件路径
                echo $info->getFilename(); // 文件名称
                echo '<br>';
                echo ROOT_PATH . 'public' . DS . 'upfiles' . $info->getSaveName();
                echo '<br>';
                echo 'public' . DS . 'upfiles'. DS . $info->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}
