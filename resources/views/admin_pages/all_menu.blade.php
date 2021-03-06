@extends('admin')
@section('admin_content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">THỰC ĐƠN</h4>
                </div>

                <div class="d-flex justify-content-end col-12 ">
                    <form class="d-flex justify-content-end col-3 " style="width:100%" action="{{URL::to('/filter')}}" method="get">
                        <fieldset class="d-flex justify-content-end col-3 ">

                            <select class="form-select " id="basicSelect" name="cate_menu" onchange="this.form.submit()">
                                <option >All</option>
                                @foreach ($cate_menu as $key => $cate_menu)
                                    <option value="{{ $cate_menu->id_loaitd }}" {{$cate_menu->id_loaitd == $t_id_loaitd[0] ? 'selected' : ''}} >{{ $cate_menu->tenloaitd }}</option>
                                @endforeach
                            </select>


                        </fieldset>
                    </form>

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

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{ $all_menu->links('pagination.custom_paginate') }}
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
