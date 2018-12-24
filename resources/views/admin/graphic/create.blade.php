@extends('admin.layouts.master')

@section('title', '新增顯卡')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增顯卡 <small>請輸入顯卡資料</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 顯卡管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">        
        <form action="/admin/graphic" method="POST" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label>顯卡編號：</label>                
                <input name="gc_id" class="form-control" placeholder="請輸入顯卡編號">
            </div>

            <div class="form-group">
                <label>顯卡名稱：</label>                
                <input name="gc_name" class="form-control" placeholder="請輸入顯卡名稱">
            </div>

            <div class="form-group">
                <label>廠商：</label>                
                <input name="constructor" class="form-control" placeholder="請輸入廠商">
            </div>

            <div class="form-group">
                <label>價錢：</label>                
                <input name="price" class="form-control" placeholder="請輸入顯卡價格">
            </div>

            <div class="form-group">
                <label>晶片組：</label>                
                <input name="chipset" class="form-control" placeholder="請輸入顯卡晶片組">
            </div>

            <div class="form-group">
                <label>尺寸：</label>                
                <input name="size" class="form-control" placeholder="請輸入顯卡尺寸">
            </div>

            <div class="form-group">
                <label>功耗：</label>                
                <input name="gcp" class="form-control" placeholder="請輸入顯卡功耗">
            </div>

            <div class="form-group">
                <label>6 / 8 pin</label>
                <select name="6/8pin" class="form-control">
                    <option value="0">6 pin</option>
                    <option value="1">8 pin</option>
                </select>
            </div>

            <div class="form-group">
                <label>dx11f 跑分：</label>                
                <input name="dx11f" class="form-control" placeholder="請輸入顯卡dx11 f跑分">
            </div>


            <div class="form-group">
                <label>dx12t 跑分：</label>                
                <input name="dx12t" class="form-control" placeholder="請輸入顯卡dx12 t跑分">
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
