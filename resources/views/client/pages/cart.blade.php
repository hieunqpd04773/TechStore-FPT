@extends('client.master')
@section('title','Giỏ hàng')
@section('content')
@include('client/partials/_nav')
    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table cart-table">
              <thead>
                <tr>
                  <th class="col-md-5" scope="col">Sản phẩm</th>
                  <th class="col-md-2" scope="col">Giá</th>
                  <th class="col-md-2" scope="col">Số lượng</th>
                  <th class="col-md-2" scope="col">Tổng cộng</th>
                  <th class="col-md-1" scope="col">Hành động</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($allProCart as $pro)
                <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img width="100px"
                          src="{{asset('images/products/'.$pro['image'])}}"
                          alt=""
                        />
                      </div>
                      <div class="media-body cart-pro-name">
                        <p>{{$pro['name']}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>{{$pro['price']}} VNĐ</h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <input
                        type="text"
                        name="qty"
                        id="sst"
                        maxlength="12"
                        value={{$pro['qty']}}
                        title="Quantity:"
                        class="input-text qty"
                      />
                      <button
                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                        class="increase items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-up"></i>
                      </button>
                      <button
                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                        class="reduced items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-down"></i>
                      </button>
                    </div>
                  </td>
                  <td>
                    <h5 class="cart-total">{{$pro['total']}} VNĐ</h5>
                  </td>
                  <td>
                    <a href="" class="genric-btn danger-border radius delete-cart"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </td>
                  @endforeach
                </tr>
                <tr class="bottom_button">
                  <td>
                    <a class="gray_btn" href="#">Cập nhật giỏ hàng</a>
                  </td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="cupon_text">
                      <input type="text" placeholder="Coupon Code" />
                      <a class="main_btn" href="#">Ứng dụng</a>
                      <a class="gray_btn" href="#">Đóng phiếu giảm giá</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Tổng phụ</h5>
                  </td>
                  <td>
                    <h5>$2160.00</h5>
                  </td>
                </tr>
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Đang chuyển hàng</h5>
                  </td>
                  <td>
                    <div class="shipping_box">
                      <ul class="list">
                        <li>
                          <a href="#">Tỷ lệ cố định: $5.00</a>
                        </li>
                        <li>
                          <a href="#">Miến phí vận chuyển</a>
                        </li>
                        <li>
                          <a href="#">Tỷ lệ cố định: $10.00</a>
                        </li>
                        <li class="active">
                          <a href="#">Giao hàng địa phương: $2.00</a>
                        </li>
                      </ul>
                      <h6>
                      Tính toán vận chuyển
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                      </h6>
                      <select class="shipping_select">
                        <option value="1">Bangladesh</option>
                        <option value="2">India</option>
                        <option value="4">Pakistan</option>
                      </select>
                      <select class="shipping_select">
                        <option value="1">Chọn một tiểu bang</option>
                        <option value="2">Chọn một tiểu bang</option>
                        <option value="4">Chọn một tiểu bang</option>
                      </select>
                      <input type="text" placeholder="Postcode/Zipcode" />
                      <a class="gray_btn" href="#">Cập nhật chi tiết</a>
                    </div>
                  </td>
                </tr>
                <tr class="out_button_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="checkout_btn_inner">
                      <a class="gray_btn" href="#">Tiếp tục mua sắm</a>
                      <a class="main_btn" href="#">Tiến hành kiểm tra</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->

@endsection