@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Danh sách order</p>
            <a class="card-title badge badge-info rounded" href="">Thêm mới</a><br>
            

            <div class="table-responsive">
              
              <table id="recent-purchases-listing" class="table table-hover">
                <thead>
                  <tr>
                      <th>Id</th>
                      <th>User Id</th>
                      <th>Điện thoại</th>
                      <th>Địa chỉ</th>
                      <th>Tổng tiền</th>
                      <th>Tình trạng</th>
                      <th>Ghi chú</th>
                      <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allOrder as $Order)
                  <tr>
                    <td>{{$Order->id}}</td>
                    <td>{{$Order->user_id}}</td>
                    <td>{{$Order->phone}}</td>
                    <td>{{$Order->address}}</td>
                    <td>{{$Order->total}}</td>
                    <td>{{$Order->status}}</td>
                    <td>{{$Order->note}}</td>
                    <td>
                      <a class="badge badge-info rounded" href="">Sửa</a>
                      <a class="badge badge-info rounded" href="">Biến thể</a>
                      <a class="badge badge-danger rounded" onclick="return confirm('Xóa mục này?')" href="">Xóa</a>
                    </td>
                </tr>
                  @endforeach           
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection