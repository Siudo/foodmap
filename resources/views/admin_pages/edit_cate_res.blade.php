@extends('admin')
@section('admin_content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sửa loại quán</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @foreach ($edt_cate as $key => $edt_value )
                            <div class="form-body">
                                <form action="{{URL::to('/update-cate-res/'.$edt_value->id_loai)}}" method="post">
                                    {{csrf_field()}}
                                
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên loại</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="cate_res" value="{{$edt_value->tenloai}}" id="inputEmail3"
                                                placeholder="Tên loại quán" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10" style="margin-left:40rem">
                                            <button type="submit" class="btn btn-primary">Sửa</button>
                                        </div>
                                    </div>
                                  
                                    
                                    <?php
                                        $message = Session::get('message');
                                        if($message){
                                            echo '<span style="color:red">'.$message.'</span>';
                                             Session::put('message',null);
                                        }
                                    ?>
                                </form>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</section>
@endsection