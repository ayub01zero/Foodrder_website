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
                  <form action="{{route('admin.password.update')}}" method="POST" >
                    @csrf
                  <br>
                

                  <div class="row">
                    
                    <label for="exampleFormControlInput1" class="form-label">old passowrd</label>
                    <input type="password" name="old_password"  class="form-control" placeholder="enter old password">
                    @error('old_password')<span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                
                  <br>
                  <div class="row">
                    
                    <label for="exampleFormControlInput1" class="form-label">new password</label>
                    <input type="password" name="new_password" class="form-control" placeholder="enter new password">
                    @error('new_password')<span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                  <br>
                  
                  <div class="row">
                    
                    <label for="exampleFormControlInput1" class="form-label">confirm password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="enter confirm password">
                  </div>
                  <br>
                  
                 
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-primary px-4" value="Save password" />
                    </div>
                  </div>

                   </form>
                </div>
               
              </div>

            </div>
          </div>
        </div>
    </div>


 

    @endsection