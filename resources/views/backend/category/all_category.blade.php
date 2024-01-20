@extends('admin.admin_body.body')
@section('main')

<div class="table table-responsive col-lg-8 col-md-8 col-sm-6 m-auto p-3 mt-5 " >
    <table class="table text-center text-dark p-5 col-lg-8 bg-white rounded shadow-sm  table-hover mytable" >
        <tr>
            <th >#</th>
            <th>Category name</th>
            <th>Category slug</th>
            <th>action</th>
        </tr>
    

        @foreach ($categories as $category_item)
            
        
         <tr>
    
            <td>{{$category_item->id}}</td>
            <td>{{$category_item->category_name}}</td>
            <td>{{$category_item->category_slug}}</td>
         
            
           
            
    
            <td >
                <a style="text-decoration: none!important;color:black;" href="{{route('edit.category',$category_item->id)}}" <i class="fas fa-edit p-2"></i> </a>
                <a style="color: black;" href="{{route('delete.category',$category_item->id)}}"  <i class="fas fa-trash-alt"></i> </a>
            </td>
    
        </tr>
        @endforeach
     
    </table>
    </div>

    @endsection