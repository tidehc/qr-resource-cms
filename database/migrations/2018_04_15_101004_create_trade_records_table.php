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
            $table->string('order_number')->default('')->comment('交易订单号')->unique();
            $table->string('menufactoring_number')->default('')->comment('物品出厂编号');
            $table->string('product_name', 50)->default('')->comment('物品名称')->index();
            $table->integer('category_id')->unsigned()->default(0)->comment('物品类别ID');
            $table->integer('weight')->unsigned()->default(0)->comment('重量');
            $table->integer('quantity')->unsigned()->default(0)->comment('数量');
            $table->unsignedDecimal('product_price', 8, 2)->default('0.00')->comment('价格');
            $table->integer('order_time')->unsigned()->default(0)->comment('成交时间');
            $table->unsignedTinyInteger('toxic')->default(0)->comment('毒害性。默认0，表示无毒害');
            $table->string('trader_id')->default('')->comment('交易商');
            $table->string('recycler_id')->default('')->comment('回收商');
            $table->string('memo')->default('')->comment('备注');
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
