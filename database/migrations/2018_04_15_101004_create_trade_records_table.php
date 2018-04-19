<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 废旧资源交易记录表
 */
class CreateTradeRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no', 255)->default('')->comment('交易订单号')->unique();
            $table->string('menufactoring_no', 255)->default('')->comment('物品出厂编号');
            $table->string('product_name', 50)->default('')->comment('物品名称')->index();
            $table->integer('category_id')->unsigned()->default(0)->comment('所属资源分类ID');
            $table->integer('weight')->unsigned()->default(0)->comment('重量')->index();
            $table->integer('quantity')->unsigned()->default(0)->comment('数量');
            $table->unsignedDecimal('product_price', 8, 2)->default('0.00')->comment('价格');
            $table->integer('order_time')->unsigned()->default(0)->comment('成交时间')->index();
            $table->unsignedTinyInteger('toxic')->default(0)->comment('毒害性。默认0，表示无毒害');
            $table->integer('trader_id')->unsigned()->default(0)->comment('交易商')->index();
            $table->integer('recycler_id')->unsigned()->default(0)->comment('回收商')->index();
            $table->string('memo', 255)->default('')->comment('备注');
            
            $table->foreign('menufactoring_no')->references('menufactoring_no')->on('resources');
            $table->foreign('category_id')->references('id')->on('categorys');
            $table->foreign('recycler_id')->references('id')->on('recyclers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trade_records');
    }
}
