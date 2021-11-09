<?php

namespace App\Http\Controllers;
use App\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function AddCategorie (Request $request){
        $categorie=categorie::create($request->all());
    return response($categorie,201);
    }
    public function getCategories(){
      return response(categorie::all());
    }
    public function getCategorieById($id){
        $categorie=categorie::find($id);
        if(is_null($categorie)){
            return response()->json(["message" => "Erroorrrrr!!!!"],404);
        }
        return response()->json($categorie,200);
    }
    public function updateCategorie(Request $request,$id){
      $categorie=categorie::find($id);
      if(is_null($categorie)){
          return response()->json(["message"=>"Error!!"],404);
      }
      $categorie->update($request->all());
      return response()->json($categorie,200);
    }
    public function deleteCategorie($id){
        $categorie=categorie::find($id);
        if(is_null($categorie)){
            return response()->json(["message"=>"Eroor!!"],404);
        }
        $categorie->delete();
        return response()->json(null,204);
    }
}
