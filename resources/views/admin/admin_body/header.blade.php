

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/footdash.css')}}">



    <title>SWEETfOOD</title>
</head>
    

<body>


    @php
	$date = date('d-m-y');
	$today = App\Models\Orders::where('order_date',$date)->sum('amount');
	$month = date('F');
	$month = App\Models\Orders::where('order_month',$month)->where('return_order', null)->sum('amount');
    $orders_date = App\Models\feedback::count();
	$year = date('Y');
	$year = App\Models\Orders::where('order_year',$year)->sum('amount');
	$pending = App\Models\Orders::where('status','pending')->get();
	$customer = App\Models\User::where('status','active')->where('role','user')->get();
    $products = App\Models\products::get();
    $qty = App\Models\OrderItem::sum('qty');
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <div class="d-flex" id="wrapper"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold  border-bottom">sweetfood</div>
            <div class="list-group list-group-flush my-3">
            <a href="{{route('admin.dashboard')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-database me-2"></i>Dashboard</a>
                        <a href="{{route('all.category')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-gift me-2"></i>All Category</a>
            <a href="{{route('add.category')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>add Category</a>
                            <a href="{{route('all.products')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-gift me-2"></i>All products</a>
                                <a href="{{route('add.products')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-gift me-2"></i>add products</a>
                        <a href="{{route('user.info')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i>Users & orders  </a>
                      
                        <a href="{{route('all.coupons')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-gift me-2"></i>ALL coupons</a>
                            <a href="{{route('add.coupons')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-gift me-2"></i>Add coupons</a>

                                <a href="{{route('contact.info')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-comment-dots me-2"></i>Contact us</a>
                                <a href="{{route('admin.logout')}}" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
               
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center ">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                              
                                <div class="dropdown m-auto">
                                    <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        @php
                                        $ncount = Auth::user()->unreadNotifications()->count()
                                        @endphp
        
                                      notification  <span class="text-light bg-danger rounded-2"> {{ $ncount }}</span>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu ">

                                        @php
                                        $user = Auth::user();
                                        @endphp
                           
                                        @forelse($user->notifications as $notification)
                                      <li><a class="dropdown-item "  href="#">{{ $notification->data['message'] }}</a></li>
                                      <li><a class="dropdown-item "  href="#"> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</a></li>
                                      <br>

                                      @empty
        
                                      @endforelse  
                                    </ul>

                                  </div>
                                 
                              <li class="nav-item dropdown">
                                <button class="btn  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                 settings
                                </button>
                                
                                <ul class="dropdown-menu dropdown-menu-light">
                                  <li><a class="dropdown-item" href="{{route('admin.profile')}}">Admin profile</a></li>
                                  <li><a class="dropdown-item" href="{{route('admin.password')}}">Update password</a></li>

                                </ul>
                              </li>
                            </ul>
                          </div>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3  mycardef">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{count($products)}}</h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3  mycardef">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{$month}}$</h3>
                                <p class="fs-5">month sales</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3  mycardef">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{count($customer)}}</h3>
                                <p class="fs-5">Users</p>
                            </div>
                            <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3 mycardef">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{$orders_date}}</h3>
                                <p class="fs-5">Total contact</p>
                            </div>
                            <i class="fas fa-comment-dots fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
