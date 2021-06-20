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
                                @foreach ($data_res as $key => $values )
                                <form action="{{ URL::to('/save-location/'.$values->id_vitri.'/'.$values->id_quan) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên quán</label>
                                        <div class="col-sm-10">
                                            <input type="text" disabled class="form-control" name="name_res" id="inputEmail3"
                                                placeholder="Tên quán" required="" value="{{$values->tenquan}}">
                                        </div>
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
                                                id="lat_res" placeholder="latitude" required="" value="{{$values->vido}}"  >
                                                <br>
                                                <input type="hidden" class="form-control " name="lng_res"
                                                id="lng_res" placeholder="longtitude" required="" value="{{$values->kinhdo}}">
                                                <br>
                                                <input type="text" class="form-control" name="address_res"
                                                id="searchmap" placeholder="Tìm địa chỉ" required="" value="{{$values->diachi}}" style="width: 50%">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10" style="margin-left:40rem">
                                            <button type="submit" class="btn btn-primary">Edit</button>
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
