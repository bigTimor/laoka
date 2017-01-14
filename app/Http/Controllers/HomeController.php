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
        $this->middleware('login',['except'=>['login','do_login','mews']]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //登录界面
    public function login()
    {
        if(session('user_id')){
            return redirect('/');
        }else{
            return view('home.login');
        }
    }

    //验证是否登录成功
    public function do_login(request $request){
        if($request['username'] && $request['password'] && $request['verify']){
            if(Captcha::check($request['verify'])){
                $data = array(
                    'username' => $request['username'],
                    'password' => $request['password']
                );
                $res = $this->request_post('http://roco.honghaiweb.com/Api/index.php/App/Base/login',$data);
                $res = json_decode($res);
                if($res->status){
                    session()->put('user_id',$res->retData->u_id);
                    session()->put('user',json_encode($res->retData));
                    session()->put('session_id',$res->retData->session_id);
                    session()->put('auth_key',$res->retData->auth_key);
                    return redirect('/');
                }
                $errors = '账号密码错误！';
            }else{
                if(session('captcha')){
                    $errors = '验证码错误!';
                }else{
                    $errors = '网络连接错误!';
                }

            }
        }
        return redirect()->back()->withInput()->withErrors($errors);
    }

    //首页
    public function index()
    {
//        $data = array(
//            'session_id' => session('session_id'),
//            'auth_key' => session('auth_key')
//        );
//        $res = $this->request_post('http://roco.honghaiweb.com/Api/index.php/App/HongHaiFileSys/upload',$data);
//        $res = json_decode($res);
//        dd($res->retErr);
        if(empty($_COOKIE['sw'])){
            $script = '<script language="javascript">';
            $script .= 'var screen_width = window.screen.width;';
            $script .= 'document.cookie = "sw = "+screen_width+"";';
            $script .= '</script>';
            echo $script;
        }else{
            if($_COOKIE['sw'] >= 768){
                return view('home.ipad',['user_id'=>session('user_id'),'session_id'=>session('session_id'),'auth_key'=>session('auth_key'),'user'=>session('user')]);
            }else{
                return view('home.phone',['user_id'=>session('user_id'),'session_id'=>session('session_id'),'auth_key'=>session('auth_key'),'user'=>session('user')]);
            }
        }
    }

    //修改密码
    public function change_password(request $request){
        $arr = array(
            'status' => 0,
            'retErr' => ''
        );
        if($request['newpass'] != $request['re_newpass']){
            $arr['retErr'] = '两次输入的密码不一致!';
            echo json_encode($arr);
            return ;
        }
        if($request['password'] == $request['newpass'] ){
            $arr['status'] = 1;
            echo json_encode($arr);
            return ;
        }
        $data = array(
            'password' => $request['password'],
            'newpass' => $request['newpass'],
            're_newpass' => $request['newpass'],
            'session_id' => session('session_id'),
            'auth_key' => session('auth_key')
        );
        $res = $this->request_post('http://roco.honghaiweb.com/Api/index.php/App/Base/setUserInfo',$data);
        $res = json_decode($res);
        if($res->status){
            session()->put('auth_key',$res->retData);
            $arr['status'] = 1;
            echo json_encode($arr);
            return ;
        }else{
            $arr['retErr'] = $res->retErr;
            echo json_encode($arr);
            return;
        }
    }

    //退出登录
    public function logout(){
        session()->flush();
        return redirect('/login');
    }

    //添加临时客户
    public function add_customer_do(request $request){
        $data=array(
            'designer' =>session('user_id'),
            'username' => $request['username'],
            'telephone' => $request['telephone'],
            'wechat' => $request['wechat'],
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
        Customer::create($data);
        return redirect('/');
    }

    //添加正式客户
    protected function register_customer($id){
        $set = DB::table('customer')->select('username as c_name','telephone as c_phone_num','wechat as c_wechat','budget','sex','address','scheme_time','measure_time')->where('id',$id)->first();
        $set->session_id = session('session_id');
        $set->auth_key = session('auth_key');
        $res = $this->request_post('http://roco.honghaiweb.com/Api/index.php/App/Customer/addClient',$set);
        $res = json_decode($res);
        if($res->status == '1'){
            return $res->id;
        }else{
            return false;
        }
    }

    //上传量尺
    public function upload_measure(request $request){
        /*
         * 如果是临时客户,先将临时客户添加为正式客户
         * 上传量尺文件
         * 上传量尺数据
         *
         */

        if($request->prefix == 'temporary'){
            $customer_id = $this->register_customer($request->customer_id);
            if(!$customer_id){
                return redirect('/login');
            }
        }else{
            $customer_id = $request->customer_id;
        }

        $measure_data = array(
            'client_id' => $customer_id,
            'm_data' => $request->data,
            'md_time' => date('Y-m-d H:i:s'),
            'session_id' => session('session_id'),
            'auth_key' => session('auth_key')
        );
        $res = $this->request_post('http://roco.honghaiweb.com/Api/index.php/App/Customer/submitMeasure',$measure_data);
        $res = json_decode($res);
        dd($res);
    }

    //返回验证码的src
    public function mews(){
        echo Captcha::src('common');
    }

    //返回客户信息
    public function get_customer(request $request){
        if($request->val == 3){
            $data = DB::table('customer')->select('id as c_id','username as c_name','telephone as c_phone_num','wechat','budget','sex','address','scheme_time','measure_time')->where('designer',session('user_id'))->get();
            if($data) {
                $arr = array(
                    'status' => 1,
                    'retData' => array(
                        'page' => 1,
                        'data' => $data
                    ),
                    'retErr' => ''
                );
                echo json_encode($arr);
                return;
            }
        }else{
            $parameter = array(
                'session_id' => session('session_id'),
                'auth_key' => session('auth_key'),
            );
            $res = $this->request_post('http://roco.honghaiweb.com/Api/index.php/App/Customer/clientList',$parameter);
            $set = json_decode($res);
            if($set->status == 1){
                echo $res;
                return;
            }elseif($set->status == 102){

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
                if($request->style_id){
                    $theme = DB::table('menu')->where('pid',$request->style_id)->first();
                    if($theme){
                        $data = DB::table('theme')->where(['theme_id'=>$theme->id,'status'=>'1'])->get();
                        if($data){
                            $arr = array(
                                'status' => 1,
                                'retData' => $data,
                                'theme' => $theme,
                            );
                            echo json_encode($arr);
                            return ;
                        }
                    }
                }else{
                    $data = DB::table('theme')->where(['theme_id'=>$request->theme_id,'status'=>'1'])->get();
                }
            }else{
                $data = DB::table('theme')->where(['theme_id'=>$request->theme_id,'match_id'=>$request->match_id])->get();
            }
        }else if($request->theme_id){
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

    //手机端页面,返回风格与主题列表
    public function get_theme(request $request){
        $style_data = DB::table('menu')->where('pid','0')->get();
        $theme_data = DB::table('menu')->where('pid',$request->style_id)->get();
        if($style_data && $theme_data){
            $arr = array(
                'style_data' => $style_data,
                'theme_data' => $theme_data,
                'status' => 1
            );
        }else{
            $arr = array(
                'status' => 0,
                'retErr' => '没有该类设计'
            );
        }
        echo json_encode($arr);
        return;
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

    //访问接口
    protected function request_post($url = '', $parameter = '') {
        if (empty($url) || empty($parameter)) {
            return false;
        }

        $o = "";
        foreach ( $parameter as $k => $v )
        {
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $param = substr($o,0,-1);

        $postUrl = $url;
        $curlPost = $param;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
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
}
