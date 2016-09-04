@extends('admin.layout')
@section('title') {{ $title }}
@stop
@section('content')
<section class="content-header">
          <h1>
            Thêm admin mới
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('/admin/quan-tri-vien')}}">Quản trị viên</a></li>
            <li class="active">Thêm mới</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Thông tin admin mới</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ url('admin/do_add_user') }}" enctype="multipart/form-data">
                	{!! csrf_field() !!}
                	
                  <div class="box-body">
                    <p style="color:red; font-style: italic" ><?php echo Session::get('errorRegister') ?></p>
                  	 <div class="form-group">
                      <label for="exampleInputEmail1">Họ tên</label>
                      <input type="text" class="form-control" id="name" required name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="email" required name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="Password" class="form-control" id="password" required name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Xác nhận Password</label>
                      <input type="password" class="form-control" id="password_confirmation" required name="password_confirmation" placeholder="Password confirm">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputFile">Ảnh đại diện</label>
                      <input type="file" id="exampleInputFile" name="c_img">
                      
                      
                    </div>
                   	 <div class="form-group">
                   	 	<label for="optionsRadios">Phần quyền</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="role" id="optionsRadios" value="0" checked>
                          	Super Admin
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="role" id="optionsRadios" value="1" >
                          	Admin
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="role" id="optionsRadios" value="2" >
                            Poster
                        </label>
                      </div>
                    </div>

                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-user-plus" aria-hidden="true"></i> Thêm</button>
                    <a href="{{ url('/admin/quan-tri-vien')}}"><button type="button" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Trở về</button></a>
                  </div>
                </form>
              </div><!-- /.box -->

             

                 

            </div><!--/.col (left) -->
            <!-- right column -->


           <!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        @endsection