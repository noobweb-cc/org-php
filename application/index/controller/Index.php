<?php
namespace app\index\controller;
use \think\Cookie;
use \think\Db;
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
    public function uploads () {
        $file = request()->file('image');
        if($file){
            // 移动到框架应用根目录/public/static/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'upfiles');
            if($info){
                $url = DS . 'upfiles'. DS . $info->getSaveName();
                return json(['code'=>'0', 'data' => ['url' => $url],'message'=>'上传成功']);
            }else{
                return json(['code'=>'1', 'data' => ['url' => ''],'message'=>'上传失败哦~']);
            }
        }
    }
    /**
     * 设置cookie
     */
    public function setCookie ()
    {
        // 设置Cookie 有效期为 3600秒
        Cookie::set('name','value',3600);
        return json(['code'=>'0','message'=>'设置成功']);
    }
    public function getCookie ()
    {
        // $cookie = Cookie::get('username');
        $data = Db::table('org_user')->where('id', 2)->select();
        return json(['code'=>'1', 'data' => $data,'message'=>'上传失败哦~']);
    }
}
