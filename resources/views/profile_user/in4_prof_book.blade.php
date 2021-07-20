@extends('user_profile')
@section('profile_content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">DANH MỤC QUÁN</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên Quán</th>
                                        <th scope="col">Đặt ngày</th>
                                        <th scope="col">Số người</th>
                                        <th scope="col">Đặt lúc</th>
                                        <th scope="col">Thanh toán</th>
                                        <th scope="col">Món đã đặt</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id_pm = [];
                                        foreach ($data_payment as $key => $payment) {
                                            array_push($id_pm, $payment->id_datban);
                                        }
                                    @endphp



                                    @foreach ($all_in4 as $key => $in4_res)

                                        <tr>
                                            <th scope="row">{{ $in4_res->id_datban }}</th>
                                            <td>{{ $in4_res->tenquan }}</td>
                                            <td>{{ $in4_res->ngaygio }}</td>
                                            <td>{{ $in4_res->songuoi }}</td>
                                            <td>{{ $in4_res->ngaydat }}</td>
                                            @php
                                                $id = $in4_res->id_datban;
                                                for ($i = 0; $i < count($id_pm); $i++) {
                                                    if ($id == $id_pm[$i]) {
                                                        Session::put('check', ' Có');
                                                        $check = Session::get('check');
                                                        break;
                                                    } else {
                                                        Session::put('check', null);
                                                        $check = Session::get('check');
                                                    }
                                                }
                                            @endphp

                                            @if ($check)
                                                <td><span class="badge bg-success">Đã thanh
                                                        toán</span></td>


                                            @else
                                                <td><span class="badge bg-danger">Chưa thanh toán</span></td>
                                            @endif










                                            <td>
                                                <a href="{{ URL::to('/profile-menu/' . $in4_res->id_datban) }}"><i
                                                        class="far fa-folder-open" style="font-size: 25px"></i> Xem</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{ $all_in4->links('pagination.custom_paginate') }}
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
