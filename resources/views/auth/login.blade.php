
@include('frontend.body.header')

<head><link rel="stylesheet" href="{{asset('assets/css/login.css')}}"></head>



  <div class="container" >
    
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
          <div class="login-form">
            <div class="title">Login</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="input-boxes">
              <p class="text-center">

                
              <div class="input-box">
                <i class="fas fa-envelope icon"></i>
                <input id="email"  type="email" name="email"  placeholder="rnter your email">
              </div>
              <div class="input-box">
                <i class="fas fa-lock icon"></i>
                <input  id="password" 
                type="password"
                name="password"  placeholder="Enter your password" >
              </div>
              <div class="text"><a href="{{route('password.request')}}">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Login" >
              </div>
              <div class="text sign-up-text">Don't have an account? <a href="{{route('register')}}">Sign up now</a> </div>
            </div>
        </form>
      </div>

    </div>
    </div>
  </div>

