
@include('frontend.body.header')

<head><link rel="stylesheet" href="{{asset('assets/css/register.css')}}"></head>



  <div class="container mt-4" >
    
    <div class="cover " >
      <div class="front ">
        <img src="{{asset('assets/image/foodback.jpg')}}" >
        
      </div>
      <div class="back">
        <img class="backImg" src="{{asset('assets/image/foodhome.webp')}}" alt="not image"> 
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
        <div class="signup-form">
          <div class="title">Signup</div>
          <form method="POST" action="{{ route('register') }}">
        @csrf
            <div class="input-boxes">
            <p class="text-center">
<!-- data alert -->
              </p>
              <div class="input-box">
                <i class="fas fa-user icon"></i>
                <input  id="name" type="text" name="name" :value="old('name')"   placeholder="Enter your name"  >
              </div>
              <div class="input-box">
                <i class="fas fa-envelope icon"></i>
                <input id="email"  type="email" name="email" :value="old('email')" placeholder="Enter your email" >
              </div>
              <div class="input-box">
                <i class="fas fa-lock icon"></i>
                <input id="password" 
                            type="password"
                            name="password" placeholder="Enter your password">
              </div>
              <div class="input-box">
              <i class="fa fa-solid fa-location-pin icon"></i>
                <input id="password_confirmation" 
                            type="password"
                            name="password_confirmation" placeholder="Enter confirm password" >
              </div>
              <div class="button input-box">
                <input type="submit" value="register">
              </div>
              <div class="text sign-up-text">Already have an account? <a href="{{route('login')}}"> Login </a></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>




