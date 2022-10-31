@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Biến Thể Sản Phẩm</h4>
            <p class="card-description">
              Nhập thông tin
            </p>
              <input type="hidden" name="id" value="{{$pro->id}}" id="">
              <input type="hidden" name="image1" value="{{$pro->image}}" id="">
              <div class="form-group">
                <label for="exampleInputName1">Tên Sản Phẩm</label>
                <input type="text" name="name" value="{{$pro->name}}" disabled class="form-control fullname" id="exampleInputName1" placeholder="Nhập tên sản phẩm">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleSelectGender">Danh Mục</label>
                      <input type="text" name="name" value="{{$pro->Cate_items->Categories->name}}" disabled class="form-control fullname" id="exampleInputName1" placeholder="Nhập tên sản phẩm">
                      <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleSelectGender">Hãng</label>
                    <input type="text" name="name" value="{{$pro->Cate_items->name}}" disabled class="form-control fullname" id="exampleInputName1" placeholder="Nhập tên sản phẩm">
                    <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Giá</label>
                    <input type="number" value="{{$pro->price}}" disabled name="price" class="form-control price" id="exampleInputName1" placeholder="Nhập Giá Sản Phẩm">
                    <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Giảm Giá</label>
                    <input type="number" value="{{$pro->discount}}" disabled name="discount" class="form-control discount" id="exampleInputName1" placeholder="Nhập % Giảm giá">
                    <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Hình Ảnh</label>
                    <input type="file" name="" disabled class="form-control ">
                  </div>
                </div>
                <div class="col-sm-6">
                  <img src="{{asset('images/products/'.$pro->image)}}" width="30%" alt="ko cos anh">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
@php
    $i=0;
    
@endphp
@foreach ($pro_vars as $pv)
@php
    $i++;
@endphp
<div class="content-wrapper var">
  <div class="row">
      <div class="col-12 grid-margin stretch-card" id="">
          <input class="form-control" type="hidden" name="id">
        <div class="card card-body">
          <h4 class="card-title">Biến Thể {{$i}}</h4>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleSelectGender">Màu sắc</label>
                <input type="text" name="color" disabled value="{{$pv->color}}" class="form-control amount" id="exampleInputName1" placeholder="">                         
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputName1">Bộ nhớ</label>
                <input type="number" name="memory" disabled value="{{$pv->memory}}" class="form-control amount" id="exampleInputName1" placeholder="Nhập dung lượng bộ nhớ(GB)">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleSelectGender">Gía</label>
                <input type="number" name="price" disabled value="{{$pv->price}}" class="form-control amount" id="exampleInputName1" placeholder="Nhập giá bán">                         
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Hình Ảnh</label>
                <img src="{{asset('images/products/'.$pro->image)}}" width="30%" alt="ko cos anh">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleSelectGender">Chiều dài</label>
                <input type="text" name="width" disabled value="{{$pv->width}}" class="form-control " id="exampleInputName1" placeholder="Nhập chiều dài(mm)">                         
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleInputName1">Chiều rộng</label>
                <input type="number" name="hight" disabled value="{{$pv->hight}}" class="form-control " id="exampleInputName1" placeholder="Nhập chiều rộng(mm)">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleInputName1">Cân nặng</label>
                <input type="number" name="weight" disabled value="{{$pv->weight}}" class="form-control " id="exampleInputName1" placeholder="Nhập cân nặng(gam)">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleInputName1">Độ dày</label>
                <input type="number" name="depth" disabled value="{{$pv->depth}}" class="form-control " id="exampleInputName1" placeholder="Nhập độ dày(mm)">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
          </div>
          <a class="badge badge-danger rounded" style="width: 150px" onclick="return confirm('Xóa mục này?')" href="{{route('deleteVar',$pv->id)}}">Xóa</a></td>
      </div>
      
    </div>
  </div>
</div>
@endforeach


<div class="content-wrapper var">
  <div class="row">

    <div class="col">
      <div class="col-12 grid-margin stretch-card">
        <form method="post" action="{{route('createVariant')}}" enctype="multipart/form-data" id="form-product" class="forms-sample">
          @csrf
          <input type="hidden" name="id" value="{{$pro->id}}" id="">
        <div class="card card-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleSelectGender">Màu sắc</label>
                <input type="text" name="color" class="form-control amount" id="exampleInputName1" placeholder="Nhập màu sắc">                         
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputName1">Bộ nhớ</label>
                <input type="number" name="memory" class="form-control amount" id="exampleInputName1" placeholder="Nhập dung lượng bộ nhớ(GB)">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleSelectGender">Gía</label>
                <input type="number" name="price_var" class="form-control amount" id="exampleInputName1" placeholder="Nhập giá bán">                         
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Hình Ảnh</label>
                <input type="file" name="file_upload_var" class="form-control avatar">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleSelectGender">Chiều dài</label>
                <input type="text" name="width" class="form-control " id="exampleInputName1" placeholder="Nhập chiều dài(mm)">                         
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleInputName1">Chiều rộng</label>
                <input type="number" name="hight" class="form-control " id="exampleInputName1" placeholder="Nhập chiều rộng(mm)">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleInputName1">Cân nặng</label>
                <input type="number" name="weight" class="form-control " id="exampleInputName1" placeholder="Nhập cân nặng(gam)">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleInputName1">Độ dày</label>
                <input type="number" name="depth" class="form-control " id="exampleInputName1" placeholder="Nhập độ dày(mm)">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
      <button type="button" class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>

