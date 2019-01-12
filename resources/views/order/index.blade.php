<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>訂單檢視</title>

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
      <h1 class="my-4">訂單
        <small></small>
      </h1>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th width="10" style="text-align: center">訂單編號</th>
            <th width="20" style="text-align: center">總金額</th>
            <th width="20" style="text-align: center">查看明細</th>
            <th width="20" style="text-align: center">動作</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $od)
          <tr>
            <td>{{$od -> id}}</td>
            <td>{{$od -> total}}</td>
            <td>
              <div>
                <a class="btn btn-primary" href="{{ route('detail.index', $od->id) }}">檢視內容</a>
              </div>
            </td>
            <td>
              <div>
                <form action="#" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <a class="btn btn-primary">刪除訂單</a>
                </form>
              </div>
            </td>
          </tr>
          
      <!-- /.row -->
          @endforeach
        </tbody>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

  </body>

</html>
