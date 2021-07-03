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
                                        <th scope="col">Món đã đặt</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_in4 as $key => $in4_res)
                                        <tr>
                                            <th scope="row">{{ $in4_res->id_quan }}</th>
                                            <td>{{ $in4_res->tenquan }}</td>
                                            <td>{{ $in4_res->ngaygio }}</td>
                                            <td>{{ $in4_res->songuoi }}</td>
                                            <td>{{ $in4_res->ngaydat }}</td>
                                           
                                            <td>
                                                <a href="{{ URL::to('/profile-menu/' . $in4_res->id_datban) }}"><i class="far fa-folder-open" style="font-size: 25px"></i> Xem</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
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
