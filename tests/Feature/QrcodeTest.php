<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Libs\Qrcode\QrCode;

class QrcodeTest extends TestCase
{
    /**
     * Test QrCode
     *
     * @return void
     */
    public function testQrcode()
    {
        $resource = \App\Resource::first();
        $text = <<<EOD
CategoryId:{$resource->category_id}
ProductName:{$resource->product_name}
MenufactoringNumber:{$resource->menufactoring_number}
RecycleNumber:{$resource->recycle_number}
Toxic:{$resource->toxic}
PoisonCategory:{$resource->poison_category}
Weight:{$resource->weight}
Quantity:{$resource->quantity}
JiaoHuiRen:{$resource->jiao_hui_ren}
RecycleArea:{$resource->recycle_area}
RecycleCompany:{$resource->recycle_company}
RecycleTime:{$resource->recycle_time}
EOD;
        $label = <<<EOD
废弃资源二维条码标签
类别：{$resource->category->display_name}
名称：{$resource->product_name}
编号：{$resource->menufactoring_number}
编号授权：{$resource->number_auth}
EOD;
        dump($text);
        $qrcode = new QrCode($text, '');
        $qrcode->generate();

        $this->assertTrue(true);
    }

}

// 类别名称：123456
// 类别代号：123456
// 物品名称：聚乙烯篮子箱子
// 出厂编号：1234567890123456789012
// 回收编号：12345678901234567890123456
// 毒害性：无毒有毒
// 毒害类别：无毒性 
// 重量：1000.00公斤   
// 个数：50000件 
// 交回人：孙李赵王
// 回收地区：甘肃省临夏回族自治州积石山保安族东乡族撒拉族自治县吹麻滩镇
// 回收企业名称：包头市达尔罕茂明安联合旗黄金投资有限公司
// 回收时间：2017/3/26