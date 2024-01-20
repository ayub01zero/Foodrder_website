@extends('frontend.body.body')
@section('interface')

<div class="container myfoods">

        

    <div class="row  d-flex justify-content-center align-items-center ">
        <div class="col-md-6 col-12 col-lg-8">

        
           <br>
            <form action="{{route('product.search')}}">
            <input  name="search"class="form-control form-input meinput w-50 text-center m-auto" type="text"  placeholder="Search...">
            </form>
        
        </div>
        </div>
        
         <div class="row g-3">
      
        @foreach ($allproducts as $items)
                    <div class="col-12 col-md-6 col-lg-4 ">
        
            
        
        
                        <div class="card">
                           
                       <img src="{{asset($items->product_image)}}" class="rounded">  
                            <div class="card-body">
                            <h5 class="card-title">{{$items->product_name}}</h5>
                         <p class="card-text">{{$items->short_descp}}</p>
        
                   @auth
                  
                   <a style="background-color:#4eb060;" href="{{route('add.order',$items->id)}}"  class="btn btn-outline text-light btn-sm bold">Order</a>
                   <a style="background-color:#4eb060;" href="{{ route('add.favorite', $items->id) }}" class="btn btn-outline text-light">
                    <i class="fa fa-heart"></i> <!-- Use the <i> element for the icon -->
                </a>
                                   
                   @if($items->discount_price == NULL)
                  <button  style="background-color:#ff6c57;"  class="btn  btn-sm text-light ">{{$items->selling_price}}</i></button>
                  @else
                  <button  style="background-color:#ff6c57;"  class="btn  btn-sm text-light ">{{$items->selling_price}}$ -> {{$items->discount_price}}$</i></button>
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
       
        
            
<div class="row col-md-12 m-auto p-2  ">
    {{ $allproducts->links() }}

</div>


</div>  
     

      

<style>
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

<script>
    function submitCategoryForm(selectElement) {
        selectElement.closest('form').submit();
    }
</script>


<script>
    document.getElementById('search').addEventListener('input', function() {
        let query = this.value;

        if (query.length >= 3) {
            fetch('/search?q=' + query)
                .then(response => response.json())
                .then(data => {
                    let resultsContainer = document.getElementById('results');
                    resultsContainer.innerHTML = '';

                    data.forEach(result => {
                        let item = document.createElement('div');
                        item.textContent = result.name;
                        resultsContainer.appendChild(item);
                    });
                });
        }
    });
</script>

@endsection