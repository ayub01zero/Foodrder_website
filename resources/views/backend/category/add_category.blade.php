@extends('admin.admin_body.body')
@section('main')

                <section id="contact " class="mt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                   
                    <h1>Add Category</h1>
                    <p>Adding food to your website is a great way to showcase your culinary creations and attract customers. Use high-quality images and engaging descriptions, and provide information about ingredients and nutritional value. </p>
                </div>
            </div>

            <form action="{{route('store.category')}}" method="POST"  class="row g-3 justify-content-center">
                @csrf
                @error('category_name')
                <div class="alert alert-danger w-25">{{ $message }}</div>
            @enderror
                <div class="col-md-5" >
                    <input type="text" class="form-control shadow @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}" name="category_name"  placeholder="category Name">
                </div>
   
                
                <div class="col-md-10 d-grid">
                    <button type="submit" class="btn btn-dark" >Add Category</button>
                </div>
            </form>

        </div>
    </section>
    

    @endsection

