@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


    <div class="row">
                              
                                <div class="col-lg-4 mb-3">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            ارسال نشده
                                            <div class="text-white-50 small">{{$basketcount}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            در حال بررسی
                                            <div class="text-white-50 small">{{$basketcount}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            تایید شده
                                            <div class="text-white-50 small">{{$basketcount}}</div>
                                        </div>
                                    </div>
                                </div>
    </div>
   <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">t</th>
      <th scope="col">title</th>
      <th scope="col">count</th>
      <th scope="col">add to cart</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
    
      <th scope="row" class="proId">{{$product->id}}</th>
      <td>{{$product->id}}</td>
      <td>{{$product->title}}</td>
      <td class="x">{{$product->count}}</td>
      <td>   
      <form class="form-inline" method="POST" id="SubmitForm" action="/home"> 
      @csrf  
       <input type="button" col-md-2 class="btn btn-outline-info add " value="+"></input>
       <input class="form-control counter col-md-2" type="text" name="qnt" value="0"></input>
       
      <input type="button" class="btn btn-outline-danger sub" value="-" ></input>
      <input type="submit" class="btn btn-danger " value="add to cart"></input>
      <input type="text" class="btn btn-danger d-none productID" name="productID" value=""></input>
      </form>
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

<script>

    $('.add').click(function(){
         qnt = $(this).next();
          
         $(".productID").val($(this).parent().parent().prev().prev().prev().html());
         console.log($(".productID").val());
         if(Number(qnt.val())<Number($(this).parent().parent().prev().html()))
         {
          qnt.val(Number(qnt.val())+1);
          }
     });
     $('.sub').click(function(){
      qnt = $(this).prev();
      
         if(Number(qnt.val())>0){
          qnt.val(Number(qnt.val())-1);
        }
    });
    // $('#SubmitForm').on('submit',function(e){
    // e.preventDefault();

    // let name = $('#InputName').val();
    // let email = $('#InputEmail').val();
    // let mobile = $('#InputMobile').val();
    // let message = $('#InputMessage').val();
    
    // $.ajax({
    //   url: "/submit-form",
    //   type:"POST",
    //   data:{
    //     "_token": "{{ csrf_token() }}",
    //     name:name,
    //     email:email,
    //     mobile:mobile,
    //     message:message,
    //   },
    //   success:function(response){
    //     $('#successMsg').show();
    //     console.log(response);
    //   },
    //   error: function(response) {
    //     $('#nameErrorMsg').text(response.responseJSON.errors.name);
    //     $('#emailErrorMsg').text(response.responseJSON.errors.email);
    //     $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
    //     $('#messageErrorMsg').text(response.responseJSON.errors.message);
    //   },
    //   });
    // });
</script>
@endsection
