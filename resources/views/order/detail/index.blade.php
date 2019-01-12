<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>訂單明細</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/1-col-portfolio.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    @include('layouts.partials.navigation')

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">訂單明細
        <small><a class="btn btn-primary" href="{{ action('OrderController@index') }}">返回訂單列表</a></small>
      </h1>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th width="10" style="text-align: center">商品</th>
            <th width="20" style="text-align: center">顯卡名稱</th>
            <th width="20" style="text-align: center">數量</th>
            <th width="20" style="text-align: center">動作</th>
          </tr>
        </thead>
        <tbody>
      @foreach($orderdetails as $de)
        <tr>
          <td>{{$de -> id}}</td>
          <td>{{$de -> gc_name}}</td>
          <td>{{$de -> de_qy}}</td>
          <td>
            <div>
              <a class="btn btn-primary" href="#">更新</a>
              <form action="#" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}                                    
                <a class="btn btn-primary">刪除</a>
              </form>
            </div>
          </td>
        </tr>
      <!-- /.row -->
      @endforeach
      <tr>
        <td>總金額:</td>
        <td>{{$orders -> total}} 元</td>
      </tr>
      </tbody>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

  </body>

</html>
