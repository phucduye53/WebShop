@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>Danh sách</small>
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
                                <th>Tên tài khoản</th>
                                <th>Quyền hạn</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $stt=0?>
                          @foreach($user as $item_user)
                          <?php $stt =$stt+1?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!! $item_user["username"] !!}</td>
                                <td>
                                  @if($item_user["id"] == 1 )
                                   SuperAdmin
                                  @elseif($item_user["level"]== 1)
                                    Admin
                                  @else
                                    Member
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.user.getDelete',$item_user['id']) !!}" onclick="return xacnhanxoa('Ban có muốn xóa user không ?')"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item_user['id']) !!}">Sửa</a></td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection()
