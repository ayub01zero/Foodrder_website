<?php

namespace App\Http\Controllers\backend;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Carbon\Carbon;
use App\Models\Products;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function AddProduct(){

        $categories = Category::all();
        return view('backend.product.add_product', compact('categories'));
       
    }// End Method 

    public function StoreProducts(ProductRequest $request){

        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/'.$name_gen);
        $save_url = 'upload/products/'.$name_gen;

        Products::insert([
    'category_id' => $request->input('category_id'),
    'product_name' => $request->input('product_name'),
    'product_slug' => strtolower(str_replace(' ', '-', $request->input('product_name'))),
    'product_code' => $request->input('product_code'),
    'product_qty' => $request->input('product_qty'),
    'selling_price' => $request->input('selling_price'),
    'discount_price' => $request->input('discount_price'),
    'short_descp' => $request->input('short_descp'),
    'special_deals' => $request->input('special_deals'),
    'product_image' => $save_url,
    'status' => 1,
    'created_at' => Carbon::now(),
]);

    
   NotificationHelper::show('Product insert successfully','success');

        return redirect()->route('all.products'); 

    } // End Method 
    public function AllProduct()
    {
        $products = Products::with('category')->latest()->get();
         return view('backend.product.all_product',compact('products'));
    }

    public function EditProduct($id){
        $categories  = Category::all();
        $productData = products::findOrFail($id);
        return view('backend.product.edit_product',compact('productData','categories'));
    }// End Method 

    public function StoreUpdateProduct(ProductRequest $request , $id)
    {

        $img = $request->old_img;

    $image = $request->file('product_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(800,800)->save('upload/products/'.$name_gen);
    $save_url = 'upload/products/'.$name_gen;

     if (file_exists($img)) {
       unlink($img);
    }
    
            Products::findOrFail($id)->update([
                'category_id' => $request->input('category_id'),
                'product_name' => $request->input('product_name'),
                'product_slug' => strtolower(str_replace(' ', '-', $request->input('product_name'))),
                'product_code' => $request->input('product_code'),
                'product_qty' => $request->input('product_qty'),
                'selling_price' => $request->input('selling_price'),
                'discount_price' => $request->input('discount_price'),
                'short_descp' => $request->input('short_descp'),
                'special_deals' => $request->input('special_deals'),
                'product_image' => $save_url,
                'status' => $request->input('status'),
                'created_at' => Carbon::now(),
    
       ]);
    
    
       NotificationHelper::show('Product updated successfully','success');
       return redirect()->route('all.products'); 
    
    }// End Method 

   public function ProductDelete($id){

    $product = Products::findOrFail($id);
    unlink($product->product_image);
    $product->delete();

    NotificationHelper::show('Product delete successfully','success');
    return redirect()->back();

}// End Method 

//    public function ProductInactive($id){

//     Product::findOrFail($id)->update([
//         'status' => 0
//     ]);
//     $notification = array(
//         'message' => 'Product Inactive',
//         'alert-type' => 'success'
//     );

//     return redirect()->back()->with($notification);
//    }

}



