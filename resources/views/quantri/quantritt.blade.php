@extends('quantri')
@section('quantri_content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin quán ĐK</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên quản lí</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">SĐT</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tuỳ chọn</th>

                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    @foreach ($data_quanli as $key => $values)
                                        <tr>
                                            <th scope="row">{{ $values->id_quanli }}</th>
                                            <td>{{ $values->ten_quanli }}</td>                                            
                                            <td>{{ $values->diachi }}</td> 
                                            <td>{{ $values->sdt }}</td> 
                                            <td>{{ $values->email }}</td> 
                                            <td>
                                                <a href="{{ URL::to('/quantri') }}">
                                                    <i class="fas fa-caret-square-left" style="font-size:25px"></i></a>
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
