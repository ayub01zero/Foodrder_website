@extends('admin.admin_body.body')
@section('main')



 
 <section id="contact" class="mt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h1>all requst order </h1>
                </div>
            </div>
        </div>
    </section>



<div class="table table-responsive col-lg-8 col-md-8 col-sm-6 m-auto p-3 mt-5 " >
<table class="table text-center text-dark p-5 col-lg-8 bg-white rounded shadow-sm  table-hover mytable" >
    <tr>
        <th >#</th>
        <th>name</th>
        <th>amount</th>
        <th>Num</th>
        <th>status</th>
        <th>process</th>
        
    </tr>


    @foreach ($GetOrders as $items)
    
     <tr>

        <td>{{$items->id}}</td>
        <td>{{$items->user->name}}</td>
        <td>{{$items->amount}}$</td>
        <td>{{$items->order_number}}</td>
        <td class="bg-danger text-white">{{$items->status}}</td>
       <td >   
 <a  href="{{route('confirm.order',$items->id)}}"> <i class="fa fa-check"> </i> </a> 
    </td>    
    </tr>

    @endforeach
 
</table>
</div>
    



@endsection