@extends('frontend.body.body')
@section('interface')


<head><link rel="stylesheet" href="{{asset('assets/css/security.css')}}"></head>


   

<div class="container card-0 justify-content-center">
  <div class="card-body px-sm-4 px-0">
    <div class="row mycardstyle justify-content-center ">
      <div class="col-md-10 col">
        <h3 class="font-weight-bold ml-md-0 mx-auto text-center text-sm-left mt-4">Privacy and Security</h3>
        <p class="mt-md-4 ml-md-0 ml-2 text-center text-sm-left mt-4">Settings and recommendations to help you keep your account secure , if you have any problem please contact us</p>
      </div>
    </div>
    <div class="row justify-content-center round ">
      <div class="col-lg-10 col-md-12 ">
        <div class="card shadow-lg card-1 ">
        
          <div class="card-body inner-card ">

   
 <div class="row justify-content-center pb-4">

 <div   class="col-lg-10 col-md-6 col-sm-12 " id="user_form">
  <h5>Update profile and password</h5>
  <hr>

 <form action="{{route('store.profile')}}" method="POST">
@csrf
  <div class="form-group">
    <label for="first-name">change name</label>
    <input type="text" class="form-control"  value="{{$allusers->name}}" placeholder="Enter your name"  name="name">
    @error('name')
    <p class="text-danger">{{ $message }} </p> 
@enderror
    </div>
 <div class="form-group">
 <label for="first-name">change Username</label>
 <input type="text" class="form-control"  value="{{$allusers->username}}" placeholder="Enter your username"  name="username">
 @error('username')
 <p class="text-danger">{{ $message }}</p>
@enderror
 </div>
 <div class="form-group">
 <label for="Mobile-Number">change Email</label>
 <input type="email" class="form-control"  value="{{$allusers->email}}" placeholder="Enter your email"  name="email">
 @error('email')
 <p class="text-danger"> {{ $message }}</p>
@enderror
 </div>


 <div class="form-group">
 <label for="time">change location</label>
 <input type="text" class="form-control" value="{{$allusers->address}}" placeholder="Enter address" name="address">
 @error('address')
 <p class="text-danger">{{ $message }}</p>
@enderror
 </div>
 <div class="form-group">
 <label for="skill">change phone</label>
 <input type="text" class="form-control" value="{{$allusers->phone}}" placeholder="Enter phone number" name="phone">
 @error('phone')
<p class="text-danger">{{ $message }}</p>
@enderror
 </div>
 <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-3" role="group" aria-label="Basic mixed styles example">
  <button type="submit "  class="btn text-light btn-dark" >Save profile</button>
</div>
</form>
	

<div class="mt-5 " >
  <h6> you can change passowrd in this section</h6>
</div>

<form action="{{route('store.password')}}" method="POST">
    @csrf
              <div class="input-group form-group ">
				<input name="old_password"  type="password" class="form-control mt-2" placeholder="Enter old password">
               
			  </div>
              @error('old_password')
              <p class="text-danger">{{ $message }}</p>
              @enderror
              <div class="input-group form-group ">
				<input name="new_password"  type="password" class="form-control mt-2" placeholder="Enter new password">
                
			  </div>
              @error('new_password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              <div class="input-group form-group ">			
				<input name="new_password_confirmation"  type="password" class="form-control mt-2" placeholder="Enter confirm password">
			  </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-3" role="group" aria-label="Basic mixed styles example">
                <button type="submit "   class="btn text-light btn-dark" >Save password</button>
              </div>

            </form>
</div>



 
 </div>
         
<div class="row justify-content-center mt-3">
    @livewire('dashboard')
</div>
</div>
</div>
</div>
</div>
</div>
</div>




<style>
    .mecont{
        height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
.error-template {padding: 40px 15px;text-align: center; }
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
</style>



@endsection