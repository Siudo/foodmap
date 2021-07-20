@extends('user_profile')
@section('profile_content')
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
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($data_menu as $key => $in4_menu)
                                        <tr>
                                            <th scope="row">{{ $in4_menu->id_datmon }}</th>
                                            <td>{{ $in4_menu->tenmon }}</td>
                                            <td>{{ $in4_menu->loaimon }}</td>
                                            <td>{{ $in4_menu->SL }}</td>
                                            @php
                                               $gia = $in4_menu->gia;
                                                $sl =  $in4_menu->SL;
                                                $tong_mon = $gia*$sl;
                                                
                                                $total = (float)$total + (float)$tong_mon;
                                            @endphp
                                            <td>{{ number_format($tong_mon) }}</td>
                                           
                                           
                                           

                                        </tr>
                                    @endforeach
                                </tbody>
                               

                            </table>
                            <div style="margin-left:80rem">
                                <h4 class="card-title">TỔNG: {{ number_format($total)}} </h4>
                                @php
                                    Session::put('TongTT', $total);
                                @endphp
                            </div>
                                <div style="margin-left:80rem">
                                    <a href="{{ URL::to('/thanh-toan-hd/' . $in4_menu->id_datban) }}" class="btn btn-primary">Thanh Toán</a>
                                </div>
                         
                            
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
