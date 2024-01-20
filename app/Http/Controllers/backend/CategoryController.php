<?php

namespace App\Http\Controllers\backend;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Category::latest()->get();
        return view('backend.category.all_category',compact('categories'));
     
       
    }//end method

    public function AddCategory(){
        return view('backend.category.add_category');
    }// End Method 


 public function StoreCategory(Request $request){

    $request->validate([
        'category_name' => 'required|max:15',
       
    ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
             
        ]);

        NotificationHelper::show('Category Inserted Successfully' , 'success');
        return redirect()->route('all.category'); 

    }// End Method 

    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('backend.category.edit_category',compact('category'));
    }// End Method 


  public function StoreUpdateCategory(Request $request , $cat_id){

        $request->validate([
            'category_name' => 'required|max:25',
           
        ]);
        Category::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
           
        ]);

        NotificationHelper::show('Category updated successfully','success');
        return redirect()->route('all.category'); 

    }// End Method 


    public function deleteCategory($id)
{
    try {
        $category = Category::findOrFail($id);
        $category->delete();

        NotificationHelper::show('Category Deleted successfully','success');
    } catch (\Exception $e) {
        
        NotificationHelper::show('Category Deletion Failed', 'error');
    }

    return redirect()->back();
}

    
}
    // End Method 



