<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 管理员用户表
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
            $table->string('password', 255)->default('')->comment('登录密码');
            $table->rememberToken();
            $table->string('logic', 50)->default('')->comment('用户注册');
            $table->string('address', 255)->default('')->comment('地址');
            $table->string('email', 255)->default('')->comment('电子邮件');
            $table->string('phone', 50)->default('')->comment('联系电话');
            
            $table->integer('production_enterprise_id')->unsigned()->comment('废弃资源原产品生产企业ID');
            $table->integer('seller_id')->unsigned()->comment('销售商ID');
            $table->integer('recycler_id')->unsigned()->comment('回收商ID');
            $table->integer('trader_id')->unsigned()->comment('交易商ID');
            $table->integer('logistics_provider_id')->unsigned()->comment('物流商ID');
            $table->integer('dismantling_enterprise_id')->unsigned()->comment('拆解企业ID');

            $table->foreign('production_enterprise_id')->references('id')->on('production_enterprises');
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('recycler_id')->references('id')->on('recyclers');
            $table->foreign('trader_id')->references('id')->on('traders');
            $table->foreign('logistics_provider_id')->references('id')->on('logistics_providers');
            $table->foreign('dismantling_enterprise_id')->references('id')->on('dismantling_enterprises');
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
