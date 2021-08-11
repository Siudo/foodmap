@extends('quantri')
@section('quantri_content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin tài khoản</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên khách hàng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tuỳ chọn</th>

                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    @foreach ($data_tk as $key => $values)
                                        <tr>
                                            <th scope="row">{{ $values->id_tkql }}</th>
                                            <td>{{ $values->tentk_ql }}</td>                                            
                                            
                                            @if ($values->trangthai)
                                                <td><span class="badge bg-danger">Đã Chặn</span></td>
                                            @else
                                                <td><span class="badge bg-success">Đã kích hoạt</span></td>
                                            @endif

                                            <td>
                                                <a href="{{ URL::to('/edit-book/' . $values->id_tkql) }}"><i
                                                        class="fas fa-pen-square" style="font-size:25px"></i></a>
                                                <a href="{{ URL::to('/xacnhan-tk/' . $values->id_tkql) }}" onclick="return confirm('Bạn muốn chặn không ?')">
                                                    <i class="fas fa-user-lock" style="font-size:25px"></i></a>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>
                            {{ $data_tk->links('pagination.custom_paginate') }}
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
