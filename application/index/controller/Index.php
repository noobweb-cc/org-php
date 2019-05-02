<?php
namespace app\index\controller;
use \think\Cookie;
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
            // 移动到框架应用根目录/public/static/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'upfiles');
            if($info){
                // echo ROOT_PATH . 'public' . DS . 'static' . DS . 'upfiles' . $info->getSaveName();
                $url = DS . 'upfiles'. DS . $info->getSaveName();
                // $url = str_ireplace($url, '\\', '/');
                return json(['code'=>'0', 'data' => ['url' => $url],'message'=>'上传成功']);
            }else{
                // 上传失败获取错误信息
                // echo $file->getError();
                return json(['code'=>'1', 'data' => ['url' => ''],'message'=>'上传失败哦~']);
            }
        }
    }
    /**
     * 设置cookie
     */
    public function setCookie()
    {
        // 设置Cookie 有效期为 3600秒
        Cookie::set('name','value',3600);
        return json(['code'=>'0','message'=>'设置成功']);
    }
    public function getCookie()
    {
        $cookie = Cookie::get('username');
        return str_ireplace('//78877//', '//', '/');
    }
}
