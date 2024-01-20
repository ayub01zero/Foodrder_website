@extends('frontend.body.body')
@section('interface')



@php
$HaveFavorite = App\Models\favorite::where('user_id', Auth::id())->count();
@endphp
   

@if($HaveFavorite > 0)


<div class="container myfoods">
    <div class="row  d-flex justify-content-center align-items-center ">
    <div class="col-md-6 col-12 col-lg-8">
       
           




    </div>
    </div>
     <div class="row g-3">
        
           
            
         
    @foreach ($wishlist as $items)

                <div class="col-12 col-md-6 col-lg-4 ">
    
        
    
    
                    <div class="card">
                       
                        <img src="{{asset($items->product->product_image)}}" class="rounded">  
                        <div class="card-body">
                        <h5 class="card-title">{{$items->product->product_name}}</h5>
                     <p class="card-text">{{$items->product->short_descp}}</p>
    
           
                     @auth
                  
                     <a style="background-color:#4eb060;"   class="btn btn-outline text-light btn-sm bold">Order</a>
                     <a style="background-color:#ff6c57;" href="{{ route('remove.favorite', $items->id) }}" class="btn btn-outline text-light">
                      <i class="fa fa-remove"></i> <!-- Use the <i> element for the icon -->
                  </a>
                                     
                     @if($items->product->discount_price == NULL)
                    <button  style="background-color:#ff6c57;"  class="btn  btn-sm text-light ">{{$items->product->selling_price}}</i></button>
                    @else
                    <button  style="background-color:#ff6c57;"  class="btn  btn-sm text-light ">{{$items->product->selling_price}}$ -> {{$items->product->discount_price}}$</i></button>
                    <span class="text-danger">discounted</span>
                    @endif
          
                     @else
                     <a href="{{route('login')}}" style="background-color:#ff6c57;"  class="btn  btn-sm text-light ">please login to get the food</i></a>
          
                     @endauth
    
             
    
    
                        </div>
                    </div>
                
                </div>
         @endforeach
   
    
            </div>
        </div>



        @else

        
<section class="caresection mt-5">  
    <div class="container mycart"> 
         <h1 class="text-center " style="margin-top: 100px;">  <span style="color: #ff6c57;">E</span>mpty <i class="far fa-heart"></i></h1>
         </section>
         </div>
@endif
    
        
    
    <style>

        .caresection{
            padding-top: 140px!important;
        }
        img{
            height: 300px!important;
            width: 100%;
       
        }
        .myfoods{
            padding-top: 120px;
        }
       .card{
       margin-top: 20px!important;
        height: 500px!important;
         transition: transform 0.5s ease;
         border: none!important;
         box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;
       }
        .card:hover{
            
            transform: translateY(-10px);
           
        }
    
        .meinput{
          height: 30px!important;
          border: none!important  ;
          box-shadow: none!important;
          transition: .7s ease-in-out;
        }
        .meinput:hover{
        font-size: 20px!important;
        color: #4eb060; 
        }
    
    </style> 


@endsection