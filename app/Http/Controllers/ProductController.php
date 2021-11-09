<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Product;
class ProductController extends Controller
{
   public function getProducts($idsouscateg){
    $products = DB::table('products')->where('souscatid','=', $idsouscateg)->get();
     
       return response()->json($products,200);
   }
   public function getProductById($id){
      $product=Product::find($id);
      if(is_null($product)){
          return response()->json(['message','erroorrr !!!!'],404);
      }
      return response()->json($product,200);
   }
   public function addProduct(Request $request){
$product=new Product();
if($request->hasFile('image')){
  $compileFileName=$request->file('image')->getClientOriginalName();
  $filenameOnly=pathinfo($compileFileName,PATHINFO_FILENAME);
  $extension=$request->file('image')->getClientOriginalExtension();
  $compilpic=str_replace(' ','_',$filenameOnly).'-'.rand().'_'.time().'.'.$extension;
$path=$request->file('image')->storeAs('public/post',$compilpic);
$url="http://127.0.0.1:8000/storage/post/";
  $product->image=$url.$compilpic;
  $product->name=$request->name;
  $product->price=$request->price;
  $product->souscatid=$request->souscatid;

}
if($product->save()){
    return response()->json($product,200);
}else{
    return response()->json(['message','erroorrr !!!!'],404);
}

   }
   public function updateProduct(Request $request,$id){
    $product=Product::find($id);
    if(is_null($product)){
        return response()->json(["message","Error !!!"]);
     }
     $product->update($request->all());
     return response()->json($product,200);
   }
  
/*  public function updateProduct(Request $request,$id){
    $product=Product::find($id);

   if($request->hasFile('image')){
   $compileFileName=$request->file('image')->getClientOriginalName();
   $filenameOnly=pathinfo($compileFileName,PATHINFO_FILENAME);
   $extension=$request->file('image')->getClientOriginalExtension();
   $compilpic=str_replace(' ','_',$filenameOnly).'-'.rand().'_'.time().'.'.$extension;
   $path=$request->file('image')->storeAs('public/post',$compilpic);
   $product->image->update($compilpic);
   $product->name->update($name);
   $product->price->update($price);
 
  
 
 }
 if($product->save()){
   return response()->json($product,200);
}else{
   return response()->json(['message','erroorrr !!!!'],404);
}


} */
public function deleteProduct(Request $request,$id){
    $product=Product::find($id);
    if(is_null($product)){
       return response()->json(["message","Error !!!"]);
    }
    $product->delete();
    return response()->json(null,204);
}

}
