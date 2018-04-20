<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 物流商表
 */
class CreateLogisticsProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistics_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default('')->comment('商家名')->unique();
            $table->unsignedDecimal('price', 8, 2)->default('0.00')->comment('价格');
            $table->string('phone', 50)->default('')->comment('电话');
            $table->string('email')->default('')->comment('电子邮箱');
            $table->string('contact', 50)->default('')->comment('联系人');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistics_providers');
    }
}
