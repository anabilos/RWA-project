<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Gender;
use App\Size;
class ProductController extends Controller
{
  public function index()
   {
       $products=Product::all();
       return view('admin.product.index',compact('products'));
   }
   public function edit(Request $request, $id){
       $products=Product::findOrFail($id);

       return view('admin.product.edit')->with('products',$products);


   }
  public function show($id){
    $product=Product::where('id', $id)->firstOrFail();
    return view('product')->with('product',$product);

  }

  public function create(){

    $categories = Category::select('name', 'id')->get();
    $sizes = Size::select('name', 'id')->get();
      $genders=Gender::pluck('name','id');
       return view('admin.product.create',compact(['categories','sizes','genders']));

  }
  public function createten(){

    $categories = Category::select('name', 'id')->get();
    $sizes = Size::select('name', 'id')->get();
      $genders=Gender::pluck('name','id');
       return view('admin.product.create-tenisice',compact(['categories','sizes','genders']));

  }
  public function update(Request $request, $id){

      $products=Product::find($id);
      $products->name=$request->input('name');
      $products->price=$request->input('price');
      $products->description=$request->input('description');
      $products->update();
      return redirect('/product/index')->with('success_message','Vaš proizvod je uspješno ažurirana!');

  }

  public function store(Request $request)
    {

      request()->validate([

               'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

           ]);



           $imageName = time().'.'.request()->image->getClientOriginalExtension();
            if($request->gender_id==1&&$request->category_id==1){
           request()->image->move(public_path('images/majice/zene'), $imageName);
           }
           else if($request->gender_id==1&&$request->category_id==2){
             request()->image->move(public_path('images/tajice/zene'), $imageName);
           }
           else if($request->gender_id==1&&$request->category_id==3){
             request()->image->move(public_path('images/dukserice/zene'), $imageName);
           }
           else if($request->gender_id==2&&$request->category_id==4){
             request()->image->move(public_path('images/sorcevi/muskarci'), $imageName);
           }
           else if($request->gender_id==1&&$request->category_id==5){
             request()->image->move(public_path('images/tenisice/zene'), $imageName);
           }
           else if($request->gender_id==2&&$request->category_id==1){
             request()->image->move(public_path('images/majice/muskarci'), $imageName);
           }
           else if($request->gender_id==2&&$request->category_id==3){
             request()->image->move(public_path('images/dukserice/muskarci'), $imageName);
           }
           else if($request->gender_id==2&&$request->category_id==5){
             request()->image->move(public_path('images/tenisice/muskarci'), $imageName);
           }





             $product = Product::create([

                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'gender_id' => $request->gender_id,
                'img'=>  $imageName ,


             ]);


        $product= Product::latest()->first();
        $sizes=$request->si;
        foreach ($sizes as $size) {
          $product->sizes()->attach($size);
        }


if($request->category_id!=5){

 return redirect()->route('product.create')->with('success_message', 'Proizvod je uspješno dodan');
 }
 else {
    return redirect()->route('product.createten')->with('success_message', 'Proizvod je uspješno dodan');
 }
    }


    public function delete(Request $request, $id){
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect('/product/index')->with('success_message','Proizvod je uspješno izbrisan!');
}



}
