@extends('admin.admin_body.body')
@section('main')

<div class="container mt-5 d-flex justify-content-center mb-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="text-left">
                <h6>All Feedback{{count($allfeddback)}}</h6>
            </div>
         

            @foreach($allfeddback as $items)
                
            <div class="card  p-3 mb-2">
                
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column ms-2">
                        <h5 class="mb-1 text-primary">{{$items->full_name}}</h5>
                        <h6>{{$items->subject}}</h6>
                        <p class="comment-text">{{$items->message_feedback}}</p>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row gap-3 align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="ms-1 fs-10">{{$items->email}}</span>
                        </div>
                        
                    </div>
                    {{-- <div class="d-flex flex-row ">
                        <span class="text-muted fw-normal fs-10"></span>
                    </div> --}}

                </div>
            </div>           
      
            @endforeach      

       </div> 
    </div>
</div>

@endsection



