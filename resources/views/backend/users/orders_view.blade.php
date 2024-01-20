@extends('admin.admin_body.body')
@section('main')



       
                              <hr>
         


<div class="table table-responsive col-lg-8 col-md-8 col-sm-6 m-auto p-3 mt-2" >
<table class="table text-center text-dark p-5 col-lg-8 bg-white rounded shadow-sm  table-hover " >
      <thead>
        <tr>

          <th scope="col">#</th>
          <th scope="col">Customer</th>
          <th scope="col">Amount</th>
          <th scope="col">Ordernumber</th>
          <th scope="col">Date</th>
          <th scope="col">details</th>
        
        
        </tr>
      </thead>
      <tbody>


  @foreach ($UserOrder as $Orders)
 

    <tr>

    <th scope="col">{{$Orders->id}}</th>
    <td>{{$Orders->user->name}}</td>
    <td>{{$Orders->amount}}$</td>
    <td><span class="badge bg-primary">{{$Orders->order_number}}</span></td>
    <td>{{$Orders->order_date}}</td>
    <td> <a class="btn btn-sm btn-info" href="{{route('details.orders.info',$Orders->id)}}">details</a> </td>
    
    </tr>


    @endforeach

  </tbody>
    </table>
  </div>


@endsection
