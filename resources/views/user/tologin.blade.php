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

            <form class="form-signin" action="{{url('user/login')}}" role="form">
                <h2 class="form-signin-heading">用户登录</h2>
                <input type="text" class="form-control" name="user[name]" placeholder="用户名" required="" autofocus="">
                <input type="password" class="form-control" name="user[password]" placeholder="密码" required="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button class="btn btn-lg btn-primary btn-block" type="submit">立即登录</button>
            </form>
            <div class="alert noaccount center-block">
                还没有帐号？<a href="{{url('user/toregister')}}">注册</a>
            </div>
        </div>
    </div>

            <p class="text-center">
                <a href="getpass.htm">忘记密码？</a>
            </p>

        </div> <!-- /container -->
        </div>
    </div>

@stop