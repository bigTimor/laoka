@extends('layouts.jqmobi')

@section('header')
    <header id="header">
        <h1>添加临时客户</h1>
    </header>
@endsection

@section('content')
    <div id="content">
        <div class="panel">
            <form method="post" action="{{ url('add_customer_do') }}" enctype="multipart/form-data" onsubmit="return validate_add_customer()">
                {{ csrf_field() }}
                <table style="width:100%;margin-top: 5%;">
                    <tr>
                        <td style="width: 35%;text-align:right">头像:</td>
                        <td> <input type="file" name="picture_img" class="dropify" data-default-file="头像" data-show-remove="false" /></td>
                    </tr>
                    <tr>
                        <td style="width: 35%;text-align:right">姓名:</td>
                        <td><input name="username" type="text"></td>
                    </tr>
                    <tr>
                        <td style="width: 35%;text-align:right">性别:</td>
                        <td><label>男:<input type="radio" style="display: inline" checked="true" value="1" name="sex"></label> <label>女:<input type="radio" style="display: inline" value="0" name="sex"></label></td>
                    </tr>
                    <tr>
                        <td style="width: 35%;text-align:right">地址:</td>
                        <td>
                            <select name="province" style="width: 30%" onchange="get_city(true)">
                                <option value="">请选择省份</option>
                                @foreach($province as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            <select name="city" id="city" onchange="get_city(false)" style="width:30%;display: none">

                            </select>
                            <select name="districe" id="districe" style="width: 30%;display: none">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%;text-align: right">详细地址:</td>
                        <td><input name="address"  type="text"></td>
                    </tr>
                    <tr>
                        <td style="width: 35%;text-align:right">电话:</td>
                        <td><input name="telephone" type="text"></td>
                    </tr>
                    <tr>
                        <td style="width: 35%;text-align:right">微信:</td>
                        <td><input name="watche" type="text"></td>
                    </tr>
                    <tr>
                        <td style="width: 35%;text-align:right">装修预算:</td>
                        <td><input name="budget" type="text"></td>
                    </tr>
                    <tr>
                        <td style="width: 35%;text-align:right">看方案时间:</td>
                        <td><input name="scheme_time" type="text"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr><td colspan="2" style="text-align: center"><input type="submit" value="确定添加"></td></tr>
                    <tr><td colspan="2" style="text-align: center"><input type="reset" value="取消"></td></tr>
                </table>
            </form>
        </div>
    </div>
    </div>
@endsection
@section('footer')
    <div id="navbar" class="footer"></div>
@endsection
@section('js')
    <script src="{{ asset('dist/js/dropify.js') }}"></script>
    <script src="{{ asset('Js/jquery.form.js') }}"></script>
    <script>
        $('.dropify').dropify();

        function update_header_img() {
            alert($('meta[name="_token"]').attr('content'));
            $.ajaxFileUpload
            (
                {
                    url:"{{ url('upload_header_img') }}", //你处理上传文件的服务端
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    secureuri:false,
                    fileElementId:'picture_img',
                    dataType: 'json',
                    success: function (data)
                    {
                        alert(data.file_infor);
                    }
                }
            )
            return false;
        }
        function validate_add_customer() {
            var picture = $('input[name=picture]').val();
            var username = $('input[name=username]').val();
            var address = $('input[name=address]').val();
            var telephone = $('input[name=telephone]').val();
            var budget = $('input[name=budget]').val();
            if(username == '' || address == '' || telephone == '' || budget == ''){
                return false;
            }
        }
        function get_city(e) {
            if(e){
                var parent_id = $('select[name=province] option:selected').val();
            }else{
                var parent_id = $('select[name=city] option:selected').val();
            }

            if(parent_id){
                $.ajax({
                    url:"{{ url('get_city') }}",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type:'POST',
                    data:{
                        parent_id:parent_id
                    },
                    success:function (data) {
                        if(e){
                            document.getElementById("city").options.length = 0;
                            document.getElementById("districe").options.length = 0;
                            for(var i=0;i<data.length;i++){
                                document.getElementById("city").add(new Option(data[i]['name'],data[i]['id']));
                                $('#city').css('display','inline');
                                get_city(false);
                            }
                        }else{
                            document.getElementById("districe").length = 0;
                            for(var i=0;i<data.length;i++){
                                document.getElementById("districe").add(new Option(data[i]['name'],data[i]['id']));
                                $('#districe').css('display','inline');
                            }
                        }
                    }
                });
            }
        }
    </script>
@endsection
