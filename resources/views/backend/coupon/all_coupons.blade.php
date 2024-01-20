@extends('admin.admin_body.body')
@section('main')


<div class="table table-responsive col-lg-8 col-md-8 col-sm-6 m-auto p-3 mt-5 " >
<table class="table text-center text-dark p-5 col-lg-8 bg-white rounded shadow-sm  table-hover mytable" >
    <tr>
        <th >#</th>
        <th>name</th>
        <th>coupon_discount</th>
        <th>coupon_validity	</th>
        <th>status</th>
        <th>action</th>
    </tr>

    @foreach ($coupon as $items)
        
     <tr>
        <td>{{$items->id}}</td>
        <td>{{$items->coupon_name}}</td>
        <td>{{$items->coupon_discount}}</td>
        <td>{{$items->coupon_validity}}</td>
        <td>
@if($items->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
<span class="badge rounded-pill bg-success">Valid</span>
@else
<span class="badge rounded-pill bg-danger">Invalid</span>
@endif
            </td>       
        <td >
            <a style="text-decoration: none!important;color:black;" href="{{route('edit.coupon',$items->id)}}" <i class="fas fa-edit p-2"></i> </a>
            <a style="color: black;" href="{{route('delete.coupon',$items->id)}}"  <i class="fas fa-trash-alt"></i> </a>
        </td>

    </tr>
    @endforeach
</table>
</div>
    



@endsection