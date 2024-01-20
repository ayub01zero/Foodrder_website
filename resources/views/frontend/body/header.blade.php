

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sweetfood management system</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">




  
</head>
<body>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/fontawesome.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php"> <span style="color: #4eb060;">S</span>EETFOOD <i style="color:#ff6c57;" class="fa-solid fa-burger"></i><a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span  ><i class="fa fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
       
      <li class="nav-item">
          <a class="nav-link "  href="{{url('/')}}" style="color:#4eb060">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link "  href="{{route('Foods')}}">food</a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">
            @php
            $categories = App\Models\Category::orderBy('category_name','ASC')->get();
                @endphp
        
               @foreach($categories as $category)
            <li><a class="dropdown-item" href="{{route('my.category',$category->id)}}">{{$category->category_name}}</a></li>
            @endforeach
            
        
          
          </ul>
        </li>

   
        


    

  
        @auth
 
<li class="nav-item">
  <a class="nav-link" href="{{route('my.orders')}}"> Orders </a>
</li>

@php
$HaveFavorite = App\Models\favorite::where('user_id', Auth::id())->count();
$haveCart =  Gloudemans\Shoppingcart\Facades\Cart::content()->count();
@endphp
@if ($haveCart == 0 && $HaveFavorite == 0)
@php
$haveCart = null;
$HaveFavorite = null;
@endphp
@endif
<li class="nav-item">
    <a class="nav-link" href="{{ route('favorite.page') }}">Favorite {{ $HaveFavorite }} </a>
</li>
       
<li class="nav-item">
    <a class="nav-link" href="{{ route('my.cart') }}">Cart <span>{{ $haveCart }}</span></a>
</li>

        <li class="nav-item">
          <a class="nav-link" href="Security.php" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Privacy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('User.logout')}}" >Logout</a>
        </li>
@else

 <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}" >Login</a>
        </li>

@endauth

       


      </ul>
    </div>
  </div>
</nav>




<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Privacy and Security <i class=" fa-solid fa-eye"></i></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
   <p>At [security account], we take the privacy and security of our users'
     personal information very seriously. To ensure that your data is protected, 
     we have implemented various measures such as using SSL encryption, regularly
      monitoring our systems for vulnerabilities, and following industry best practices
       for data storage and handling. If you have any questions or concerns regarding your
        privacy and security on our platform, please don't hesitate to contact us at 
        [home -> Contact Us]</p>

        <div class="dropdown mt-3">
      <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" style="color: #4eb060;border:none;">
        @auth
          <span>{{Auth::user()->name}}</span> account
          @else
          <span>!!!</span>
        @endauth
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('account.profile')}}">Update & security</a></li>
      </ul>
    </div>
  </div>
</div>


<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  
}


  .navbar-toggler{
    border: none!important;
    box-shadow: none!important;
  }
.navbar{
  background-color:whitesmoke!important;
  
}
.nav-link {
  font-size: 18px;
  /* color: #ff6c57!important; */
} 

.navbar-brand{
  font-size: 24px;
  color:  black!important;
  font-weight: 600;
}
.navbar-brand::first-letter{
  font-size: 30px;
}

html::-webkit-scrollbar{
    width: .5rem;
}

html::-webkit-scrollbar-track{
    background: transparent;
}

html::-webkit-scrollbar-thumb{
    background: #ff6c57;
    border-radius: 5rem;
}

</style>