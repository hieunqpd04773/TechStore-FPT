@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Order</p>
            

            <div class="table-responsive">
              
              <table id="recent-purchases-listing" class="table table-hover">
                <thead>
                  <tr>
                      <th>STT</th>
                      <th>Mã KH</th>
                      <th>Điện thoại</th>
                      <th>Địa chỉ</th>
                      <th>Tổng tiền</th>
                      <th>Tình trạng</th>
                      <th>Ghi chú</th>
                      <th colspan="2">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user_id}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->total}}</td>
                    <td>
                      <?php
                      if($order["status"]==0){
                          echo "Đang xử lý";
                      }else if($order["status"]==1){
                          echo "Đang giao hàng";
                      }else if($order["status"]==2){
                          echo "Đã giao hàng";
                      }else {
                          echo "Đã hủy hàng";
                      }
                      ?></td>
                    </td>
                    <td>{{$order->note}}</td>
                    <td>
                      <a class="badge badge-danger rounded" href="{{Route('details',$order->id)}}">Chi tiết</a>
                      <a class="badge badge-info rounded" href="{{Route('edit', $order->id)}}">Chỉnh sửa</a>
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