<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Validator;
use Redirect, Input, Response;
use Storage;
use Captcha;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('login',['except'=>['login','check','mews']]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //登录界面
    public function login()
    {
        return view('home.login');
    }

    //量尺画图页面
    public function measure(){
        return view('home.index');
    }

    //判断验证码是否正确
    public function check(request $request)
    {
        $verify = $request['verify'];
        if(Captcha::check($request['verify'])){
            echo 1;
        }else{
            echo 0;
        }
    }

    //首页
    public function index()
    {
        if(empty($_COOKIE['sw'])){
            $script = '<script language="javascript">';
            $script .= 'var screen_width = window.screen.width;';
            $script .= 'document.cookie = "sw = "+screen_width+"";';
            $script .= '</script>';
            echo $script;
        }else{
            if($_COOKIE['sw'] >= 768){
                return view('home.ipad');
            }else{
                return view('home.phone');
            }
        }
    }

    //添加临时客户
    public function add_customer_do(request $request){
        $data=array(
            'designer' =>json_decode($_COOKIE['user'])->u_id,
            'username' => $request['username'],
            'telephone' => $request['telephone'],
            'wetchat' => $request['wetchat'],
            'address' => $request['address'],
            'sex' => $request['sex'],
            'budget' => $request['budget'],
            'scheme_time' => $request['scheme_time'],
        );
        $validator = Validator::make($data,[
            'username' => 'required|min:2',
            'telephone' => 'required|unique:customer,telephone',
            'address' => 'required',
            'sex' => 'required',
            'budget' => 'required',
        ]);
        if($validator->fails()){
            if($validator->messages()){

            }
        }
        $data['picture'] = $this->upload_header_img($request);
        $a = Customer::create($data);
        return redirect('/');

    }

    //返回验证码的src
    public function mews(){
        return Captcha::create('common');
    }

    //返回省下面的市或市下面的县
    public function get_city(request $request){
        $city = DB::table('city')->select('id','name')->where('parent_id',$request['parent_id'])->get();
        echo json_encode($city);
    }

    //上传头像
    public function upload_header_img(request $request){
        if ($request->isMethod('post')) {

            $file = $request->file('picture_img');

            // 文件是否上传成功
            if ($file && $file->isValid()){
                // 获取文件相关信息
                //$originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                //$type = $file->getClientMimeType();     // image/jpeg

                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                if($bool){
                    return $filename;
                }
            }
        }
        return false;
    }

    //返回临时客户信息
    public function get_customer(request $request){
        if ($request->designer){
            $data = DB::table('customer')->select('id','username','picture','telephone','wetchat','budget','sex','address','scheme_time','measure_time')->where('designer',$request->designer)->get();
            if($data){
                $arr = array(
                    'status' => 1,
                    'retData' => $data,
                    'retErr' => ''
                );
                echo json_encode($arr);
                return ;
            }
        }
        $arr = array(
            'status' => 0,
            'retData' => '',
            'retErr' => '无临时客户!'
        );
        echo json_encode($arr);
        return ;
    }

    //返回菜单列表
    public function get_menu(request $request){
        $pid = $request->pid;
        $data = DB::table('menu')->where('pid',$pid)->get();
        if($data){
            $arr = array(
                'status' => 1,
                'retData' => $data,
                'retErr' => ''
            );
            echo json_encode($arr);
            return;
        }
        $arr = array(
            'status' => 0,
            'retData' => '',
            'retErr' => '网络连接错误!'
        );
        echo json_encode($arr);
        return;
    }

    //返回房间结构
    public function get_room(request $request){
        $pid = $request->pid;
        $data = DB::table('structure')->where('pid',$pid)->get();
        if($data){
            $arr = array(
                'status' => 1,
                'retData' => $data,
                'retErr' => ''
            );
            echo json_encode($arr);
            return;
        }
        $arr = array(
            'status' => 0,
            'retData' => '',
            'retErr' => '网络连接错误!'
        );
        echo json_encode($arr);
        return;
    }

    //返回风格图片
    public function get_img(request $request){
        if(empty($request->room_id)){
            if(empty($request->match_id)){
                $data = DB::table('theme')->where(['theme_id'=>$request->theme_id,'status'=>'1'])->get();
            }else{
                $data = DB::table('theme')->where(['theme_id'=>$request->theme_id,'match_id'=>$request->match_id])->get();
            }
        }else{
            $data = DB::table('theme')->where(['theme_id'=>$request->theme_id,'room_id'=>$request->room_id])->get();
        }
        if($data){
            $arr = array(
                'status' => 1,
                'retData' => $data,
                'retErr' => ''
            );
            echo json_encode($arr);
            return;
        }
        $arr = array(
            'status' => 0,
            'retData' => '',
            'retErr' => '网络连接错误!'
        );
        echo json_encode($arr);
        return;
    }

    public function upload_header(){
        $arr=array(
            'retErr' => '上传失败!'
        );
        echo json_encode($arr);
        return ;
    }

    //删除临时会员
    public function del_customer(request $request){
        if(!empty($request->id)){
            DB::table('customer')->where('id',$request->id)->delete();
            echo 1;
        }else{
            echo 0;
        }
        return ;
    }
}
