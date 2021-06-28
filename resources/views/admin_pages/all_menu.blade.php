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
                                        <th scope="col">Tên món</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Loại</th>
                                        <th scope="col">Tuỳ chọn</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_menu as $key => $menu)
                                        <tr>
                                            <th scope="row">{{ $menu->id_thucdon }}</th>
                                            <td>{{ $menu->tenmon }}</td>
                                            <td>{{ $menu->gia }}</td>
                                            <td>{{ $menu->loaimon }}</td>
                                            <td>
                                                <a href="{{ URL::to('/edit-mon/' . $menu->id_thucdon) }}"><i
                                                        class="fas fa-pen-square" style="font-size:25px"></i></a>
                                                <a href="{{ URL::to('/delete-cate-res/' . $menu->id_thucdon) }}"
                                                    onclick="return confirm('Are you sure to delete?')"><i
                                                        class="fas fa-trash" style="font-size:25px"></i></a>

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
