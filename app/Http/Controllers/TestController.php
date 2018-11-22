<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //测试方法
    public function info() {
    	return 'this is a test!';
    }
}
