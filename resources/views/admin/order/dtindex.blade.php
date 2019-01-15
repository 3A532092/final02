@extends('admin.layouts.master')

@section('title', '訂單檢視')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            訂單檢視 <small>訂單明細列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 訂單檢視
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row" style="margin-bottom: 20px; text-align: right">
    <div class="col-lg-12">
        <a href="{{ route('admin.order.index') }}" class="btn btn-success">返回訂單管理</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30" style="text-align: center">明細編號</th>
                        <th width="30" style="text-align: center">顯卡編號</th>
                        <th width="70" style="text-align: center">數量</th>
                        <th width="30" style="text-align: center">總額</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orderdetails as $de)
                    <tr>
                        <td>{{$de->id}}</td>
                        <td>{{$de->gc_id}}</td>
                        <td>{{$de->de_qy}}</td>
                        <td>{{$de->sum}}</td>
                    </tr>
                @endforeach                
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
