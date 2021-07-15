@extends('admin')
@section('admin_content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm thông tin quán</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <div class="form-body">
                                <form action="{{ URL::to('/save-in4') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên quán</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name_res" id="inputEmail3"
                                                placeholder="Tên quán" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Thời gian mở cửa</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="status_res"
                                                id="inputEmail3" placeholder="Đóng || Mở cửa" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả</label>
                                        <div class="col-sm-10">
                                            <textarea name="des_res" id="" class="form-control" id="inputEmail3" cols="30"
                                                rows="10" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Loại quán</label>
                                        <fieldset class="col-sm-10">
                                            
                                            <select class="form-select" id="basicSelect" name="cate_res">
                                                @foreach ($cate_res as $key => $cate_res)
                                                <option value="{{$cate_res->id_loai}}">{{$cate_res->tenloai}}</option>
                                                @endforeach
                                            </select>
                                          
                                            
                                        </fieldset>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 col-form-label"><label for="file-multiple-input" class=" form-control-label">Ảnh giới thiệu</label></div>
                                        <div class="col-sm-10"><input type="file" id="file-multiple-input" name="img_res"
                                                multiple="" class="form-control-file" required></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Vị trí</label>
                                        <div  class="col-sm-10">
                                            <div id="map" style="width:100% ; height: 300px"></div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                       
                                        <div  class="col-sm-10">
                                            <input type="hidden" class="form-control" name="lat_res"
                                                id="lat_res" placeholder="latitude" required=""  >
                                                <br>
                                                <input type="hidden" class="form-control " name="lng_res"
                                                id="lng_res" placeholder="longtitude" required="" >
                                                <br>
                                                <input type="text" class="form-control" name="address_res"
                                                id="searchmap" placeholder="Tìm địa chỉ" required="" style="width: 50%">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10" style="margin-left:40rem">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
