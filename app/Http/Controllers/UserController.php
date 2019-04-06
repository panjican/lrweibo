<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //进入默认页面
    public function  index() {
        return view('user.init');
    }

    //进入注册页面
    public function  toregister() {
        return view('user.toregister');
    }
    //进入登陆页面
    public function  tologin() {
        return view('user.tologin');
    }
    //注册
    public  function register(Request $request) {
        $user = $request->input('user');
        //校验参数
        $this->validate($request, [
            'user.name' => 'required|min:2|max:20',
            'user.password' => 'required|min:2|max:16'
        ], [
                'require' => ':attribute 为必填项',
                'min'     =>  ':attribute长度不能少于2位',
                'max'     => ':attribute长度不能多于16位'
         ],
        [
        'user.name'   => '姓名',
        'user.password' => '密码'
      ]);
        //判断用户名是否已存在
        $userNameKey = 'user:username:'. $user['name'] .':userid';
        $userId = Redis::get($userNameKey);
        if (!empty($userId)) {
            return redirect('user/index')->with('error', '用户名已被占用，请更换');
        }
        unset($userId);
        $uid = Redis::incr('global:user');
        $uidKey = 'user:userid:'. $uid;
        Redis::set($uidKey.':username', $user['name']);
        Redis::set($uidKey.':password', $user['password']);
        Redis::set($userNameKey, $uid);
        return redirect('user/index')->with('success', '注册成功');

    }

    //登陆
    public  function login(Request $request) {
        $user = $request->input('user');
        //校验参数
        $this->validate($request, [
            'user.name' => 'required|min:2|max:20',
            'user.password' => 'required|min:2|max:16'
        ], [
            'require' => ':attribute 为必填项',
            'min'     =>  ':attribute长度不能少于2位',
            'max'     => ':attribute长度不能多于16位'
        ],
            [
                'user.name'   => '姓名',
                'user.password' => '密码'
            ]);
        //判断用户名是否已存在
        $userNameKey = 'user:username:'. $user['name'] .':userid';
        $userId = Redis::get($userNameKey);
        if (empty($userId)) {
            return redirect('user/index')->with('error', '用户不存在');
        }
        $passwordKey = 'user:userid:'. $userId .':password';
        $password = Redis::get($passwordKey);

        if ($user['password'] != $password) {
            return redirect('user/index')->with('error', '密码错误');
        }

        Session::put('username', $user['name']);
        Session::put('userid', $userId);
        return redirect('user/home');

    }

    //退出登陆
    public function  logout() {
        Session::forget('username');
        return redirect('user/index')->with('success', '登出成功');
    }

    //主页
    public function home(Request $request) {
        $userid = Session::get('userid');
        $weiboListKey = 'archives:userid:'.$userid;

        $weiboList = Redis::lrange($weiboListKey, 0 , -1);
        $arr = array();
        if (!empty($weiboList)) {
            foreach ($weiboList as $postId) {
                $arr[] = Redis::hgetall('archives:id:'.$postId);
            }
        }

        return view('user.home', ['archives' => $arr]);
    }

    //发布微博
    public function saveweibo(Request $request) {
        $weibo = $request->input('weibo');
        $userid = $request->input('userid');
        $username = Session::get('username');
        $time = time();
        $weiboId = Redis::incr('global:archives');
        $weiboKey = 'archives:id:'.$weiboId;
        Redis::hmset($weiboKey, [
            'userid'=> $userid,
            'username'=> $username,
            'post_time'=> $time,
            'content'=> $weibo,
            'post_id' => $weiboId
            ]);
        $weiboListKey = 'archives:userid:'.$userid;
        Redis::lpush($weiboListKey, $weiboId);

        return redirect('user/home');
    }
}
