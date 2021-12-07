<?php

namespace App\Http\Controllers;
use App\Sous_categorie;
use Illuminate\Http\Request;
use DB;
class SousCategorieController extends Controller
{
   public function getSousCategories($idcat){
     $souscats = DB::table('sous_categories')->where('idcat','=', $idcat)->get();
     
       
      return response()->json($souscats,200);
   }
   public function AddSouscategorie(Request $request){
       $souscat=Sous_categorie::create($request->all());
       return response($souscat,201);
   }

   public function deletSouscat($idcat){
       $souscat=Sous_categorie::find($idcat);
       if(is_null($souscat)){
           return response()->json(["message"=>"Error!!"],404);
       }
       $souscat->delete();
       return response(null,204);
   }
   public function getSouscategorieById($id){
       $souscat=Sous_categorie::find($id);
       if(is_null($souscat)){
           return response()->json(["message"=>"Error!!!"]);
       }
       return response()->json($souscat,200);
   }
   public function updateSousCategorie(Request $request,$id){
     $souscat=Sous_categorie::find($id);
     if(is_null($souscat)){
         return response()->json(["message"=>"Error!!"],404);
     }
     $souscat->update($request->all());
     return response()->json($souscat,200);
   }
}
