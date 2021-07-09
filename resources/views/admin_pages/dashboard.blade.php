@extends('admin')
@section('admin_content')
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Số người đặt hôm nay</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{$book_onday}} </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Lượt đặt trong tháng</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{$book_onmonth}} </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas2" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Số món đặt trong ngày</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{$book_meal_onday}} </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas3" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Số người đã ăn tại quán trong tháng</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{$songuoi_onmonth}}</p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas4" style="height:100px !important"></canvas>
                                <canvas id="bar" hidden></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">DANH SÁCH KHÁCH ĐẶT LỊCH HÔM NAY</h4>
                        <div class="d-flex ">
                            <i data-feather="download"></i>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên khách hàng</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Trạng thái</th>
                                     

                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($ds_book_onday as $key => $values_1)
                                        <tr>
                                            <th scope="row">{{$values_1->id_datban}}</th>
                                            <td>{{$values_1->tenkh}}</td>
                                            <td>{{$values_1->ngaygio}}</td>
                                            <td>{{$values_1->songuoi}}</td>
                                            @if ($values_1->trangthai_book)
                                            
                                            <td><span class="badge bg-danger">Chưa xác nhận</span></td>
                                            @else
                                            <td><span class="badge bg-success">Đã xác nhận</span></td>
                                            @endif
                                           
                                          

                                        </tr>
                             
                                        @endforeach
                                        
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">DANH SÁCH KHÁCH VỪA ĐẶT</h4>
                        <div class="d-flex ">
                            <i data-feather="download"></i>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên khách hàng</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Trạng thái</th>
                                     

                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($ds_book as $key => $values)
                                        <tr>
                                            <th scope="row">{{$values->id_datban}}</th>
                                            <td>{{$values->tenkh}}</td>
                                            <td>{{$values->ngaygio}}</td>
                                            <td>{{$values->songuoi}}</td>
                                            @if ($values->trangthai_book)
                                            
                                            <td><span class="badge bg-danger">Chưa xác nhận</span></td>
                                            @else
                                            <td><span class="badge bg-success">Đã xác nhận</span></td>
                                            @endif
                                           
                                          

                                        </tr>
                             
                                        @endforeach
                                        
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>
    
@endsection
