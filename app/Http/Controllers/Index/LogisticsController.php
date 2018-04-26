<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Logistics;
use App\Category;

/**
 * 物流信息管理控制器
 */
class LogisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logistics = Logistics::orderBy('id', 'desc')->paginate(10);

        return view('index.logistics.index', [
            'logistics' => $logistics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();

        return view('index.logistics.create', [
            'categorys' => $categorys
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input();
        
        Validator::make($input, [
            'logistics_number' => ['required', 'max:255', 'unique:logistics,logistics_number'],
            'product_name' => ['required', 'max:255'],
            'category_id' => ['required', 'numeric'],
            'logistics_price' => ['required', 'numeric'],
            'delivery_date' => ['required', 'regex:/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/'],
            'arrive_date' => ['required', 'regex:/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/'],
            'delivery_man' => ['required', 'max:50'],
            'receive_man' => ['required', 'max:50'],
            'delivery_phone' => ['required', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
            'receive_phone' => ['required', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
        ], [
            'logistics_number.required' => '物流单号不能为空',
            'logistics_number.max' => '物流单号不能超过:max个字符',
            'logistics_number.unique' => '物流单号已经存在',
            'product_name.required' => '物品名称不能为空',
            'product_name.max' => '物品名称不能超过:max个字符',
            'category_id.required' => '分类ID不能为空',
            'category_id.numeric' => '分类ID必须是数字',
            'logistics_price.required' =>'物流价格不能为空',
            'logistics_price.numeric' =>'物流价格必须是数字',
            'delivery_date.required' => '配送日期不能为空',
            'delivery_date.regex' => '配送日期格式不符（YYYY-mm-dd HH:ii:ss）',
            'arrive_date.required' => '到达日期不能为空',
            'arrive_date.regex' => '到达日期格式不符（YYYY-mm-dd HH:ii:ss）',
            'delivery_man.required' => '配送人不能为空',
            'delivery_man.max' => '配送人不能超过:max个字符',
            'receive_man.required' => '接收人不能为空',
            'receive_man.max' => '接收人不能超过:max个字符',
            'delivery_phone.required' => '配送人手机号不能为空',
            'delivery_phone.regex' => '配送人手机号格式不符',
            'receive_phone.required' => '接收人手机号不能为空',
            'receive_phone.regex' => '接收人手机号格式不符',
        ])->validate();

        $logistics = new Logistics;
        $logistics->logistics_number = $input['logistics_number'];
        $logistics->product_name = $input['product_name'];
        $logistics->category_id = $input['category_id'];
        $logistics->logistics_price = $input['logistics_price'];
        $logistics->delivery_date = $input['delivery_date'];
        $logistics->arrive_date = $input['arrive_date'];
        $logistics->delivery_man = $input['delivery_man'];
        $logistics->receive_man = $input['receive_man'];
        $logistics->delivery_phone = $input['delivery_phone'];
        $logistics->receive_phone = $input['receive_phone'];

        if ($logistics->save()) {
            return back()->with('success', '添加成功');
        } else {
            return back()->withErrors('添加失败，请重试');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logistics = Logistics::find($id);
        $categorys = Category::all();

        return view('index.logistics.show', [
            'logistics' => $logistics,
            'categorys' => $categorys
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logistics = Logistics::where('id', $id)->first();
        $categorys = Category::all();

        return view('index.logistics.edit', [
            'logistics' => $logistics,
            'categorys' => $categorys
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->input();
        
        Validator::make($input, [
            'logistics_number' => ['required', 'max:255'],
            'product_name' => ['required', 'max:255'],
            'category_id' => ['required', 'numeric'],
            'logistics_price' => ['required', 'numeric'],
            'delivery_date' => ['required', 'regex:/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/'],
            'arrive_date' => ['required', 'regex:/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/'],
            'delivery_man' => ['required', 'max:50'],
            'receive_man' => ['required', 'max:50'],
            'delivery_phone' => ['required', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
            'receive_phone' => ['required', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
        ], [
            'logistics_number.required' => '物流单号不能为空',
            'logistics_number.max' => '物流单号不能超过:max个字符',
            'product_name.required' => '物品名称不能为空',
            'product_name.max' => '物品名称不能超过:max个字符',
            'category_id.required' => '分类ID不能为空',
            'category_id.numeric' => '分类ID必须是数字',
            'logistics_price.required' =>'物流价格不能为空',
            'logistics_price.numeric' =>'物流价格必须是数字',
            'delivery_date.required' => '配送日期不能为空',
            'delivery_date.regex' => '配送日期格式不符（YYYY-mm-dd HH:ii:ss）',
            'arrive_date.required' => '到达日期不能为空',
            'arrive_date.regex' => '到达日期格式不符（YYYY-mm-dd HH:ii:ss）',
            'delivery_man.required' => '配送人不能为空',
            'delivery_man.max' => '配送人不能超过:max个字符',
            'receive_man.required' => '接收人不能为空',
            'receive_man.max' => '接收人不能超过:max个字符',
            'delivery_phone.required' => '配送人手机号不能为空',
            'delivery_phone.regex' => '配送人手机号格式不符',
            'receive_phone.required' => '接收人手机号不能为空',
            'receive_phone.regex' => '接收人手机号格式不符',
        ])->validate();

        $logistics = Logistics::find($id);
        $logistics->logistics_number = $input['logistics_number'];
        $logistics->product_name = $input['product_name'];
        $logistics->category_id = $input['category_id'];
        $logistics->logistics_price = $input['logistics_price'];
        $logistics->delivery_date = $input['delivery_date'];
        $logistics->arrive_date = $input['arrive_date'];
        $logistics->delivery_man = $input['delivery_man'];
        $logistics->receive_man = $input['receive_man'];
        $logistics->delivery_phone = $input['delivery_phone'];
        $logistics->receive_phone = $input['receive_phone'];

        if ($logistics->save()) {
            return back()->with('success', '更新成功，请刷新页面');
        } else {
            return back()->withErrors('更新失败，请重试');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
