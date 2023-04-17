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
            <h3 class="card-title">Create a delicious dish</h3>
              <a href="/dish" class="btn btn-default" style="float:right;">Back</a>
          </div>

          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="/dish" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category">
                    <option value="">Select Categorydis</option>
                    @foreach($categories as $cat)
                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Image</label><br>
                <input type="file" name="dish_image">
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
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
    // "pageLength":2,
    "lengthChanging":false,
    "ordering":true,
    "info":true,
  })
});
</script>
