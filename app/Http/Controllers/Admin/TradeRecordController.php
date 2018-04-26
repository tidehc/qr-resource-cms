<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\TradeRecord;
use App\Category;

/**
 * 交易记录控制器
 */
class TradeRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tradeRecords = TradeRecord::orderBy('id', 'desc')->paginate(10);

        return view('admin.tradeRecord.index', [
            'tradeRecords' => $tradeRecords
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

        return view('admin.tradeRecord.create', [
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
            'order_number' => ['required', 'max:255'],
            'menufactoring_number' => ['required', 'max:255'],
            'product_name' => ['required', 'max:255'],
            'category_id' => ['required', 'numeric'],
            'weight' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'product_price' => ['required', 'numeric'],
            'order_time' => ['required', 'regex:/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/'],
            'toxic' => ['required', 'numeric'],
            'trader' => ['required', 'max:255'],
            'recycler' => ['required', 'max:255'],
            'memo' => ['nullable', 'max:255'],
        ], [
            'order_number.required' => '交易订单号不能为空',
            'order_number.max' => '交易订单号不能超过:max个字符',
            'menufactoring_number.required' => '出厂编号不能为空',
            'menufactoring_number.max' => '出厂编号不能超过:max个字符',
            'product_name.required' => '物品名称不能为空',
            'product_name.max' => '物品名称不能超过:max个字符',
            'category_id.required' => '分类ID不能为空',
            'category_id.numeric' => '分类ID必须是数字',
            'weight.required' =>'重量不能为空',
            'weight.numeric' =>'重量必须是数字',
            'quantity.required' =>'数量不能为空',
            'quantity.numeric' =>'数量必须是数字',
            'product_price.required' => '价格不能为空',
            'product_price.numeric' => '价格必须是数字',
            'order_time.required' => '成交时间不能为空',
            'order_time.regex' => '成交时间格式不符（YYYY-mm-dd HH:ii:ss）',
            'toxic.required' => '毒害性不能为空',
            'toxic.numeric' => '毒害性必须是数字',
            'trader.required' => '交易商不能为空',
            'trader.max' => '交易商不能超过:max个字符',
            'recycler.required' => '回收商不能为空',
            'recycler.max' => '回收商不能超过:max个字符',
            'memo.max' => '备注不能超过:max个字符',
        ])->validate();

        $tradeRecord = new TradeRecord;
        $tradeRecord->order_number = $input['order_number'];
        $tradeRecord->menufactoring_number = $input['menufactoring_number'];
        $tradeRecord->product_name = $input['product_name'];
        $tradeRecord->category_id = $input['category_id'];
        $tradeRecord->weight = $input['weight'];
        $tradeRecord->quantity = $input['quantity'];
        $tradeRecord->product_price = $input['product_price'];
        $tradeRecord->order_time = $input['order_time'];
        $tradeRecord->toxic = $input['toxic'];
        $tradeRecord->trader = $input['trader'];
        $tradeRecord->recycler = $input['recycler'];
        $tradeRecord->memo = empty($input['memo']) ? '' : $input['memo'];

        if ($tradeRecord->save()) {
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
        $tradeRecord = TradeRecord::find($id);

        return view('admin.tradeRecord.show', [
            'tradeRecord' => $tradeRecord
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
        $tradeRecord = TradeRecord::where('id', $id)->first();
        $categorys = Category::all();

        return view('admin.tradeRecord.edit', [
            'tradeRecord' => $tradeRecord,
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
            'order_number' => ['required', 'max:255'],
            'menufactoring_number' => ['required', 'max:255'],
            'product_name' => ['required', 'max:255'],
            'category_id' => ['required', 'numeric'],
            'weight' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'product_price' => ['required', 'numeric'],
            'order_time' => ['required', 'regex:/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/'],
            'toxic' => ['required', 'numeric'],
            'trader' => ['required', 'max:255'],
            'recycler' => ['required', 'max:255'],
            'memo' => ['nullable', 'max:255'],
        ], [
            'order_number.required' => '交易订单号不能为空',
            'order_number.max' => '交易订单号不能超过:max个字符',
            'menufactoring_number.required' => '出厂编号不能为空',
            'menufactoring_number.max' => '出厂编号不能超过:max个字符',
            'product_name.required' => '物品名称不能为空',
            'product_name.max' => '物品名称不能超过:max个字符',
            'category_id.required' => '分类ID不能为空',
            'category_id.numeric' => '分类ID必须是数字',
            'weight.required' =>'重量不能为空',
            'weight.numeric' =>'重量必须是数字',
            'quantity.required' =>'数量不能为空',
            'quantity.numeric' =>'数量必须是数字',
            'product_price.required' => '价格不能为空',
            'product_price.numeric' => '价格必须是数字',
            'order_time.required' => '成交时间不能为空',
            'order_time.regex' => '成交时间格式不符（YYYY-mm-dd HH:ii:ss）',
            'toxic.required' => '毒害性不能为空',
            'toxic.numeric' => '毒害性必须是数字',
            'trader.required' => '交易商不能为空',
            'trader.max' => '交易商不能超过:max个字符',
            'recycler.required' => '回收商不能为空',
            'recycler.max' => '回收商不能超过:max个字符',
            'memo.max' => '备注不能超过:max个字符',
        ])->validate();

        $tradeRecord = TradeRecord::find($id);
        $tradeRecord->order_number = $input['order_number'];
        $tradeRecord->menufactoring_number = $input['menufactoring_number'];
        $tradeRecord->product_name = $input['product_name'];
        $tradeRecord->category_id = $input['category_id'];
        $tradeRecord->weight = $input['weight'];
        $tradeRecord->quantity = $input['quantity'];
        $tradeRecord->product_price = $input['product_price'];
        $tradeRecord->order_time = $input['order_time'];
        $tradeRecord->toxic = $input['toxic'];
        $tradeRecord->trader = $input['trader'];
        $tradeRecord->recycler = $input['recycler'];
        $tradeRecord->memo = empty($input['memo']) ? '' : $input['memo'];

        if ($tradeRecord->save()) {
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

    /**
     * 删除废弃资源
     * 
     * @return [type] [description]
     */
    public function delete(Request $request)
    {
        if (TradeRecord::destroy($request->id)) {
            return [
                'code' => 0,
                'msg' => '删除成功',
                'data' => '',
                'url' => ''
            ];
        } else {
            return [
                'code' => 1,
                'msg' => '删除失败，请重试',
                'data' => '',
                'url' => ''
            ];
        }
    }
}
