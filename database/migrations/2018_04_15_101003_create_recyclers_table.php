<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 回收商表
 */
class CreateRecyclersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recyclers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default('')->comment('商家名')->unique();
            $table->integer('category_id')->unsigned()->default(0)->comment('回收资源分类ID');
            $table->unsignedDecimal('product_price', 8, 2)->default('0.00')->comment('回收价格');
            $table->string('address', 255)->default('')->comment('详细地址');
            $table->string('contact', 50)->default('')->comment('联系人');
            $table->string('phone', 50)->default('')->comment('联系电话');
            $table->string('email', 255)->default('')->comment('电子邮箱');

            $table->foreign('category_id')->references('id')->on('categorys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recyclers');
    }
}
