@extends('client.master')
@section('title','Giỏ hàng')
@section('content')
@include('client/partials/_nav')
@php
  $cart_total=0;
@endphp
    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="row">
          <div class="cart_inner col-md-8">
           <div class="table-responsive">
            <table class="table cart-table">
              <thead>
                <tr>    
                  <th class="col-md-6" scope="col">Sản phẩm</th>
                  <th class="col-md-2" scope="col">Số lượng</th>
                  <th class="col-md-4" scope="col">Tổng tiền</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($allProCart) && count($allProCart)>0)
                @foreach ($allProCart as $pro)
                  @php
                      $cart_total+=$pro['total']
                  @endphp
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
                    <h5>{{ number_format($pro['price'], 0, '.', '.');}} VNĐ</h5>
                  </td>
                  <td>
                    <h5 class="cart-total">{{ number_format($pro['total'], 0, '.', '.');}} VNĐ</h5>
                  </td>
                </tr>
                 @endforeach
                @else
                <tr>
                  <td colspan="5">
                    <p class="no_cart">Chưa có sản phẩm nào trong giỏ hàng</p>
                  </td>
                </tr>
                @endif
                <tr class="bottom_button">
                  <td colspan="2">
                    <a class="gray_btn" href="#">Cập nhật giỏ hàng</a>
                  </td>

                  <td colspan="3">
                    <div class="cupon_text">
                      <input type="text" placeholder="Coupon Code" />
                      <a class="main_btn apply_btn" href="#">Áp dụng</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
           </div>
          
          {{-- Payment sidebar --}}
          <div class="payment_info col-md-4">
            <div class="payment_item">
              <h3>Thông tin đơn hàng</h3>
            </div>
            <br>
            <div class="payment_item">
              <p>Giỏ hàng: <span>VNĐ</span> <span data-total="{{$cart_total}}">{{ number_format($cart_total, 0, '.', '.');}}</span></p>
              <p>Giảm Giá: <span>VNĐ</span> <span > 0 VNđ</span> </p>

            </div>
            <div class="payment_item payment_total">
              <p>Tổng tiền <span>VNĐ</span ><span data-total="{{$cart_total}}">{{ number_format($cart_total, 0, '.', '.');}}</span></p>
            </div>
            @if(Auth::check())
            <a href="#" class="btn_pay">Tiến hành thanh toán</a>
            @else
            <a href="#" class="btn_pay">Đăng nhập để thanh toán</a>
            @endif
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->


  <script type="text/javascript">
    $(document).ready(function(){ 
      function format_currency(number){
          return number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      }
      let ship_select=$('#ship_select').find(':selected').attr('data-value');
      let ship_value =$('#ship_value').html()
      let cart_total=$('#cart-total-price').html()
      discount=$('#payment-discount').html()
      total=$('#order-total')
      totalInput=$('#order-total-input')
      $('#cart-total-price').html(format_currency($('#cart-total-price').html()))
      $('#ship_value').html(format_currency(ship_select))
      total.html(Number(ship_select)+ Number(cart_total) + Number(discount))
      totalInput.val(total.html())
      total.html(format_currency(total.html()))
      $('#ship_select').change(function( e){
        e.preventDefault();
        ship_select=$('#ship_select').find(':selected').attr('data-value');
        $('#ship_value').html(format_currency(ship_select))
        $('#ship_price').html(ship_select)
        total.html(Number(cart_total) + Number( ship_select))
        totalInput.val(total.html())
        total.html(format_currency(total.html()))
      })

      $('#userAddress').change(function(e){
         e.preventDefault();

         addressId=$('#userAddress').val();
         $.ajax({
          url: '{{route('getAddressById')}}',
          method: 'post',
          data:{
            _token: "{{ csrf_token() }}",
            id:addressId
          },
          success:function(data){
            $('#addressChange').val(data.address)
            $('#nameChange').val(data.name)
            $('#phoneChange').val(data.phone)

          }
         })
      })
    })



  </script>
@endsection