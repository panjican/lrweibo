@extends('layout.layout')


@section('content')
    <div id="welcomebox">
        <div id="registerbox">
            <h2>注册!</h2>
            <b>想试试Retwis? 请注册账号!</b>
            <form method="POST" action="{{url('user/register')}}">
                <table>
                    <tr>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </tr>

                    <tr>
                        <td>用户名</td><td><input type="text" name="user[name]"></td>
                    </tr>
                    <tr>
                        <td>密码</td><td><input type="password" name="user[password]"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><input type="submit" name="register" value="注册"></td></tr>
                </table>
            </form>
            <h2>已经注册了? 请直接登陆</h2>
            <form method="POST" action="{{url('user/login')}}">
                <table>
                    <tr>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </tr>
                    <tr>
                        <td>用户名</td><td><input type="text" name="user[name]"></td>
                    </tr><tr>
                        <td>密码:</td><td><input type="password" name="user[password]"></td>
                    </tr><tr>
                        <td colspan="2" align="right"><input type="submit" name="login" value="登陆"></td>
                    </tr></table>
            </form>
        </div>
    </div>
@stop