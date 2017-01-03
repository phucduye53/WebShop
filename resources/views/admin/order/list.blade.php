@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý
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
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>Mã Mua Hàng</th>
                                <th>Tiền</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $stt=0
                          ?>
                          @foreach($data as $item)
                          <?php $stt = $stt+1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>
                                  <?php
                                    $user=DB::table('users')->where('id',$item["user_id"])->first();
                                    echo $user->username;
                                  ?>
                                </td>
                                <td>
                                  {!! $item['payment_id'] !!}
                                </td>
                                <td>
                                  {!! $item['total'] !!} $
                                </td>
                                <td>
                                  {!!
                                   \Carbon\carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans()
                                !!}
                                </td>
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
