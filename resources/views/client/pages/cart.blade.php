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
          <div class="cart_inner col-md-9">
           <div class="table-responsive">
            <table class="table cart-table">
              <thead>
                <tr>
                  <th class="col-md-5" scope="col">Sản phẩm</th>
                  <th class="col-md-2" scope="col">Giá</th>
                  <th class="col-md-2" scope="col">Số lượng</th>
                  <th class="col-md-2" scope="col">Tổng cộng</th>
                  <th class="col-md-1" scope="col"></th>
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
                    <div class="product_count">
                      <input
                        type="text"
                        name="qty"
                        id="sst"
                        maxlength="12"
                        value={{$pro['qty']}}
                        title="Quantity:"
                        class="input-text qty update-cart"
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
                    <h5 class="cart-total">{{ number_format($pro['total'], 0, '.', '.');}} VNĐ</h5>
                  </td>
                  <td>
                    <a href="{{route('deleteItemCart',$pro['name'])}}" class="genric-btn danger-border radius delete-cart"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
          </div>
          <div class="payment_info col-md-3">
            <div class="payment_item">
              <h3>Thông tin thanh toán</h3>
            </div>
            <br>
            <div class="payment_item">
              <p>Giỏ hàng: <span>VNĐ</span> <span id="cart_total" data-total="{{$cart_total}}">{{ number_format($cart_total, 0, '.', '.');}}</span></p>
              <p>Shipping: <span>VNĐ</span> <span id="ship_price"></span> </p>
              <select id="ship_select" class="ship_select">
                <option selected value="30000">Chuyển phát nhanh</option>
                <option value="20000">Bình thường</option>
                <option value="50000">Extra Ship</option>
              </select>
              <br>
              <p style="margin-bottom: 20px"></p>
            </div>
            <div class="payment_item payment_total">
              <p>Tổng tiền <span>VNĐ</span><span id="payment_total" data-payment_total="0"> </span></p>
            </div>
            <a href="" class="btn_pay">Tiến hành thanh toán</a>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->


  <script type="text/javascript">
      function format_currency(number){
          return number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
   window.onload = function()
      {
        document.getElementById('ship_price').innerHTML= format_currency(document.getElementById('ship_select').value); 
        document.getElementById('payment_total').innerHTML = format_currency(Number( document.getElementById('cart_total').innerHTML) + Number( document.getElementById('ship_select').value))
      };
    $(document).ready(function(){ 
      $('#ship_select').change(function( e){
        
        

        e.preventDefault();
        var ship_select= $('#ship_select').val();
        const cart_total= $('#cart_total').data('total');
        let payment_total= $('#payment_total').data('payment_total')
        $('#ship_price').html(format_currency(ship_select) )
        $('#payment_total').html(format_currency(Number(cart_total) + Number( ship_select)  ))
      })

      $('.update-cart').change(function (e) {
        e.preventDefault();
        var qty = $(this).val();
        alert('ok');
        // $.ajax({
        // url: "{{ url('update-cart') }}",
        // method: "patch",
        // data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity:
        // ele.parents("tr").find(".quantity").val()},
        // success: function (response) {
        //     window.location.reload(); 
        // }
        // });
      });
    })



  </script>
@endsection