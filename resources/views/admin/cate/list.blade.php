@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
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
                                <th>Category Parent</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $stt=0
                          ?>
                          @foreach($data as $item)
                          <?php $stt = $stt+1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!! $item["name"] !!}</td>
                                <td>
                                  @if($item["parent_ind"]==0)
                                  {!! "NONE" !!}
                                  @else
                                  <?php
                                    $parent=DB::table('cates')->where('id',$item["parent_ind"])->first();
                                    echo $parent->name;
                                  ?>
                                  @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Có chắc muốn xóa ?')"href="{!! URL::route('admin.cate.getDelete',$item['id']) !!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getEdit',$item['id']) !!}">Edit</a></td>
                            </tr>
                          @endforeach()
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection()
