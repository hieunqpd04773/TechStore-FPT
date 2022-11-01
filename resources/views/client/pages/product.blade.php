@extends('client.master')
@section('title','Sản phẩm chi tiết')
@section('content')
{{-- @include('client/_nav') --}}
    <!--================Single Product Area =================-->
    <div class="product_image_area">
      <div class="container">
        <div class="row s_product_inner">
          <div class="col-lg-6">
            <div class="s_product_img">
              <div
                id="carouselExampleIndicators"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#carouselExampleIndicators"
                    data-slide-to="0"
                    class="active"
                  >
                    <img
                      src="{{asset('images/products/'.$pro->image)}}"
                      alt=""style="width:100%"
                    />
                  </li>
                  @for ($i = 0; $i < count($images); $i++)
                    <li
                    data-target="#carouselExampleIndicators"
                    data-slide-to="{{$i+1}}"
                  >
                    <img
                      src="{{asset('images/products/'.$images[$i]->image)}}"
                      alt="" style="width:100%"
                    />
                  </li>
                  @endfor
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      class="d-block w-100"
                      src="{{asset('images/products/'.$pro->image)}}"
                      alt="First slide"
                    />
                  </div>
                  
                  @foreach ($images as $img)
                  <div class="carousel-item">
                    <img
                      class="d-block w-100"
                      src="{{asset('images/products/'.$img->image)}}"
                      alt="Second slide"
                    />
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <h3 id='pro_name'>{{$pro->name}}</h3>
              <h2>{{$pro->price-$pro->discount}}  đ</h2>
              <ul class="list">
                <li>
                  <a class="active" href="{{route('getProByCateItem',$pro->cate_id)}}">
                    <span>Hãng</span> : {{$pro->Cate_items->name}}</a
                  >
                </li>
                <li>
                  <a href="#"> <span>Lượt xem</span> : {{$pro->view}}</a>
                </li>
                <li>
                  <a href="#"> <span>Tình trạng</span> : còn {{$pro->quantity}} máy</a>
                </li>
              </ul>
              <p>
                Chọn biến thể <br>
              @foreach ($pro_vars as $pv)
                  <span onclick="changeVar({{$pv->id}})" style="border: 1px solid #FFD600; padding: 5px; background: #FFD600">{{$pv->color}} - {{$pv->memory}} GB</span> 
              @endforeach
              <script>
                
              </script>
              </p>
              <div class="product_count">
                <label for="qty">Số lượng:</label>
                <input
                  type="text"
                  name="qty"
                  id="sst"
                  maxlength="12"
                  value="1"
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
              <div class="card_area">
                <a class="main_btn" href="#">Add to Cart</a>
                <a class="icon_btn" href="#">
                  <i class="lnr lnr lnr-diamond"></i>
                </a>
                <a class="icon_btn" href="#">
                  <i class="lnr lnr lnr-heart"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
      <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link"
              id="home-tab"
              data-toggle="tab"
              href="#home"
              role="tab"
              aria-controls="home"
              aria-selected="true"
              >Mô tả</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="profile-tab"
              data-toggle="tab"
              href="#profile"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
              >Thông tin chi tiết</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link active"
              id="review-tab"
              data-toggle="tab"
              href="#review"
              role="tab"
              aria-controls="review"
              aria-selected="false"
              >Nhận xét</a
            >
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div
            class="tab-pane fade"
            id="home"
            role="tabpanel"
            aria-labelledby="home-tab"
          >
            <p>
              {{$pro->detail}}
            </p>
          </div>
          <div
            class="tab-pane fade"
            id="profile"
            role="tabpanel"
            aria-labelledby="profile-tab"
          >
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <h5>Width</h5>
                    </td>
                    <td>
                      <h5>128mm</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Height</h5>
                    </td>
                    <td>
                      <h5>508mm</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Depth</h5>
                    </td>
                    <td>
                      <h5>85mm</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Weight</h5>
                    </td>
                    <td>
                      <h5>52gm</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Quality checking</h5>
                    </td>
                    <td>
                      <h5>yes</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Freshness Duration</h5>
                    </td>
                    <td>
                      <h5>03days</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>When packeting</h5>
                    </td>
                    <td>
                      <h5>Without touch of hand</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Each Box contains</h5>
                    </td>
                    <td>
                      <h5>60pcs</h5>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="contact"
            role="tabpanel"
            aria-labelledby="contact-tab"
          >
            
          </div>
          <div
            class="tab-pane fade show active"
            id="review"
            role="tabpanel"
            aria-labelledby="review-tab"
          >
            <div class="row">
              <div class="col-lg-6">
                <div class="row total_rate">
                  <div class="col-6">
                    <div class="box_total">
                      <h5>Tổng thể</h5>
                      @if (isset($Round))
                      <h4>{{$Round}}</h4>
                      <h6>({{$coutall}} Nhận xét)</h6>
                      @else
                      Chưa có đánh giá
                      @endif
                      
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="rating_list">
                      <h3>Dựa trên {{$coutall}} nhận xét</h3>
                      
                      <ul class="list">
                        <li>
                          <a>
                            5 sao
                              <?php
                                for ($i = 0; $i < 5; $i++){
                                    echo '<i class="fa fa-star"></i>';
                                }
                              ?> 
                              
                            {{$cout5}}
                          </a>
                        </li>
                        <li>
                          <a>
                            4 sao
                              <?php
                                for ($i = 0; $i < 4; $i++){
                                    echo '<i class="fa fa-star"></i>';
                                }
                              ?> 
                            {{$cout4}}
                          </a>
                        </li>
                        <li>
                          <a>
                            3 sao
                              <?php
                                for ($i = 0; $i < 3; $i++){
                                    echo '<i class="fa fa-star"></i>';
                                }
                              ?> 
                            {{$cout3}}
                            
                          </a>
                        </li>
                        <li>
                          <a>
                            2 sao
                              <?php
                                for ($i = 0; $i < 2; $i++){
                                    echo '<i class="fa fa-star"></i>';
                                }
                              ?>                               
                            {{$cout2}}
                          </a>
                        </li>
                        <li>
                          <a>
                            1 sao
                              <?php
                                for ($i = 0; $i < 1; $i++){
                                    echo '<i class="fa fa-star"></i>';
                                }
                              ?> 
                            {{$cout1}}
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="review_list">
                @foreach ($comm as $com) 
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img
                          src="img/product/single-product/review-1.png"
                          alt=""
                        />
                      </div>
                      <div class="media-body">
                        <h4>{{$com->name}} | {{$com->created_at}}</h4> 
                        
                        <?php
                        for ($i = 0; $i < $com->status; $i++){
                            echo '<i class="fa fa-star"></i>';
                        }?>
                      </div>
                    </div>
                    <p style="margin-left:3%">
                    {{$com->content}}
                    </p>
                  </div>
                  @endforeach
                  
                  
                  <!-- <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img
                          src="img/product/single-product/review-2.png"
                          alt=""
                        />
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                  </div>
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img
                          src="img/product/single-product/review-3.png"
                          alt=""
                        />
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                  </div> -->
                </div>
              </div>
              <div class="col-lg-6">
                <div class="review_box">
                  <h4>Thêm bài đánh giá</h4>
                  <!-- Đánh giá sao -->
                  
                  <!--Bình luận-->
                  @if(Auth::user() != null)
                  <form class="row contact_form" action="/product/comment/{{$pro->id}}" method="post" id="contactForm form-product" novalidate="novalidate">
                    @csrf
                    <p style="margin-left: 3%">Đánh giá của bạn:</p>
                    <ul class="list">
                      <!-- CSS -->
                      <style>
                        .rating {
                            display: flex;
                            flex-direction: row-reverse;
                            justify-content: center;
                        }

                        .rating > input{ display:none;}

                        .rating > label {
                            position: relative;
                                width: 1em;
                                font-size: 2vw;
                                color: #FFD600;
                                cursor: pointer;
                        }
                        .rating > label::before{ 
                            content: "\2605";
                            position: absolute;
                            opacity: 0;
                          }
                        .rating > label:hover:before,
                        .rating > label:hover ~ label:before {
                            opacity: 1 !important;
                        }

                        .rating > input:checked ~ label:before{
                            opacity:1;
                        }

                        .rating:hover > input:checked ~ label:before{ opacity: 0.4; }



                        p{ font-size: 1.2rem;}
                        @media only screen and (max-width: 600px) {
                            h1{font-size: 14px;}
                            p{font-size: 12px;}
                        }
                    </style>
                      <!-- End css -->
                      <!-- sta -->
                      <div class="rating">
                        <input type="radio" name="rating status" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating status" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating status" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating status" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating status" value="1" id="1"><label for="1">☆</label>
                      </div>
                      <div>

                      </div>
                      <!-- end sta -->





                      <!-- <li>
                        <a href="#">
                          <i name="" class="fa fa-star"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-star"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-star"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-star"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-star"></i>
                        </a>
                      </li> -->
                    </ul>

                    <!-- <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          name="name"
                          placeholder="Họ và tên:"
                        />
                      </div>
                    </div> -->
                    <!-- <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          placeholder="Địa chỉ email:"
                        />
                      </div>
                    </div> -->
                    <!-- <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="number"
                          name="number"
                          placeholder="Số điện thoại:"
                        />
                      </div>
                    </div> -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea
                          class="form-control"
                          name="content"
                          id="content"
                          rows="5"
                          placeholder="Nội dung"
                        ></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-right">
                      <button
                        type="submit"
                        value="submit"
                        class="btn submit_btn"
                      >
                        Gửi đánh giá
                      </button>
                    </div>
                  </form>
                  <br>
                  @else
                    <div>
                      <br>
                      <h4>Bạn cần đăng nhập để bình luận</h4> <br>
                      <a class=" btn submit_btn" href="">Đăng nhập</a>...<a class="btn submit_btn" href="">Đăng kí</a>
                    </div>
                  @endif
                 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Product Description Area =================-->

@endsection