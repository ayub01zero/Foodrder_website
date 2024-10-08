@extends('frontend.body.body')
@section('interface')



  <head> <link rel="stylesheet" href="{{asset('assets/css/home.css')}}"></head>

<section id="hero" class="d-flex align-items-center justify-content-center">

    <div class="container  text-light ">
      <div class="row">
        <div class="hiddenn col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        
   <div class="waviy ">
   <h1 style="--i:1">F</h1>
   <h1 style="--i:2">o</h1>
   <h1 style="--i:3">o</h1>
   <h1 style="--i:4">d</h1>
   <h1 style="--i:5">o</h1>
   <h1 style="--i:6">r</h1>
   <h1 style="--i:7">d</h1>
   <h1 style="--i:8">e</h1>
   <h1 style="--i:9">r</h1>
  </div>
  <h1 style="--i:10"> Resturant for online delivering</h1>
 
          <h2 >Welcome to Foodorder we as a team prepare and deliver the best type of food at lowest price so choose us.</h2>
          <div><a href="foods.php" class="btn-get-started scrollto text-dark" style="text-decoration: none;"><i class="fa fa-play"></i> Get Started</a></div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="{{asset('assets/image/foodhome.webp')}}" style=" background-color: white!important; border: none!important;" class="img-fluid imagemove" alt="">
        </div>
      </div>
    </div>
  </section>

  <div class="hero vh-100 d-flex align-items-center mst_image" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center hiddenn">
                    <h1 class="text1">Foodorder Resturant Foods</h1>
                    <p class="text2 my-3">Our restaurant serves delicious, high-quality food made with fresh, locally sourced ingredients. We offer a diverse menu with options for everyone, including vegetarian
                       and gluten-free dishes. Come dine with us and try our signature dishes and decadent desserts</p>
                        <div class="d-flex align-items-center justify-content-center">
                    <a href="foods.php" class="btn btn1 me-2 "><i class="fa fa-play"></i> Get Started</a>
                    </div>
                  </div>
            </div>
        </div>
  
    </div>


    <section id="blog" class=" mt-5">
        <div class="container ">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center ">
              
                    <h1>Our Services</h1>
                    <p> Our restaurant's friendly and knowledgeable staff are dedicated to ensuring that every guest has a memorable 
                      dining experience. We strive to provide top-notch service that exceeds your expectations </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4 ">
                    <div class="blog-post card-effect  " style="background-color: #ECEFF1;">
                        <img src="{{asset('assets/image/fast del-compressed.jpg')}}" alt="">
                        <h5 class="mt-4"><a style="color: #ff6c57;">Fast Delivery</a></h5>
                        <p>Foodorder has the best delivery in the area and we also provide the best delivery services to customers</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="blog-post card-effect" style="background-color: #ECEFF1;">
                        <img src="{{asset('assets/image/foods1-compressed.jpg')}}" alt="">
                        <h5 class="mt-4"><a   style="color: #ff6c57;">Best Foods</a></h5>
                        <p>With Foodorder the best food available we always try to make best food available at the lowest price</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="blog-post card-effect" style="background-color: #ECEFF1;">
                        <img src="{{asset('assets/image/team-compressed.jpg')}}" alt="">
                        <h5 class="mt-4"><a  style="color: #ff6c57;">Foodorder Staff</a></h5>
                        <p> The best staff work with customers to help them with any technical problems if they exist </p>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <div class="team-boxed mt-5 ">
        <div class="container">
            <div class="intro">
                <h1 class="text-center text-dark"><span style="color: #ff6c57;">M</span>eet our team</h1>
            </div>
            <div class="row people d-flex justify-content-center">
            
                <div class="col-md-6 col-lg-4 item">
                    <div class="box hiddenn"><img class="rounded-circle" data-bs-hover-animate="pulse" src="{{asset('assets/image/ayodeveloper-compressed.jpg')}}">
                        <h3 class="name">Ayub Mutalib</h3>
                        <p class="title">Website Developer</p>
                        <p class="description"><br>Hello I'm Ayub , I'm a website Developer (back-end) & (front-end) developer I'm constantly working to make myself stronger in this field, especially in the back-end. level of framework : bootstrap & laravel<br><br></p>
                        <div class="social"><a href="https://www.facebook.com/profile.php?id=100009790363645"><i class="fa-brands fa-facebook-f"></i></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box hiddenn"><img class="rounded-circle" data-bs-hover-animate="pulse" src="{{asset('assets/image/kure khalide-compressed.jpg')}}">
                        <h3 class="name">ali kamal</h3>
                        <p class="title">Website helper</p>
                        <p class="description"><br>Hello I'm Mohammed , I'm a web site helper And working with developer to create a website , I'll help the developers in the front end if you want to know more about my work click contact below<br><br></p>
                        <div class="social"><a href="https://www.facebook.com/profile.php?id=100030099487255"><i class="fa-brands fa-facebook-f"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@livewire('dashboard')


    
    <div class="loader-container">
        <img src="{{asset('assets/image/loader.gif')}}"  alt="">
    </div>

    

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-double-up"></i></button>

    <script>
  function loader(){
  document.querySelector('.loader-container').classList.add('fade-out');
}
function fadeOut(){
  setInterval(loader, 2200);
}
  window.onload = fadeOut;




  const observer = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
console. log(entry)
if (entry.isIntersecting) {
entry.target.classList.add('show');

} else {
entry.target.classList.remove('show');

}
});
  });

const hiddenElements = document .querySelectorAll('.hiddenn');
hiddenElements.forEach((el) => observer.observe(el));





mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {  if (document.body.scrollTop > 20  || document.documentElement.scrollTop > 20) {
mybutton.style.display = "block";
} else {
mybutton.style.display = "none";
}
}
function topFunction() {
        document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE     and Opera
 }
</script>



@endsection