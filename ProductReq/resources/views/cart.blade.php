@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">product title</th>
      <th scope="col">basketid</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($baskets as $basket)
    <tr>
      <td>{{$basket->title}}</td>
      <td>{{$basket->product_id}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<form action="/cart" method="Post">
<button type="submit">submit</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