<script>

function Validator(options){
    var formElement = document.querySelector(options.form);
    var selectorRules = {}
// hàm thực hiện validate
var selectorRules = {}
function validate(inputElement, rule) {
      var input =inputElement.parentElement.querySelector('.form-control')
      var errorElement = inputElement.parentElement.querySelector('.form-message');
      var errorMessage 
      //
        var rules = selectorRules[rule.selector]
        
        for(var i = 0; i < rules.length; ++i){
          errorMessage = rules[i](inputElement.value)
          if (errorMessage) break;
        }
        if (errorMessage) {
          errorElement.innerText = errorMessage;
          input.style.borderColor = '#f33a58'
      
        }else{
          errorElement.innerText = ''
          input.style.borderColor = ''
        }
        return !errorMessage;
    }
    
    // lấy element của form
    if(formElement) {
      formElement.onsubmit = function(e) {
        

        var isFormValid = true

        options.rules.forEach( function(rule) {
         
          var inputElement = formElement.querySelector(rule.selector)
          var isValid = validate(inputElement,rule)
          if(!isValid) {
            isFormValid = false
          }
        });
        

        if(isFormValid){
          formElement.submit()
        }else{
          e.preventDefault();
        }
      }
        // lặp qua mỗi rule và xửa lý sự kiện
      options.rules.forEach( function(rule) {
        //lu lai cac rules cho moi input
        
        if(Array.isArray(selectorRules[rule.selector])) {
          selectorRules[rule.selector].push(rule.test)
        }else{
          selectorRules[rule.selector] = [rule.test]
        }

        var inputElement = formElement.querySelector(rule.selector)
        
        var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
        var input =inputElement.parentElement.querySelector('.form-control')
        console.log(input)

          if(inputElement) {
            inputElement.onblur = function() {
              validate(inputElement,rule)
            }
            inputElement.oninput = function() {
              errorElement.innerText = ''
              input.style.borderColor = ''
            }
          }
      })
    }
}

Validator.isRequired = function (selector) {
    return {
      selector,
      test(value) {
        return value.trim() ? undefined : 'Vui lòng nhập tên sản phẩm'
      }
    }
}
Validator.isList = function(selector) {
  return {
      selector,
      test(value) {
        return value ? undefined : 'Vui lòng chọn danh mục'
      }
    }
}

Validator.isFirm = function(selector) {
  return {
      selector,
      test(value) {
        return value ? undefined : 'Vui lòng chọn hãng'
      }
    }
}
Validator.isPrice= function(selector) {
  return {
      selector,
      test(value) {
        return value ? undefined : 'Vui lòng nhập giá'
      }
    }
}
Validator.isDiscount= function(selector) {
  return {
      selector,
      test(value) {
        return value ? undefined : 'Vui lòng nhập % giảm giá'
      }
    }
}
Validator.isDate= function(selector) {
  return {
      selector,
      test(value) {
        return value ? undefined : 'Vui lòng chọn ngày'
      }
    }
}
Validator.isAmount= function(selector) {
  return {
      selector,
      test(value) {
        return value ? undefined : 'Vui lòng nhập số lượng'
      }
    }
}
Validator.isStatus= function(selector) {
  return {
      selector,
      test(value) {
        return value ? undefined : 'Vui lòng nhập số lượng'
      }
    }
}

Validator.isDescribe = function (selector) {
  return {
    selector,
    test(value) {
      return value ? undefined : 'Vui lòng nhập mô tả sản phẩm'
    }
  }
}

// Validator.isAvatar = function (selector) {
//   return {
//     selector,
//     test(value) {
//       return value ? undefined : 'Vui lòng chọn ảnh'
//     }
//   }
// }

   Validator({
    form: '#form-edit-product',
    errorSelector: '.form-message',
    rules: [
      Validator.isRequired('.fullname'),
      Validator.isList('.list'),
      Validator.isFirm('.firm'),
      Validator.isPrice('.price'),
      Validator.isDiscount('.discount'),
      Validator.isDate('.date'),
      Validator.isAmount('.amount'),
      Validator.isStatus('.status'),
      Validator.isDescribe('.describe'),
      // Validator.isAvatar('.avatar')
    ],
  })
</script>
@endsection