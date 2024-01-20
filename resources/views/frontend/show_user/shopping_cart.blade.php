@extends('frontend.body.body')
@section('interface')


<head><link rel="stylesheet" href="{{asset('assets/css/cart.css')}}"></head>

@php
$mycart = Gloudemans\Shoppingcart\Facades\Cart::content()->count();
@endphp
   

@if($mycart > 0)




<section id="hero" class="d-flex align-items-center justify-content-center ">
    <div class="container  text-light ">

        <div class="row">
            <div class="hiddenn col-lg-5 pt-4 pt-lg-0 mt-4  d-flex flex-column justify-content-center ">
                <h1>Shopping cart <i class="fa-solid fa-cart-arrow-down"></i></i></h1>
                <h2> Hello dear customer in this page you can see the foods that have decided to buy , please be careful not to cancel the request</h2>
                @if(Session::has('coupon'))
                
                @else
                <form class="input-group mt-3" method="POST" action="{{route('apply.coupon')}}">
                  @csrf
                  <input type="text" class="form-control @error('coupon_name') is-invalid @enderror"  placeholder="enter code of coupon" name="coupon_name" value="{{ old('coupon_name') }}">
                  <button class="btn btn-outline-secondary" type="submit" >add coupon</button>
                </form>
                @endif
                


              </div>
              
              <div class="col-lg-7 order-1 order-lg-2 hero-table ">
        
        <div class=" table-responsive col-lg-8 col-md-8 col-sm-8 m-auto p-3 mt-5 text-center" >
        <table class="table text-center text-dark p-5 col-lg-8 " >
            <thead>

              <tr>
        
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Remove</th>
               
              </tr>
            </thead>
            <tbody>
        @foreach ($carts as $items)
        
            <tr>  
                <td>{{$items->name}}</td>
                <td>{{$items->price}}$</td>
                <td>{{$items->qty}}</td>
                <td><a type="submit" href="{{route('delete.cart',$items->rowId)}}" class="btn"><i class="fa fa-solid fa-trash mb-3"></i></a></td>  
            </tr>
  
          
            @endforeach
        
        </tbody>
          </table>
        </div>
        <form class="col-lg-6 m-auto" method="POST" action="cart.php">
               
                <div >
        
                 
                    
              
                <ul class="list-unstyled mb-4 text-dark">
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>{{$cartTotal}}$</strong></li>
                    @if(Session::has('coupon'))

                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">coupon</strong><strong>{{ session('coupon')['coupon_name'] }}</strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">discount amount</strong><strong>{{ session('coupon')['discount_amount'] }}$</strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total amount</strong>
                      <h5 class="font-weight-bold">{{ session('coupon')['total_amount'] }}$</h5> </li>
                   

   @else
   <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
    <h5 class="font-weight-bold">{{$cartTotal}}$</h5> </li>
   @endif
                    
                    
                  </ul>
                
                  <a name="orderuser" href="{{route('apply.checkout')}}" class="button-49">Procceed to checkout</a>
                </div>
               </form>
              </div>
            </div>
      </div>

  </section>

  @else

  <section class="caresection">  
    <div class="container mycart"> 
         <h1 class="text-center " style="margin-top: 100px;">  <span style="color: #ff6c57;">E</span>mpty <i class="fa fa-cart-shopping"></i></h1>
         </div>
         </section>


@endif



@endsection