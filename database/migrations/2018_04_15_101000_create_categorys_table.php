<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 废旧资源分类表
 */
class CreateCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default('')->comment('类别名称')->unique();
            $table->string('display_name', 50)->default('')->comment('显示名称')->index();
            $table->string('description', 50)->default('')->comment('说明信息');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorys');
    }
}
