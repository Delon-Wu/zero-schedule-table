<?php
namespace app\index\controller;

use app\index\model\Courses as CoursesModel;
use think\Session;
use think\Cookie;

class Courses extends Auth{
    protected $beforeActionList = ['isAuthed' =>['only'=>'submit']];
    public function submit(){

        $email = Session::get('email','/');
        $user = new CoursesModel();
        
        $result = $user->where('email',$email)->find();
        if($result){
            $user->where('email',$email)->delete();
            $user->email = $email;
            $user->Mon = input('post.Mon') ;                   //Q1：这里在纠结数据到底是在后端处理呢还是前端，另外传数组进数据库不是我的本意:) 是尝试之后的无奈之举 TAT
            $user->Tue = input('post.Tue') ;
            $user->Wed = input('post.Wed') ;
            $user->Thur = input('post.Thur') ;
            $user->Fri = input('post.Fri') ;
            $user->Sat = input('post.Sat') ;
            $user->Sun = input('post.Sun') ;
            $saveResult = $user->save();
            if($saveResult){
                $courseData = $user->select();
                return json_encode($courseData);
            }else{
                return json_encode([
                    'code' => '0002',
                    'msg' => 'Something wrong:('
                ]);
            }
        }else{
            $user->email = $email;
            $user->Mon = input('post.Mon') ;
            $user->Tue = input('post.Tue') ;
            $user->Wed = input('post.Wed') ;
            $user->Thur = input('post.Thur') ;
            $user->Fri = input('post.Fri') ;
            $user->Sat = input('post.Sat') ;
            $user->Sun = input('post.Sun') ;
            $saveResult = $user->save();
            if($saveResult){
                $courseData = $user->select();
                return json_encode($courseData);
            }else{
                return json_encode([
                    'code' => '0002',
                    'msg' => 'Something wrong:('
                ]);
            }
        }
    }
    public function load_data(){
        $user = new CoursesModel();
        $courseData = $user->select();
        return json_encode($courseData);
        if(!$courseData){
            return json_encode([
                'code' => '0003',
                'msg' => 'Fail to query data:('
            ]);
        }
    }
}