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
                                <form action="{{ URL::to('/save-menu') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
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
                                    <div class="row form-group">
                                        <div class="col-sm-2 col-form-label"><label for="file-multiple-input" class=" form-control-label">Thêm file Excel</label></div>
                                        <div class="col-sm-10"><input type="file" id="file-multiple-input" name="exc_menu"
                                                multiple="" class="form-control-file" required></div>
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
