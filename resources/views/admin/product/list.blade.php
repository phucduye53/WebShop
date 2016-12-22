@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    @include('admin.blocks.error')
                      <div class="col-lg-12">
                        @if(Session::has('flash_message'))
                        <div class="alert alert-danger">
                          {!! Session::get('flash_message') !!}
                        </div>
                        @endif
                      </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $item)
                            <tr class="odd gradeX" align="center">
                                <td>1</td>
                                <td>{!! $item["name"] !!}</td>
                                <td>{!! number_format($item["price"],0,",",".") !!} VNĐ</td>
                                <td>
                                  {!!
                                   \Carbon\carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans()
                                !!}
                                </td>
                                <td>
                                  <?php $cate=DB::table('cates')->where('id',$item["cate_id"])->first(); ?>
                                  @if(!empty($cate->name))
                                    {!! $cate->name !!}

                                  @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.product.getDelete',$item['id']) !!}" onclick="return xacnhanxoa('Ban có muốn xóa sản phẩm không ?')"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit',$item['id']) !!}">Edit</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection()
