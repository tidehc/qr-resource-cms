<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 废旧资源信息表
 */
class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->default(0)->comment('所属分类ID');
            $table->string('product_name', 50)->default('')->comment('物品名称')->index();
            $table->string('menufactoring_number')->default('')->comment('出厂编号')->unique();
            $table->string('number_auth')->default('')->comment('编号授权方');
            $table->string('recycle_number')->default('')->comment('回收编号')->unique();
            $table->unsignedTinyInteger('toxic')->default(0)->comment('毒害性。默认0，表示无毒害');
            $table->string('poison_category', 50)->default('')->comment('毒害类别')->index();
            $table->integer('weight')->unsigned()->default(0)->comment('重量')->index();
            $table->integer('quantity')->unsigned()->default(0)->comment('数量');
            $table->string('jiao_hui_ren', 50)->default('')->comment('交回人');
            $table->string('recycle_area')->default('')->comment('回收地区');
            $table->string('recycle_company')->default('')->comment('回收企业');
            $table->dateTime('recycle_time')->default('1970-01-01 00:00:00')->comment('回收时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
