@extends('frontend.body.body')
@section('interface')


<br><br><br>


<div class="container-fluid col-lg-8 col-sm-8 col-md-10 mt-3 pt-4 myaddorder ">
    <div class="row bg-white shadow rounded text-dark rounded p-2 m-2 text-center mt-5 myaddform" > 
   
    
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 m-auto text-center">
    <h3><span  style="color:#4eb060;"> Yala </span>  <span style="color: #ff6c57;">Order Now</span> </h3> 
    </div>
    
    <hr>
    
    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 m-auto text-center mt-2">
       
@foreach ($GetProduct as $items)
            
<form  method="POST" action="{{route('add.cart',$items->id)}}">
 @csrf
  

    <div class="form-group mb-2 text-start">
    <label for="orderNumberLabel">product name</label>
    <input type="text" value="{{$items->product_name}}"  class="form-control mb-3" id="orderNumberLabel" readonly >
    </div>
    
    @php
    $amount = $items->selling_price - $items->discount_price;
    $discount = ($amount/$items->selling_price) * 100; 
    @endphp

  <div class="form-group mb-2 text-start">
    <label for="priceLabel"> Price  <span class="bg-danger text-light rounded-1">{{ round($discount) }}% Off</span></label>
 @if($items->discount_price == NULL)
 <input type="number" min="1"  step="any" value="{{$items->selling_price}}" class="form-control mb-3" id="priceLabel" readonly 
    >
 @else

 <input type="number" min="1"  step="any" value="{{$items->discount_price}}" class="form-control mb-3" id="priceLabel" readonly 
     >
 @endif
    
    </div>
    
    <div class="form-group mb-2 text-start">
    <label for="quantityLabel"> Quantity</label>
    <input id="qty"
    type="number"
    min="1"
    name="qty"
    class="@error('qty') is-invalid @enderror form-control mb-3" 
    placeholder="enter qty">

    </div>

    <button type="submit"   style="width: 200px;height:50px; color:#4eb060;" class="btn btn-dark btn-lg mb-2 mt-3" > 
    <span class="fa fa-shopping-cart"></span> Order
    </button>

    </div>

    <div class="col-12 col-sm-112 col-md-6 col-lg-6 col-xl-4 m-auto text-center mt-2 p-2 rounded">
   
<img src="{{asset($items->product_image)}}" style="width:100%;height:200px;  object-fit:contain"  class="card-img"> 
    
    <h4 class="mt-3" style="font-size: 15px;">{{$items->short_descp}}</h4>
</form>
    @endforeach
    </div>
    </div>
    </div>
    


@endsection