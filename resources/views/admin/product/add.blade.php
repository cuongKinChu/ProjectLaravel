@extends('layout.main-admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mb-5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content p-1">
    <form action="" method="POST" roles="form" enctype="multipart/form-data">      
      @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Tên Sản Phẩm</label>
                            <input type="text" name="product_name" id="inputName" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>

                        <div class="form-group">
                            <label for="inputPrice">Giá Sản Phẩm</label>
                            <input type="number" name="price" id="inputPrice" class="form-control" placeholder="Nhập giá sản phẩm" >
                        </div>

                        <div class="form-group">
                                <label for="inputImg">Ảnh Sản Phẩm</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                        <div class="form-group">
                                <label for="inputDescription">Mô Tả</label>
                                <textarea id="content" name="description" class="form-control"></textarea>
                        </div>
                        @include('admin.alert')
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="row p-1">
            <div class="col-12">
                <a href="" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new product" class="btn btn-success float-right" >
            </div>
        </div>
        </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection