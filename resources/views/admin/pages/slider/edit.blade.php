@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sửa Slide</h4>
            <p class="card-description">
            
            </p>
            <form method="POST" action="{{Route('editSlide')}}" enctype="multipart/form-data" id="form_edit-slider" class="forms-sample">
              @csrf
              <input type="hidden" name="id" value="{{$slide->id}}" id="">
              <input type="hidden" name="image1" value="{{$slide->image}}" id="">
              <div class="form-group">
                <label for="exampleInputName1">Tên Slide</label>
                <input type="text" name="name" value="{{$slide->name}}" class="form-control fullname" id="exampleInputName1" placeholder="Nhập tên Slide">
                <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
              </div>

              <div class="form-group">
                <label>Hình Ảnh</label>
                <input type="file" name="file_upload" class="form-control ">
              </div>
              <div class="col-sm-6">
                <img src="{{asset('images/slider/'.$slide->image)}}" width="30%" alt="Không có ảnh">
              </div>
              
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleSelectGender">Mô tả Slider</label>
                      <textarea style="resize: none" rows="8" class="form-control describe" name="slide_desc" id="
                      exampleInputPassword1" placeholder="Mô tả danh mục">{{$slide->slide_desc}}</textarea>
                      <span style="font-size: 15p; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
                  </div>
                </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Trạng Thái</label>
                  <select name="slide_status" class="form-control input-sm m-bot-15">
                    @if ($slide->slide_status==0)
                      <option selected value="0">Ẩn</option>
                      <option value="1">HIển thị</option>
                    @else
                      <option value="0">Ẩn</option>
                      <option selected value="1">HIển thị</option>
                    @endif
                    
                  </select>
                </div>
              <div>
         </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button type="button" class="btn btn-light">Cancel</button>    
          </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#cate').click(function(){
      var id_cate=$(this).val();
      $.ajax({
        url: '{{route('loadCateItems')}}',
        method: 'POST',
        data:{
          _token: "{{ csrf_token() }}",
          id_cate:id_cate
        },
        success:function(data){
          $("select[name='cate_id'").html('');
                $.each(data, function(key, value){
                    $("select[name='cate_id']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
        }
      })
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#cate').click(function(){
      var id_cate=$(this).val();
      $.ajax({
        url: '{{route('loadCateItems')}}',
        method: 'POST',
        data:{
          _token: "{{ csrf_token() }}",
          id_cate:id_cate
        },
        success:function(data){
          $("select[name='cate_id'").html('');
                $.each(data, function(key, value){
                    $("select[name='cate_id']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
        }
      })
    });
  });
</script>


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
          return value.trim() ? undefined : 'Vui lòng nhập tên slide';
      }
    }
}

Validator.isDescribe = function (selector) {
  return {
    selector,
    test(value) {
      return value ? undefined : 'Vui lòng nhập mô tả sản slider'
    }
  }
}

   Validator({
    form: '#form_edit-slider',
    errorSelector: '.form-message',
    rules: [
      Validator.isRequired('.fullname'),
      // Validator.isAvatar('.avatar'),
      Validator.isDescribe('.describe'),
    ],
  })
</script>
@endsection