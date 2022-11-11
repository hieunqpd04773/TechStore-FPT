<header class="header_area">
    <div class="top_menu">
        <div class="top_menu">
            <div class="container">
            <div class="row">
                <div class="col-lg-7">
                <div class="float-left">
                    <p>Phone: 0374162121</p>
                    <p>email: techstore@gmail.com</p>
                </div>
                </div>
                <div class="col-lg-5">
                <div class="float-right">
                    <ul class="right_side">
                    <li>
                        <a href="cart.html">
                        gift card
                        </a>
                    </li>
                    <li>
                        <a href="tracking.html">
                        Đơn Hàng
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('contact')}}">
                    Liên Hệ
                    </a>
    
            </li>
            @if (Auth::check()) 
            <li>
                <a href="">{{Auth::user()->name}}</a>
            </li>
            @else
            <li>
                <a href="{{Route('signup')}}">
                    Đăng Ký
                </a>
            </li>
            @endif
            </ul>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="{{route('index')}}">
            <img src="{{asset('images/techstore.png')}}" width="80px" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
                <div class="col-lg-7 pr-0">
                    <ul class="nav navbar-nav center_nav pull-left" style="padding-left: 50px;">
                        @foreach ($allCate as $cate)
                        <li class="nav-item submenu dropdown">
                        <a href="{{route('getProByCate',$cate->id)}}" class="nav-link dropdown-toggle">{{$cate->name}}</a>
                        <ul class="dropdown-menu">
                            @php
                               $cate_items=App\Models\Categories::find($cate->id)->Cate_items;
                            @endphp
                            @foreach ($cate_items as $item)
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('getProByCateItem',$item->id)}}">{{$item->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endforeach
                    </ul>
                    </div>
    
                <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                    <style>
                        .has-search .form-control {
                            
                        }
                    </style>
                    <!-- search ân -->
                        <div style="float: left; width: 66%; height:10px;" class="collapse" id="collapseExample">
                            <div style=" border: none; padding: 1.05rem;" class="card card-body" >
                                <!-- code -->
                                <form action="{{url('search')}}" method="GET">
                                    @csrf
                                    <div class="input-group">
                                        <input style="margin-top: 2%;" name="keywords" type="search" class="form-control" placeholder="Nhập từ khóa..">
                                    </div>
                                </form>
    
                            </div>
                        </div>
                    <li class="nav-item"  role="presentation">
                        <a style="border: none; width: 100%; height: 100%; margin: 15% 0% 0% 0%; " class="icons" data-toggle="collapse" href="#collapseExample" role="right" aria-expanded="false" aria-controls="collapseExample">
                            <i class="ti-search" aria-hidden="true"></i>
                        </a>
                    </li>
    
                    <li class="nav-item">
                    <a href="#" class="icons">
                        <i class="ti-shopping-cart"></i>
                    </a>
                    </li>
                    @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="icons dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('manager')}}"><i class="fa fa-info" aria-hidden="true"></i>   Quản lý tài khoản</a>
                            <form action="/logout" method="post">
                                @csrf
                                <button class="dropdown-item btn-none"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                    Đăng xuất</button>
                            </form>
                          </div>
                    </li>    
                    @else
                    <li class="nav-item">
                        <a href="#" class="icons" data-toggle="modal" data-target="#myModal">
                            <i class="ti-user" aria-hidden="true"></i>
                        </a>
                        <div class="container">
                        <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                          
                            <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title text-center">Đăng nhập</h4>
                                    </div>
                                <div class="modal-body">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                        <label for="">Tài khoản</label>
                                        <input type="text" class="form-control" name="email" id="" aria-describedby="emailHelp" placeholder="Nhập Email của bạn">
                                        </div>
                                        <div class="form-group">
                                        <label for="">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" id="" placeholder="Nhập mật khẩu">
                                        </div>
                                        <div class="form-check align-items-center">
                                        <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label my-1" for="exampleCheck1">Lưu thông tin</label>
                                        </div>
                                        <button type="submit" class="my-4 btn btn-lg btn-block btn-form">Đăng nhập</button>
                                        
                                    </form>                        
                                </div>
                              <div class="modal-footer">
                                <p class="m-0">Bạn chưa có tài khoản ? <a href="{{Route('signup')}}"  data-toggle="modal" data-target="#myModal">Đăng ký</a></p>
                                
                            </div>
                            </div>
                            
                          </div>
                        </div>
                        
                      </div>
                    </li>
    @endif
                    <li class="nav-item">
                        <a href="#" class="icons">
                            <i class="ti-heart" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </nav>
        </div>
    </div>
</header>