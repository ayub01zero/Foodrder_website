@extends('admin.admin_body.body')
@section('main')


<div class="table table-responsive col-lg-8 col-md-8 col-sm-6 m-auto p-3 mt-5" >
<table class="table text-center text-dark p-5 col-lg-8 bg-white rounded shadow-sm  table-hover " >
      <thead>
        <tr>

          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone_num</th>
          <th scope="col">Address</th>
          <th scope="col">Roll</th>
          <th scope="col">Actions</th>
     
        </tr>
      </thead>
      <tbody> 
      

@foreach ($allusers as $items)
  <tr>

          <td>{{$items->id}}</td>
          <td>{{$items->name}}</td>
          <td>{{$items->email}}</td>
          <td>{{$items->phone}}</td>
          <td>{{$items->address}}</td>
          <td>{{$items->role}}</td>
          <td>
            <a href="{{route('users.orders',$items->id)}}" class="btn btn-success btn-sm">Orders</a>    
            <a href="{{route('delete.user',$items->id)}}" class="btn btn-danger btn-sm">delete</a>  
            </td>
        
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  @endsection
  


