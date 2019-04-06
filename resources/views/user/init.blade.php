@extends('layout.layout')



@section('content')
    <div class="container">
        <div class="user_nav pull-right">
            <a type="button" class="btn btn-default" role="button" href="{{url('user/tologin')}}">登录</a>
            <a type="button" class="btn btn-default" role="button" href="{{url('user/toregister')}}">注册</a>
        </div>
        <div class="header">
            <h3 class="text-muted"><a style="vertical-align: bottom;" href="{{url('user/index')}}">LR微博系统</a></h3>
        </div>


        <hr />

        <div class="col-md-10 media">
            <a class="pull-left" href="#">
                <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABN0lEQVR4Xu2YQQ6EIAxFdeXFODZnYu9qJk5C0sGiUiAx8FyKVPr76VPWEMJnmfhaEQAHsAXoARP3wIUmCAWgABSAAlBgYgXAIBgEg2AQDE4MAX6GwCAYBINgEAyCwYkVAIO1GPTe//nHOXfyU3xGG9PM1yNmzuRVDpCJ5ZKUyTwRoEfMqx3eTIBcJbdtW/Z9/w2XCtAqZncB5Atkkkc1NQFileVYFCi1fypcLqa1jzd1QM6+2va4EycKWRLTIkI3AY7FPKmmVmF5LxXvLmapCF0FiItp5QCZXClZulBAq/IVBtN9rvUAa8zSysfnqxxgfemb5iFA7Zfgm6ppWQsOwAEciXEkxpGYpXuOMgcKQAEoAAWgwCgd3ZIHFIACUAAKQAFL9xxlDhSAAlAACkCBUTq6JY/pKfAFwO6XkLwNdToAAAAASUVORK5CYII=" style="width: 64px; height: 64px;">
            </a>
            <div class="media-body">
                <h4 class="media-heading text-primary">重新定义奋斗</h4>
                <p>今天也要加油哦！！！2019年4月6日13点03分</p>
                <div class="row">
                    <div class="col-md-2"><span class="text-muted">1分钟前</span></div>
                    <div class="col-md-1 col-md-offset-10"><a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a> </div>
                    <div class="col-md-1"><span class="text-muted"><a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a> </span></div>
                </div>
            </div>
        </div>
    </div>
@stop