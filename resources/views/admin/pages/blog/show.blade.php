@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                        <li class="breadcrumb-item active">Chi tiết viết</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
                <span id="success">
                    

                </span>
            
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết viết</h3>
                </div>

                    <div class="card-body">
                        <img src="{{ URL::to('public/uploads/blog/'.$tin->picture) }}" width="100%" height="450px" alt="">
                        <h4>{{ $tin->title }}</h4>
                        <span>@foreach($user as  $u)
                            @if($tin->tacgia == $u->id)
                            Tác giả: {{ $u->name }}
                            @endif
                        @endforeach</span>
                        <br>
                        <div>
                            <p>{!! $tin->content !!}</p>
                        </div>
                    </div>

            </div>
            <!-- /.card-body -->
            
            <div class="card-footer">
                <a href="{{ route('blog.index') }}" type="submit" name="submit" class="btn btn-warning">Quay lại</a>

            </div>
        </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
