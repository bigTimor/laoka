<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建客户基本信息表
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('designer')->unsigned()->comment('客户表关联设计师id');
            $table->string('username','20')->comment('客户姓名');
            $table->string('picture','100')->comment('头像');
            $table->string('telephone','15')->unique()->comment('联系电话');
            $table->tinyInteger('sex')->unsigned()->comment('性别');
            $table->string('wetchat','15')->comment('微信');
            $table->string('city','100')->comment('地址(省市区)');
            $table->string('address','30')->comment('详细地址');
            $table->dateTime('ruler_time')->comment('量尺时间');
            $table->dateTime('scheme_time')->comment('看方案时间');
            $table->tinyInteger('budget')->comment('预算');
            $table->string('bugdet_log')->comment('预算备注');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
