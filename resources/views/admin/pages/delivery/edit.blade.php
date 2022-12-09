@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Chỉnh sửa phương thức vận chuyển</h4>
            <p class="card-description">
              Chỉnh sửa thông tin
            </p>
            <form method="POST" action="{{route('EditDelivery_')}}" enctype="multipart/form-data" id="form-disc" class="forms-sample">
              @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <!-- <input type="hidden" name="id" class="form-control postage" id="exampleInputName1" placeholder="Nhập cước phí"  value="{{$allDeli->id}}" > -->
                        <label for="exampleInputName1">Cước phí</label>
                        <input type="text" name="value" class="form-control postage" id="exampleInputName1" placeholder="Nhập cước phí"  value="{{$allDeli->value}}" >
                        <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Nhập phương thức vận chuyển</label>
                        <input type="text" name="name" class="form-control name" id="exampleInputName1" placeholder="Nhập phương thức giao hàng" value="{{$allDeli->name}}">
                        <span style="font-size: 15px; color: #f33a58; line-height: 3px; padding-top: 10px;  display: block;" class="form-message"></span>
                    </div>
                </div>

                
            </div>
              <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa</button>
              <button type="button" class="btn btn-light">Cancel</button>

            </form>
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

Validator.isValue= function(selector) {
  return {
      selector,
      test(value) {
        return value ? undefined : 'Vui lòng nhập cước phí'
      }
    }
}

Validator.isName= function(selector) {
  return {
      selector,
      test(value) {
        return value ? undefined : 'Vui nhập phương thức vận chuyển'
      }
    }
  }

   Validator({
    form: '#form-disc',
    errorSelector: '.form-message',
    rules: [
      Validator.isValue('.postage'),
      Validator.isName('.name'),
    ],
  })
</script>
@endsection