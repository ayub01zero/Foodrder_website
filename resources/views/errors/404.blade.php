@extends('frontend.body.body')
@section('interface')


<div class="container mecont mt-5">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="error-template ">
                <h1 class="text-dark">
                    Oops!</h1>
                <h2 class="text-dark">
                    404 Not Found</h2>
                <div class="error-details text-dark">
                    Sorry, an error has occured, Requested page not found!
                </div>
                <div class="error-actions ">
                    <a href="home" style="background-color: #ff6c57;" class="btn btn-lg "><span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a><a   href="login" class="btn  btn-lg text-dark"><span class="glyphicon glyphicon-envelope "></span> Login in </a>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .cartsection{
            position: relative;
            
        }
        .mycart{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            padding-bottom: 100px;
        }
    
    
    .mecont{
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
          
          
        }
    .error-template {padding: 40px 15px;text-align: center; }
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; }
    
    img{
            height: 300px!important;
            width: 100%;
       
        }
        .myfoods{
            padding-top: 120px;
        }
       .card{
         transition: transform 0.5s ease;
         border: none!important;
       }
        .card:hover{
            
            transform: translateY(-10px);
           
        }
    



@endsection