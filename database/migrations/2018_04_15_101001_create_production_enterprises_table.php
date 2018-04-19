<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 原产品生产企业表
 */
class CreateProductionEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_enterprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default('')->comment('企业名')->unique();
            $table->string('address', 255)->default('')->comment('详细地址');
            $table->string('contact', 50)->default('')->comment('联系人');
            $table->string('phone', 50)->default('')->comment('联系电话');
            $table->string('email', 255)->default('')->comment('电子邮箱');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_enterprises');
    }
}
