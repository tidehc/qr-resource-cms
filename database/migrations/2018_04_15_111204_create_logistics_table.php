<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 物流信息表
 */
class CreateLogisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logistics_number')->default('')->comment('物流单号')->unique();
            $table->string('product_name', 50)->default('')->comment('物品名称')->index();
            $table->integer('category_id')->unsigned()->default(0)->comment('物品分类ID');
            $table->unsignedDecimal('logistics_price', 8, 2)->default('0.00')->comment('物流价格');
            $table->dateTime('delivery_date')->default('1970-01-01 00:00:00')->comment('配送日期')->index();
            $table->dateTime('arrive_date')->default('1970-01-01 00:00:00')->comment('到达日期')->index();
            $table->string('delivery_man', 50)->default('')->comment('配送人');
            $table->string('receive_man', 50)->default('')->comment('接收人');
            $table->string('delivery_phone', 50)->default('')->comment('配送人电话');
            $table->string('receive_phone', 50)->default('')->comment('接收人电话');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistics');
    }
}
