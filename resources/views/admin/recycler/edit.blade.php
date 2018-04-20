@extends('layouts.iframe')

@section('main')
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <form action="{{ url('admin/recycler/'. $recycler->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put')}}
          <div class="form-group">
            <label for="name">回收商名称：</label>
            <input class="form-control" id="name" name="name" value="{{ $recycler->name }}" type="text" placeholder="请输入回收商名或企业名" required="">
          </div>
          <div class="form-group">
            <label for="category_id">回收分类：</label>
            <select class="form-control" id="category_id" name="category_id" required="">
                <option>请选择一个回收的主要类别</option>
                @foreach($categorys as $v)
                  <option value="{{ $v->id }}" @if($v->id == $recycler->category->id)selected @endif>{{ $v->display_name }}</option>                  
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="product_price">回收价格：</label>
            <input class="form-control" id="product_price" name="product_price" value="{{ $recycler->product_price }}" type="text" placeholder="请输入回收价格" required="">
          </div>
          <div class="form-group">
            <label for="address">详细地址：</label>
            <input class="form-control" id="address" name="address" value="{{ $recycler->address }}" type="text" placeholder="请输入详细地址" required="">
          </div>
          <div class="form-group">
            <label for="contract">联系人：</label>
            <input class="form-control" id="contract" name="contact" value="{{ $recycler->contact }}" type="text" placeholder="请输入联系人" required="">
          </div>
          <div class="form-group">
            <label for="phone">手机号：</label>
            <input class="form-control" id="phone" name="phone" value="{{ $recycler->phone }}" type="text" placeholder="请输入电子邮箱" required="">
          </div>
          <div class="form-group">
            <label for="email">电子邮箱：</label>
            <input class="form-control" id="email" name="email" value="{{ $recycler->email }}" type="text" placeholder="请输入电子邮箱" required="">
          </div>
          <div class="form-group">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认修改</button>&nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection