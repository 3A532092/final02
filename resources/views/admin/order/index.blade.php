@extends('admin.layouts.master')

@section('title', '訂單管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            訂單管理 <small>所有訂單列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 訂單管理
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30" style="text-align: center">訂單編號</th>
                        <th width="30" style="text-align: center">顧客名稱</th>
                        <th width="70" style="text-align: center">訂單總額</th>
                        <th width="30" style="text-align: center">訂單狀態</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($order as $od)
                    <tr>
                        <td>{{$od->id}}</td>
                        <td>{{$od->cs_id}}</td>
                        <td>$ {{$od->total}}</td>
                        <td>
                            <select name="status" class="form-control form-control-sm" onchange="window.document.location.href=this.options[this.selectedIndex].value;">
                                @if($od -> od_st == 0)
                                    <option value="{{route('admin.order.update',['id'=>$od->id,'status'=>0])}}">未處理</option>
                                    <option value="{{route('admin.order.update',['id'=>$od->id,'status'=>1])}}">已處理</option>
                                @elseif($od -> od_st == 1)
                                    <option value="{{route('admin.order.update',['id'=>$od->id,'status'=>1])}}">已處理</option>
                                    <option value="{{route('admin.order.update',['id'=>$od->id,'status'=>0])}}">未處理</option>
                                @endif
                                </select>
                            </td>
                        <td>
                            <div>
                                <a href="{{route('admin.detail.index', $od->id)}}">查看訂單內容</a>
                            </div>
                        </td>
                    </tr>
                @endforeach                
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
