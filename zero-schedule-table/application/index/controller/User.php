<?php
namespace app\index\controller;

use app\index\model\User as UserModel;
use think\Session;
use think\Cookie;
use think\Validate;

class User extends Auth
{
    protected $beforeActionList = [
        'isAuthed'=>['only'=>'get_nick_name']
    ];

    public function login(){
        $email = input('post.email');
        $password = input('post.password');

        //判断格式是否正确
        $rule = [
            'password' => 'require',
            'email' => 'require|email',
        ];
        $msg = [
            'password.require' => '请输入密码，请输入密码，请输入密码~',
            'email.require' => '你看，又忘了填邮箱了吧~',
            'email.email' =>'不对哦，邮箱格式有误~',
        ];
        $data = [
            'password' => $password,
            'email' => $email,
        ];
        $validate = new Validate($rule,$msg);
        $result = $validate->check($data);
        if(!$result){
            return json_encode(
                [
                    'code' => '0001',
                    'msg' => $validate->getError()
                ]
                );
        }
        //验证账户存在否
        $user = new UserModel();
        $result = $user->where('email',$email)->find();
        if(!$result){
            return json_encode(
                [
                    'code' => '0001',
                    'msg' => '账号或密码错误!'
                ]
                );
        }

        //验证密码正确否

        $user = $user->where('email',$email)->where('password',md5($password))->find();
        if(!$user){
            return json_encode(
                [
                    'code' => '0002',
                    'msg' => '账号或密码错误2'
                ]
                );
        };
        Session::set('name',$user->nickname);
        Session::set('id',$user->id);
        Session::set('email',$user->email,'/',7*24*60*60);
        return json_encode(
            [
                'code' => '0000',
                'msg' => '登陆成功，OH yeah~'
            ]
            );
    }

    

    public function register(){
        if(!input('?post.email')){
            return json_encode(
                [
                    'code' => '0001',
                    'msg' => '请求参数有误'
                ]
                );
        }
        $email = input('post.email');
        $password = input('post.password');
        $nickName = input('post.nickName');

        $user = new UserModel();

        $result = $user->where('email',$email)->find();
        if($result!== null){
            return json_encode(
                [
                    'code' => '0001',
                    'msg' => '该用户已存在' 
                ]
                );
        }
        //注册到数据库
        $user->email = $email;
        $user->password = md5($password);
        $user->nickname = $nickName;
        $result = $user->save();
        if(!$result){
            return json_encode(
                [
                    'code' => '0001',
                    'msg' => '很遗憾，创建新用户失败，请联系管理员'
                ]
                );
        }
        return json_encode(
            [
                'code' => '0000',
                'msg' => '成功创建新用户'
            ]
            );
    }

    public function get_nick_name(){
        return json_encode(
            [
                'code' => '0000',
                'msg' => '成功获取用户名！',
                'data' => Session::get("name")
            ]
            );
    }
    //注销用户处理
    function logout(){
        Session::clear();

        Cookie::delete('user');
        return json_encode(
            [
                'code' => '0000',
                'msg' => '成功注销'
            ]
            );
    }
}