@extends('admin.admin_body.body')
@section('main')


<div class="table table-responsive col-lg-8 col-md-8 col-sm-6 m-auto p-3 mt-5 " >
<table class="table text-center text-dark p-5 col-lg-8 bg-white rounded shadow-sm  table-hover mytable" >
    <tr>
        <th >#</th>
        <th>name</th>
        <th>category</th>
        <th>price</th>
        <th>quantity</th>
        <th>discount</th>
        <th>image</th>
        <th>action</th>
    </tr>

    @foreach ($products as $items)
        
     <tr>
        <td>{{$items->id}}</td>
        <td>{{$items->product_name}}</td>
        <td>{{$items->category->category_name}}</td>
        <td>{{$items->selling_price}}</td>
        <td>{{$items->product_qty}}</td>
        <td>{{$items->discount_price}}</td>
        <td><img src="{{ asset($items->product_image) }}" style="width: 70px; height:40px;" ></td>
       
        

        <td >
            <a style="text-decoration: none!important;color:black;" href="{{route('edit.products',$items->id)}}" <i class="fas fa-edit p-2"></i> </a>
            <a style="color: black;" href="{{route('delete.products',$items->id)}}"  <i class="fas fa-trash-alt"></i> </a>
        </td>

    </tr>
    @endforeach
</table>
</div>
    



@endsection