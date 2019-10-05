<?php
namespace app\index\controller;
use think\Session;
use think\Cookie;
use think\Controller;

class Auth extends Controller{
    protected function isAuthed(){
        // if(Cookie::has('user')){
        //     Session::set('id',explode("::",Cookie::get('user'))[0]);
        //     Session::set('name',explode("::",Cookie::get('user'))[1]);
        // }
        if(!Session::has('email')){
            return json_encode(
                [
                    'code' => '0001',
                    'msg' => '长点心吧，还没登陆呢：（'
                ]
                );
        }
    }
}