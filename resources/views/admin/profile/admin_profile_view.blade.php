@extends('admin.admin_body.body')
@section('main')


<div class="container">
    <div class="main-body">
    
    
          <div class="row gutters-sm mt-4">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ (!empty($adminData->photo)) ? url('upload/AdminData/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{$adminData->name}}</h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">{{$adminData->address}}</p>
                     
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              
              <div class="card mb-3">
                <div class="card-body">
                  <form action="{{route('admin.profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <br>
                

                  <div class="row">
                    
                    <label for="exampleFormControlInput1" class="form-label">name</label>
                    <input type="text" name="name" placeholder="your name" value="{{$adminData->name}}" class="form-control">
                  </div>
                <hr>
                 
                  <div class="row">
                    
                    <label for="exampleFormControlInput1" class="form-label">username</label>
                    <input type="text" name="username" placeholder="your username" class="form-control" value="{{$adminData->username}}"  >
                  </div>
                  <hr>
                  
                  <div class="row">
                    
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" placeholder="your email" class="form-control " value="{{$adminData->email}}" >
                  </div>
                 <hr>
                  
                  <div class="row">
                    
                    <label for="exampleFormControlInput1" class="form-label">phone number</label>
                    <input type="text" name="phone" placeholder="your number" class="form-control" value="{{$adminData->phone}}" >
                  </div>
                 <hr>
                  <div class="row">
                    
                    <label for="exampleFormControlInput1" class="form-label">address</label>
                    <input type="text" name="address" placeholder="your address" class="form-control" value="{{$adminData->address}}" >
                  </div>
                  <hr>
                  <div class="row">
                    
                    <label for="exampleFormControlInput1" class="form-label">photo</label>
                    <input type="file" name="photo"  id="image" class="form-control"  >
                  </div>
                  <br>
                  
			<div class="row mb-3">
			
				<div class="col-sm-9 text-secondary">
					 <img id="showImage" src="{{ (!empty($adminData->photo)) ? url('upload/AdminData/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="Admin" style="width:100px; height: 100px;"  >
                
				</div>
			</div>
<hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                    </div>
                  </div>
                   </form>
                </div>
               
              </div>

   
            
            </div>
          </div>

        </div>
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
        $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
        });
      });
    </script>

    @endsection