<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initResourceCategory();
    }

    /**
     * 初始化资源分类
     */
    public function initResourceCategory()
    {
        DB::table('categorys')->insert([
            [
                'name' => 'WasteTextileproducts',
                'display_name' => '废纺织制品',
            ],
            [
                'name' => 'LeatherGoods',
                'display_name' => '废皮革制品',
            ],
            [
                'name' => 'WasteWood',
                'display_name' => '废木制品',
            ],
            [
                'name' => 'WastePaperproductions',
                'display_name' => '废纸制品',
            ],
            [
                'name' => 'WasteRubberproducts',
                'display_name' => '废橡胶制品',
            ],
            [
                'name' => 'WastePlasticproducts',
                'display_name' => '废塑料制品',
            ],
            [
                'name' => 'WasteBuildingmaterialsandproducts',
                'display_name' => '废建筑材料制品',
            ],
            [
                'name' => 'WasteGlassandproducts',
                'display_name' => '废玻璃及制品',
            ],
            [
                'name' => 'ScrapSteelanditsproducts',
                'display_name' => '废钢铁及制品',
            ],
            [
                'name' => 'WasteNon-ferrousmetalsandproducts',
                'display_name' => '废有色金属及制品',
            ],
            [
                'name' => 'MechanicalProducts',
                'display_name' => '废机械产品',
            ],
            [
                'name' => 'WasteTransportationequipment',
                'display_name' => '废交通运输设备',
            ],
            [
                'name' => 'WasteBatteries',
                'display_name' => '废电池',
            ],
            [
                'name' => 'WasteLightingappliance',
                'display_name' => '废照明器具',
            ],
            [
                'name' => 'WasteElectricalappliances',
                'display_name' => '废电器电子产品',
            ]
        ]);
    }
}
