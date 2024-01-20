@extends('admin.admin_body.body')
@section('main')



       
                              <hr>
         


<div class="table table-responsive col-lg-8 col-md-8 col-sm-6 m-auto p-3 mt-2" >
<table class="table text-center m-auto text-dark p-5 col-lg-8 bg-white rounded shadow-sm  table-hover " >
      <thead>
        <tr>

          <th scope="col">#</th>
          <th scope="col">product</th>
          <th scope="col">order number</th>
          <th scope="col">price</th>
          <th scope="col">qty</th>
          <th scope="col">image</th>
        
        
        </tr>
      </thead>
      <tbody>


  @foreach ($orderItem as $items)
 

    <tr>

    <th scope="col">{{$items->id}}</th>
    <td>{{$items->product->product_name}}</td>
    <td class="text-danger">{{$items->order->order_number}}</td>
    <td><span class="badge bg-primary">{{$items->price}}$</span></td>
    <td>{{$items->qty}}</td>
    <td class="image-fluid" >
        <img style="width: 60px" src="{{asset($items->product->product_image)}}" alt="">
        </td>
    
    </tr>


    @endforeach

  </tbody>
    </table>
  </div>


@endsection
