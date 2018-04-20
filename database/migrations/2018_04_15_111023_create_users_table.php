<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 用户表
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->default('')->comment('用户登录名')->unique();
            $table->string('password')->default('')->comment('登录密码');
            $table->string('logic', 50)->nullable('')->comment('用户注册');
            $table->string('address')->nullable()->comment('地址');
            $table->string('email')->nullable()->comment('电子邮件');
            $table->string('phone', 50)->nullable()->comment('联系电话');
            $table->string('production_enterprise')->nullable()->comment('废弃资源原产品生产企业');
            $table->string('seller')->nullable()->comment('销售商');
            $table->string('recycler')->nullable()->comment('回收商');
            $table->string('trader')->nullable()->comment('交易商');
            $table->string('logistics_provider')->nullable()->comment('物流商');
            $table->string('dismantling_enterprise')->nullable()->comment('拆解企业');
            $table->string('memo')->nullable()->comment('备注');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
