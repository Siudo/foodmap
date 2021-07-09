@extends('admin')
@section('admin_content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin đặt bàn</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên khách hàng</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tuỳ chọn</th>

                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($data_mes as $key => $values)
                                        <tr>
                                            <th scope="row">{{$values->id_datban}}</th>
                                            <td>{{$values->tenkh}}</td>
                                            <td>{{$values->ngaygio}}</td>
                                            <td>{{$values->songuoi}}</td>
                                            @if ($values->trangthai_book)
                                            
                                            <td><span class="badge bg-danger">Chưa xác nhận</span></td>
                                            @else
                                            <td><span class="badge bg-success">Đã xác nhận</span></td>
                                            @endif
                                           
                                            <td>
                                                <a href="{{ URL::to('/edit-book/'.$values->id_datban ) }}"><i
                                                        class="fas fa-pen-square" style="font-size:25px"></i></a>
                                                <a href="{{ URL::to('/xacnhan/'.$values->id_datban ) }}"><i class="fas fa-check-circle" style="font-size:25px"></i></a>
                                                
                                                <a href="{{ URL::to('/menu-user-book/' . $values->id_datban) }}"><i class="far fa-folder-open" style="font-size: 25px"></i></a>
                                                
                                            </td>

                                        </tr>
                             
                                        @endforeach
                                        
                                </tbody>

                            </table>
                            {{$data_mes->links('pagination.custom_paginate')}}
                            <?php
                            $message = Session::get('message');
                            if ($message) {
                            echo '<span style="color:red">' . $message . '</span>';
                            Session::put('message', null);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
@endsection
