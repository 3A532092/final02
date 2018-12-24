@extends('admin.layouts.master')

@section('title', '顯卡管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            顯卡管理 <small>所有顯卡列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 顯卡管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row" style="margin-bottom: 20px; text-align: right">
    <div class="col-lg-12">
        <a href="{{ route('admin.graphic.create') }}" class="btn btn-success">新增顯卡</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30" style="text-align: center">顯卡編號</th>
                        <th width="70" style="text-align: center">顯卡名稱</th>
                        <th width="30" style="text-align: center">廠商</th>
                        <th width="30" style="text-align: center">價錢</th>
                        <th width="30" style="text-align: center">晶片組</th>
                        <th width="70" style="text-align: center">尺寸</th>
                        <th width="30" style="text-align: center">功耗</th>
                        <th width="30" style="text-align: center">6/8pin</th>
                        <th width="30" style="text-align: center">dx11f</th>
                        <th width="30" style="text-align: center">dx12t</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($graphiccard as $graphic)
                    <tr>
                        <td>{{$graphic->gc_id}}</td>
                        <td>{{$graphic->gc_name}}</td>
                        <td>{{$graphic->constructor}}</td>
                        <td>{{$graphic->price}}</td>
                        <td>{{$graphic->chipset}}</td>
                        <td>{{$graphic->size}}</td>
                        <td>{{$graphic->gcp}}</td>
                        <td>{{($graphic->pin)?'6 pin':'8 pin'}}</td>
                        <td>{{$graphic->dx11f}}</td>
                        <td>{{$graphic->dx12t}}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.graphic.edit', $graphic->gc_id) }}">編輯</a>
                                /
                                <form action="{{ route('admin.graphic.destroy', $graphic->gc_id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    
                                    <button class="btn btn-link">刪除</button>
                                </form>
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
