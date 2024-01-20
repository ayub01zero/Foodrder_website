@extends('admin.admin_body.body')
@section('main')



                <section id="contact " class="mt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                   
                    <h1>update coupon</h1>
                    <p>Adding food to your website is a great way to
                         showcase your culinary creations and attract customers.
                          Use high-quality images and engaging descriptions, 
                          and provide information about ingredients and nutritional value. </p>
                </div>
            </div>


            <form action="{{ route('update.coupon',$coupon->id) }}" method="post"   class="row g-3 justify-content-center">
                @csrf
                <div class="col-md-5" >
                    <input type="text"  class="form-control shadow" value="{{$coupon->coupon_name}}" name="coupon_name"  placeholder="coupon Name">
                    @error('coupon_name')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
                </div>
                <div class="col-md-5">
                    <input type="text"  class="form-control shadow" value="{{$coupon->coupon_discount}}"  name="coupon_discount"  placeholder="coupon discount">
                    @error('coupon_discount')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
                </div>
                <div class="col-md-5">
                    <input type="date"  class="form-control shadow" 
                    min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"  value="{{ $coupon->coupon_validity }}"
                   
                    name="coupon_validity">

                    @error('coupon_validity')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

             
                
                <div class="col-md-10 d-grid">
                    <button type="submit" class="btn btn-dark" >Add coupon</button>
                </div>
            </form>
       

        </div>
    </section>

   

@endsection