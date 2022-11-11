@extends('client.master')
@section('title','Thông tin tài khoản')
@section('content')
<main>
<section>
<div class="container bg-light"> 
    <form method="POST" action="{{route('addAddress')}}" enctype="multipart/form-data" class="forms-sample">
    @csrf
        <div class="row"> 
            <div class="col border-right"> 
                <div class="p-3 py-5"> 
                    <div class="d-flex justify-content-between align-items-center mb-3"> 
                        <h4 class="text-right">Thêm địa chỉ</h4> 
                    </div> <div class="row mt-2"> 
                      <input type="hidden" class="form-control" placeholder="" name="user_id" value="{{Auth::user()->id}}">

                        <div class="col-md-6">
                            <label class="labels">Họ và tên</label>

                            <input type="text" class="form-control" placeholder="" name="name" value="">
                        </div> 
                        <div class="col-md-6">
                            <label class="labels">Số điện thoại</label>
                            <input type="text" class="form-control" value="" name="phone" placeholder="">
                        </div> 
                        
                    </div> 
                    <div class="row mt-3"> 
                        <div class="col-md-6">
                            <label class="labels">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="" placeholder="">
                        </div> 
                        <div class="col-md-6">
                            <label class="labels">Trạng thái</label>
                            <input type="hidden" class="form-control" placeholder="Mặc định" value="1" name="role">

                            <input type="text" disabled class="form-control" placeholder="Mặc định">
                        </div> 
                        
                    </div> 
                    <div class="mt-5 text-center">
                        <button class="btn btn-form" type="submit">Thêm địa chỉ</button>
                    </div> 
                </div> 
            </div> 

        </div>
    </form>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh Sách Địa Chỉ</h4>
            <div class="table-responsive pt-3">
              <table id="recent-purchases-listing" class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                        Họ và tên
                    </th>
                    <th>
                        Số điện thoại
                    </th>
                    <th>
                        Địa chỉ
                    </th>
                    <th>
                        Trạng thái
                    </th>
                    <th>
                        Hành động
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($listAdr as $adr)
                    <td>
                      <p>{{$adr->id}}</p>
                    </td>
                    <td>
                      <p>{{$adr->name}}</p>
                    </td>
                    <td>
                      <p>{{$adr->phone}}</p>
                    </td>
                      <td>
                        <p>{{$adr->address}}</p>
                      </td>
                      <td>
                        @if($adr->role == 1)
                            <p class="btn btn-success">Mặc định</p>
                            @else
                            <p class="btn btn-danger">Tạm thời</p>
                        @endif
                      </td>
                    <td class="d-flex">
                        <a href="{{route('geteditAddress',$adr->id)}}" class="btn btn-primary mx-2">Sửa</a>
                        
                        <a href="{{route('deleteAddress',$adr->id)}}" onclick="return confirm('Xóa mục này?')"><button type="button" class="btn btn-danger">Xóa</button></a>
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
</div>
</section>
@endsection