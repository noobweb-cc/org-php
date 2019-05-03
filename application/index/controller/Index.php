<?php
namespace app\index\controller;
use \think\Cookie;
use \think\Db;
use \think\Request;

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
        $cookie = Cookie::get('name');
        return json(['code'=>'1', 'message'=>$cookie]);
    }
    public function checkpwd ($name, $value, $isCookie=true)
    {
        $find = Db::table('org_user')->where('name', $name)->find();
        $isRight = !$isCookie ? md5($value) == $find['psd'] : $value == $find['psd'];
        if ($isRight) {
            Cookie::set('name', $find['name'], 3600);
            Cookie::set('value', $find['psd'], 3600);
            return json(['code'=>'0', 'message'=>'登录正确~']);
        } else {
            return json(['code'=>'1', 'message'=>'登录错误~']);
        }
    }
    public function login ()
    {
        header('Access-Control-Allow-Origin:*');
        $cookieName = Cookie::get('name');
        if (empty($cookieName)) {
            $request = Request::instance();
            $param = $request->param();
            return $this->checkpwd($param['name'], $param['passwd'], false);
        } else {
            $value = Cookie::get('value');
            return $this->checkpwd($cookieName, $value, true);
        }
    }
}
