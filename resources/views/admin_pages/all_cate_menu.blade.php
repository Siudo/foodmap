@extends('admin')
@section('admin_content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">DANH MỤC THỰC ĐƠN</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên loại</th>
                                        <th scope="col">Tuỳ chọn</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu as $key => $cate_menu)
                                        <tr>
                                            <th scope="row">{{ $cate_menu->id_loaitd }}</th>
                                            <td>{{ $cate_menu->tenloaitd }}</td>
                                            <td>
                                                <a href="{{ URL::to('/edit-cate-res/' . $cate_menu->id_loaitd) }}"><i
                                                        class="fas fa-pen-square" style="font-size:25px"></i></a>
                                                <a href="{{ URL::to('/delete-cate-res/' . $cate_menu->id_loaitd) }}"
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
