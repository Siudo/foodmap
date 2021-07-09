@extends('admin')
@section('admin_content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">MÓN ĐÃ ĐẶT</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên món</th>
                                        <th scope="col">Loại món</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Tuỳ chọn</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_menu as $key => $in4_menu)
                                        <tr>
                                            <th scope="row">{{ $in4_menu->id_datmon }}</th>
                                            <td>{{ $in4_menu->tenmon }}</td>
                                            <td>{{ $in4_menu->loaimon }}</td>
                                            <td>{{ $in4_menu->SL }}</td>
                                            @php
                                               $gia = $in4_menu->gia;
                                                $sl =  $in4_menu->SL;
                                                $tong = $gia*$sl;
                                            @endphp
                                            <td>{{ number_format($tong) }}</td>
                                           
                                           
                                            <td>
                                                <a href="{{ URL::to('/chitiet-datban') }}"><i class="fas fa-long-arrow-alt-left"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{$data_menu->links('pagination.custom_paginate')}}
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
