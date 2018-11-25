@extends('layout.layout')



@section('content')
    <div class="container-narrow">
        <div class="masthead">
            <div class="pull-left"><span><a style="vertical-align: bottom;" href="{{url('user/index')}}">返回首页</a></span></div>
            <div class="user_nav pull-right"><a type="button" role="button" href="{{url('user/tologin')}}" class="btn btn-default">登录</a><a type="button" role="button" href="{{url('user/toregister')}}" class="btn btn-default">注册</a></div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="container high well">
            <form id="form" role="form" action="{{url('user/register')}}" method="post" class="form-signin">
                <h2 class="form-signin-heading">用户注册</h2>
                <div class="form-group">
                    <input id="username" type="text" name="user[name]" placeholder="用户名" required="required" autofocus="autofocus" pattern=".{3,20}" maxlength="20" class="form-control">
                    <label class="control-label">用户名至少需要包含一个字母，不能包含中文</label>
                </div>
                <div class="form-group">
                    <input id="password" type="password" name="user[password]" placeholder="密码" required="required" pattern=".{6,20}" maxlength="20" class="form-control">
                    <label class="control-label">密码最少6位</label>
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" class="btn btn-lg btn-primary btn-block">立即注册</button>
                </div>
            </form>
            <div class="alert noaccount center-block">
                <p class="text-center">已有账号，<a href="{{url('user/tologin')}}">登录</a></p>
            </div>
        </div>
    </div>
@stop