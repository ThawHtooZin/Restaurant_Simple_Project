@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Kitchen Panel</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Dishes</h3>
              <a href="/dish/create" class="btn btn-success" style="float:right;">Create</a>
          </div>

          <div class="card-body">
            @if(session('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
            @endif
            <table id="dishes" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Dish Name</th>
                  <th>Category Name</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dishes as $dish)
                  <tr>
                    <td>{{$dish->name}}</td>
                    <td>{{$dish->category->name}}</td>
                    <td>{{$dish->created_at}}</td>
                    <td>
                      <a style="height:40px; margin-right:10px;" href="/dish/{{$dish->id}}/edit" class="btn btn-warning">Edit</a>
                      <form action="/dish/{{$dish->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->

@endsection
<script src="plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
  $('#dishes').DataTable({
    "paging":true,
    "pageLength":3,
    "lengthChanging":false,
    "ordering":true,
    "info":true,
  })
});
</script>
