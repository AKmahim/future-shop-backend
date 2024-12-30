<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
// use Image;
use Illuminate\Support\Facades\File;
// use Intervention\Image\Facades\Image;


class AdminCategoryController extends Controller
{
    // protected route
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $categories = Category::paginate(8);
        return view('admin.category',compact('categories'));
    }

    public function Add(Request $request){
        // dd($request);
        $validated = $request->validate([
                'category_name' => 'required|max:255',
                'category_img' => 'required|mimes:jpg,jpeg,png,webp',

                
            ]
        );

        // ============== without resizing system =======
        $category_img = $request->file('category_img');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($category_img->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'frontend/img/categories/';
        $last_img = $up_location.$img_name;
        $category_img->move($up_location,$img_name);


        // ============== with resize system =========
        // $category_img = $request->file('category_img');
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($category_img->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $img_ext;
        // $up_location = 'frontend/img/categories/';
        // $last_img = $up_location . $img_name;
        
        // // Resize the image
        // $img = Image::make($category_img->getRealPath());
        // $img->resize(270, 270, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save(public_path($last_img));
        

        Category::insert([
            'user_id' => Auth::user()->id,
            'category_name' => $request->category_name,
            'category_img' => $last_img,
        ]);
       return Redirect()->back()->with('success','Category Inserted');
        // return Redirect()->route('admin.category')->with('success','Category Updated');
        // return redirect()->back();
    }

    //delete category funciton
    public function Delete($id){
        // dd($id);
        Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Deleted');


    }

    // public function AllCat(){
    //     // this is the system to get data from database using ORM system
    //     $categories = Category::paginate(8);

    //     //this is for delete data
    //     $trashCat = Category::onlyTrashed()->latest()->paginate(8);

    //     // this is the system to get data from database using query system
    //     // $categories = DB::table('categories')->join('users','categories.user_id','users.id')->select('categories*','users.name')->paginate(4);
    //     return view('admin.category.index' , compact('categories','trashCat'));
    // }

    // public function AddCat(Request $request){

    //     $validated = $request->validate([
    //         'category_name' => 'required|max:255',
            
    //     ],
    //     [
    //         'category_name.required' => 'Please Input Category Name',
    //         'category_name.max' => 'Category less than 255',
            
    //     ]
    // );


    // // $data = array();
    // // $data['category_name'] = $request->category_name;
    // // $data['user_id']= Auth::user()->id;
    // // DB::table('categories')->insert($data);

    // // Insert data using elequent ORM
    //  $category = Category::insert([
    //     'category_name' => $request->category_name,
    //     'user_id' => Auth::user()->id,
    //     'created_at' => Carbon::now(),
    // ]);
    
    // return Redirect()->back()->with('success','Category Inserted');

    // // $category = new Category;
    // // $category -> category_name = $request->category_name;
    // // $category ->user_id = Auth::user()->id ;
    // // $category->save();


    
    // // return response()->json($category);


    // }

    // // edit category
    // public function Edit($id){
    //     $categories = Category::find($id);
    //     return view('admin.category.edit',compact('categories'));
    // }

    // //update funciton
    // public function update(Request $request,$id){

    //     $validated = $request->validate([
    //         'category_name' => 'required|max:255',
            
    //     ],
    //     [
    //         'category_name.required' => 'Please Input Category Name',
    //         'category_name.max' => 'Category less than 255',
            
    //     ]);

    //     $update = Category::find($id)->update([
    //         'category_name' => $request->category_name,
    //         'user_id' => Auth::user()->id,
    //     ]);
    //     return Redirect()->route('all.category')->with('success','Category Updated');

        
    // }

    // //softdelete function
    // public function SoftDelete($id){
    //     $delete = Category::find($id)->delete();
    //     return Redirect()->back()->with('success','Category Deleted');

        
    // }
    // //Restore function this function will be use for restore data from trash box
    // public function Restore($id){
    //     $delete = Category::withTrashed()->find($id)->restore();
    //     return Redirect()->back()->with('success','Category Restored');

        
    // }

    // //pdelete function is used to delete data permanately from list
    // public function pdelete($id){
    //     Category::onlyTrashed()->find($id)->forceDelete();
    //     return Redirect()->back()->with('success','Category Delete Permanately');
        
    // }



}
