@extends('frontend.body.body')
@section('interface')



<div class="col-md-8 mx-auto text-center topof">
              
    <h1 style="color: #ff6c57;">Your Orders </h1>
    <p>  dear customer , if you have any problem in order list please warn us
      to solve your problem , foodorder always with you so enjoin you moments  </p>
</div>
<div class="table table-responsive col-lg-8 col-md-8 col-sm-4 m-auto p-3 mt-5" >
<table class="table text-center text-dark p-5 col-lg-8 " >
    <thead>
      <tr>
        <th>customer</th>
        <th>order number</th>
        <th>total</th>
        <th>date</th>
        <th>status</th>
        <th>view</th>  
       
    
      </tr>
    </thead>
    <tbody>

@foreach ($orders as $order)


    <tr>
      
<td>{{$order->user->name}}</td>
<td class="bg-success">{{$order->order_number}}</td>
<td>{{$order->amount}}$</td>
<td>{{$order->order_date}}</td>
@if ($order->return_order == 1)
<td class="bg-danger">removed</td>
@else
<td>{{$order->status}}</td>
@endif
<td > <a class="badge bg-primary" href="{{route('details.orders',$order->id)}}">details</a></td>
 </tr>

      @endforeach




    </tbody>
  </table>
</div>



<style>
    .topof{
margin-top: 100px;
}
    .cartsection{
            position: relative;
        }
        .mycart{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            padding-bottom: 100px;
        }
    
    
    .mecont{
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
    
        }
    .error-template {padding: 40px 15px;text-align: center; }
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; }
    
    
    </style>
@endsection