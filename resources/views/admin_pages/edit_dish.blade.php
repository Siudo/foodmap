@extends('admin')
@section('admin_content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa thông tin món ăn</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <div class="form-body">
                                @foreach ($menu as $key=> $menu )
                                <form action="{{ URL::to('/update-dish/'.$menu->id_thucdon) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên món</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="dish_name" id="inputEmail3"
                                                placeholder="Tên món" required="" value="{{$menu->tenmon}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Loại thực đơn</label>
                                        <fieldset class="col-sm-10">
                                            
                                            <select class="form-select" id="basicSelect" name="cate_menu">
                                                @foreach ($cate_menu as $key => $cate_menu)
                                                <option value="{{$cate_menu->id_loaitd}}">{{$cate_menu->tenloaitd}}</option>
                                                @endforeach
                                            </select>
                                          
                                            
                                        </fieldset>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Giá</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="dish_price" id="inputEmail3"
                                                placeholder="Giá" required="" value="{{$menu->gia}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">loại món</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="dish_cate" id="inputEmail3"
                                                placeholder="Loại món" required="" value="{{$menu->loaimon}}">
                                        </div>
                                    </div>
                                 
                                
                                    <div class="form-group row">
                                        <div class="col-sm-10" style="margin-left:40rem">
                                            <button type="submit" class="btn btn-primary">update</button>
                                        </div>
                                    </div>
                                    <?php
                                    $message = Session::get('message');
                                    if ($message) {
                                    echo '<span style="color:red">' . $message . '</span>';
                                    Session::put('message', null);
                                    }
                                    ?>
                                </form>
                                @endforeach
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
