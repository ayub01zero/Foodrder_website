@extends('frontend.body.body')
@section('interface')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

<div class="container mt-100 mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="section-title mt-5 pb-2">
                <h4 class="title mb-2">search result ..</h4>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row g-3">

        @foreach ($results as $items)
            
       
        <div class="col-12 col-md-6 col-lg-4">
            
            <div class="blog-post rounded border">
                <div class="blog-img d-block overflow-hidden position-relative">
                    <img src="{{asset($items->product_image)}}" class="img-fluid rounded-top" alt="">
                </div>
                <div class="content p-3">
                    <small class="text-muted p float-right">{{ Carbon\Carbon::parse($items->created_at)->diffForHumans()}}</small>
                    <small><a href="javascript:void(0)" class="text-primary">{{$items->category->category_name}} Category</a></small>
                    <h4 class="mt-2"><a href="javascript:void(0)" class="text-dark title">{{$items->product_name}}</a></h4>
                    <p class="text-muted mt-2">{{$items->short_descp}}</p>
                    <div class="pt-3 mt-3 border-top d-flex">
                        <div class="author mt-2">
                            <a style="background-color:#4eb060;" href="{{route('add.order',$items->id)}}"  class="btn btn-outline text-light btn-sm bold">Order</a>
                            <a style="background-color:#4eb060;" href="{{ route('add.favorite', $items->id) }}" class="btn btn-outline text-light">
                             <i class="fa fa-heart"></i> <!-- Use the <i> element for the icon -->
                         </a>
                         @if($items->discount_price == NULL)
                  <button  style="background-color:#ff6c57;"  class="btn  btn-sm text-light ">{{$items->selling_price}}</i></button>
                  @else
                  <button  style="background-color:#ff6c57;"  class="btn  btn-sm text-light ">{{$items->selling_price}}$ -> {{$items->discount_price}}$</i></button>
                  <span class="text-danger">discounted</span>
                  @endif
                        </div>
                    </div>
                </div>
            </div><!--end blog post-->
        </div><!--end col-->
        @endforeach

   

</div>
    </div><!--end row-->
</div>

<style>
    body{margin-top:20px;
background:#f5f5f5;
}
.blog-post {
  -webkit-transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) 0s;
  transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) 0s;
}

.blog-post .blog-img .overlay,
.blog-post .blog-img .post-meta {
  position: absolute;
  opacity: 0;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

.blog-post .blog-img .overlay {
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}

.blog-post .blog-img .post-meta {
  bottom: 5%;
  right: 5%;
  z-index: 1;
}

.blog-post .blog-img .post-meta .read-more:hover {
  color: #6dc77a !important;
}

.blog-post .content h1, .blog-post .content h2, .blog-post .content h3, .blog-post .content h4, .blog-post .content h5, .blog-post .content h6 {
  line-height: 1.2;
}

.blog-post .content .title {
  font-size: 18px;
}

.blog-post .content .title:hover {
  color: #6dc77a !important;
}

.blog-post .content .author .name:hover {
  color: #6dc77a !important;
}

.blog-post:hover {
  -webkit-transform: translateY(-7px);
          transform: translateY(-7px);
  -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
          box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}

.blog-post:hover .blog-img .overlay {
  opacity: 0.65;
}

.blog-post:hover .blog-img .post-meta {
  opacity: 1;
}

.blog-post .post-meta .like i,
.profile-post .like i {
  -webkit-text-stroke: 2px #dd2427;
  -webkit-text-fill-color: transparent;
}

.blog-post .post-meta .like:active i, .blog-post .post-meta .like:focus i,
.profile-post .like:active i,
.profile-post .like:focus i {
  -webkit-text-stroke: 0px #dd2427;
  -webkit-text-fill-color: #dd2427;
}

.avatar.avatar-ex-sm {
    height: 36px;
}
.shadow {
    -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15) !important;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15) !important;
}

.text-muted {
    color: #8492a6 !important;
}


.para-desc {
    max-width: 600px;
}
.text-muted {
    color: #8492a6 !important;
}

.section-title .title {
    letter-spacing: 0.5px;
    font-size: 30px;
}
</style>


@endsection