@extends('admin')
@section('admin_content')
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
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Loại quán</th>
                                        <th scope="col">Địa điểm</th>
                                        <th scope="col">Tuỳ chọn</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_in4 as $key => $in4_res)
                                        <tr>
                                            <th scope="row">{{ $in4_res->id_quan }}</th>
                                            <td>{{ $in4_res->tenquan }}</td>
                                            <td>{{ $in4_res->tgianmocua }}</td>
                                            <td>{!! nl2br(e($in4_res->mota)) !!}</td>
                                            <td>{{ $in4_res->tenloai }}</td>
                                            <td>{{ $in4_res->diachi }}</td>
                                            <td>
                                                <a href="{{ URL::to('/edit-in4-res/' . $in4_res->id_quan) }}"><i
                                                        class="fas fa-pen-square" style="font-size:25px"></i></a>
                                            @if ($in4_res->trangthai)
                                                <a href="{{ URL::to('/delete-in4-res/' . $in4_res->id_quan) }}"
                                                onclick="return confirm('Are you sure to hide it ?')"><i
                                                class="fas fa-eye" style="font-size:25px"></i></a>
                                            @else
                                            <a href="{{ URL::to('/delete-in4-res/' . $in4_res->id_quan) }}"
                                                onclick="return confirm('Are you sure to unhide it ?')"><i
                                                class="fas fa-eye-slash" style="font-size:25px"></i></a>
                                            @endif
                                                

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
