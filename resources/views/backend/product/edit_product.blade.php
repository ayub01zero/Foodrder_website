@extends('admin.admin_body.body')
@section('main')



                <section id="contact " class="mt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                   
                    <h1>Update Products</h1>
                    <p>Adding food to your website is a great way to showcase your culinary creations and attract customers. Use high-quality images and engaging descriptions, and provide information about ingredients and nutritional value. </p>
                </div>
            </div>

            <form action="{{route('update.product',$productData->id)}}" method="post"  enctype="multipart/form-data" class="row g-3 justify-content-center">
                @csrf

                <input type="hidden" name="old_img"  value="{{$productData->product_image}}">
                <div class="col-md-5" >
                    <input type="text"  class="form-control shadow" value="{{$productData->product_name}}" name="product_name"  placeholder="Product Name">
                    @error('product_name')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
                </div>
                <div class="col-md-5">
                    <input type="text"  class="form-control shadow" value="{{$productData->selling_price}}" name="selling_price"  placeholder="Product Price">
                    @error('selling_price')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
                </div>
                <div class="col-md-5">
                    <input type="text"  class="form-control shadow" placeholder="Product quantity" value="{{$productData->product_qty}}" name="product_qty">
                    @error('product_qty')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <input  class="form-control shadow"  type="text" value="{{$productData->product_code}}" name="product_code"  placeholder="product code" >
                    @error('product_code')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <input  class="form-control shadow"  type="text" value="{{$productData->discount_price}}" name="discount_price"  placeholder="product discount" >
                    @error('discount_price')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-5">
                    <input  class="form-control shadow" id="image" type="file" value="{{$productData->product_image}}" name="product_image"  placeholder="Image" >
                    @error('product_image')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-10">
                <textarea   style="background-color: white;" class="form-control shadow mb-2" name="short_descp"  placeholder="product description" >{{ $productData->short_descp }}</textarea>    
                @error('short_descp')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror         
               </div>
               <div class="col-md-5">
                <label for="inputCollection" class="form-label">Select Category</label>
                <select  name="category_id" class="form-select" aria-label="Default select example">
                    <option></option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $productData->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                     @endforeach
                  </select>
                </div>

                  <div class="col-md-5 mt-4">
                  <input class="form-check-input mt-4" name="special_deals" type="checkbox" value="1" id="flexCheckDefault" {{ $productData->special_deals == 1 ? 'checked' : '' }}>
                    <label class="form-check-label mt-3"  for="flexCheckDefault">
                        special deals products 
                    </label>


                    <input class="form-check-input mt-4" name="status" type="checkbox" value="1" id="flexCheckDefault" {{ $productData->status == 1 ? 'checked' : '' }}>
                    <label class="form-check-label mt-3"  for="flexCheckDefault">
                        publish product
                    </label>
                </div>
                  
                <div class="col-md-5 m">
                    <div class="col-sm-9 text-secondary ">
                        <img id="showImage" src="{{asset($productData->product_image)}}" style="width:100px; height: 100px;"  >
                   </div>

                </div>
                
            
                
                <div class="col-md-10 d-grid">
                    <button type="submit" class="btn btn-dark" >Add item</button>
                </div>
            </form>

        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
              $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
          });
        });
      </script>

@endsection