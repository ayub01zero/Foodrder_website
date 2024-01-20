@extends('frontend.body.body')
@section('interface')

<div class="container mt-4">
    <h1 class="h3 mb-5">Payment</h1>
    <div class="row">
      <!-- Left -->
      <div class="col-lg-9">
        <div class="accordion" id="accordionPayment">
          <!-- Credit card -->
          @foreach ($orderItem as $items)
              
         
          <div class="accordion-item mb-3">
            <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
              <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="false">
                
                <label class="form-check-label pt-1" for="payment1">
                 {{$items->product->product_name}}
                </label>
              </div>
              <span>
                <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                  <g fill-rule="nonzero" fill="#333840">
                    <path d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
                    <path d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
                  </g>
                </svg>
              </span>
            </h2>
            <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
              <div class="accordion-body">
                <label class="text-danger mb-2" for="">description</label>
                <div class="mb-3">
                  <p>{{$items->product->short_descp}}</p>
                </div>
                <div class="row">
                  <div class="col-lg-2">
                    <div class="mb-3">
                      <picture>
                        
                        <img src="{{asset($items->product->product_image)}}" class="img-fluid" alt="image desc" style="width:100px;hight:100px;">
                        </picture>
                    </div>
                  </div>
                  <div class="col-lg-2 mt-3">
                    <div class="mb-3">
                      <label class="form-label">qty</label>
                      <p>{{$items->qty}}</p>
                    </div>
                  </div>
                  <div class="col-lg-2 mt-3">
                    <div class="mb-3">
                        <label class="form-label">price</label>
                        <p>{{$items->price}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endforeach

        </div>
      </div>

      @foreach ($orders as $items)
          
      
      <!-- Right -->
      <div class="col-lg-3">
        <div class="card position-sticky top-0">
          <div class="p-3 bg-light bg-opacity-10">
            <h6 class="card-title mb-3">Order Summary</h6>
            <div class="d-flex justify-content-between mb-1 small">
              <span>Email</span> <span>{{$items->user->email}}</span>
            </div>
            <div class="d-flex justify-content-between mb-1 small">
              <span>Order Number</span> <span>{{$items->order_number}}</span>
            </div>
            <div class="d-flex justify-content-between mb-1 small">
              <span>total</span> <span class="text-danger">{{$items->amount}}$  </span>
            </div>
            <hr>
            <div class="d-flex justify-content-between mb-4 small">
              <span>status</span> <strong class="text-dark">{{$items->status}}</strong>
            </div>
            
        @if($items->return_order == 1)
        <div class="form-check mb-3 small">
          <label class="form-check-label text-danger" for="subscribe">
           you requst to delete this order in <br>
           {{$items->return_date}} ,
           and now its deleted
          </label>
        </div>
        @elseif ($items->status == "pending")
        <div class="form-check mb-3 small">
          <label class="form-check-label" for="subscribe">
            if the order in pending process you can remove order if you dont wan it but in the confirm procc    ess you cant do it . 
          </label>
          <a href="{{route('delete.order',$items->id)}}" class="btn btn-primary w-100 mt-3">remove order</a>
        </div>
        @else
        <div class="form-check mb-3 small">
          <label class="form-check-label" for="subscribe">
            if the order in pending process you can remove order if you dont wan it but in the confirm procc    ess you cant do it . 
          </label>
          <a  class="btn btn-primary w-100 mt-3 disabled">remove order</a>
        </div>
        @endif

        
            

            
           
          </div>
        </div>
      </div>

@endforeach
    </div>
  </div>

  <style>
    body{
    background:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
  </style>


@endsection