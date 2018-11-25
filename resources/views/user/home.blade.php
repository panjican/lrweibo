@extends('layout.layout')


@section('content')
    <div class="container">
        <div class="user_nav pull-right">
            <p> 欢迎
                <span class="label label-success">
             @if (Session::has('username'))
                 {{ Session::get('username') }}
              @endif
                </span> ，<a href="{{url('user/logout')}}">退出</a>  </p>
        </div>
        <div class="header">
            <h3 class="text-muted"><a style="vertical-align: bottom;" href="{{url('user/home')}}">LR微博系统</a></h3>
        </div>


        <form class="form-inline" action="{{url('user/saveweibo')}}" role="form">
            <label class="sr-only" for="weiboContent">新鲜事:</label>
            <input type="text" class="form-control" id="weiboContent" name="weibo" size="120" placeholder="">
            <input type="hidden" name="userid" value="{{Session::get('userid')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-default">发布</button>
        </form>

        <hr />

        @if (!empty($archives))
            @foreach($archives as $archive)
                @if (!empty($archive))
                    <div class="col-md-10 media">
                        <a class="pull-left" href="#">
                            <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABN0lEQVR4Xu2YQQ6EIAxFdeXFODZnYu9qJk5C0sGiUiAx8FyKVPr76VPWEMJnmfhaEQAHsAXoARP3wIUmCAWgABSAAlBgYgXAIBgEg2AQDE4MAX6GwCAYBINgEAyCwYkVAIO1GPTe//nHOXfyU3xGG9PM1yNmzuRVDpCJ5ZKUyTwRoEfMqx3eTIBcJbdtW/Z9/w2XCtAqZncB5Atkkkc1NQFileVYFCi1fypcLqa1jzd1QM6+2va4EycKWRLTIkI3AY7FPKmmVmF5LxXvLmapCF0FiItp5QCZXClZulBAq/IVBtN9rvUAa8zSysfnqxxgfemb5iFA7Zfgm6ppWQsOwAEciXEkxpGYpXuOMgcKQAEoAAWgwCgd3ZIHFIACUAAKQAFL9xxlDhSAAlAACkCBUTq6JY/pKfAFwO6XkLwNdToAAAAASUVORK5CYII=" style="width: 64px; height: 64px;">
                        </a>

                                    <div class="media-body">
                                    <h4 class="media-heading text-primary"> {{ $archive['username'] }}</h4>
                                    <p>{{$archive['content']}}</p>
                                    <div class="row">
                                        <div class="col-md-10"><span class="text-muted">{{date('Y-m-d H:i:s', $archive['post_time'])}}</span></div>
                                        <div class="col-md-1 col-md-offset-10"><a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a> </div>
                                        <div class="col-md-1"><span class="text-muted"><a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a> </span></div>
                                    </div>

                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@stop