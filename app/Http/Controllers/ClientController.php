<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use DB;
use App\Panier;
use App\Panier_product;
class ClientController extends Controller
{
  public function Clientinscription(Request $request){
    $client=new Client();
    $panier=new Panier();

    $cl=$client::create($request->all());
    $idclient=$cl->id;
    $panier->idclient=$idclient;
    $panier->save();
    return response($cl,201);
  }
    public function UserConnexion(Request $request){
       
        $user=new Client();
       
        $userEmail=$user::where('email',$request->email)->get()->first();
      
        $userPass=$user::where('password',$request->password)->get()->first();
        if($request->email=='' || $request->password==''){
          return response(12,201);
        }
     else if($request->email=='onsmiladi7@gmail.com' and $request->password=='onsmiladi'){
          return response(11,201);
        }
        else if($userEmail and $userPass){
       //   $panier = DB::table('paniers')->where('idclient','=', $userEmail->id)->get();
        
                
          return response() ->json($userEmail,200);
        }
        else{
        
         
          return response(111,404); 
        }
       
        
}


public function joincategsouscateg(){
  $resultat=DB::table('categories')
  ->leftjoin('sous_categories','categories.id','=','sous_categories.idcat')
  ->select('categories.name_categ as name_categ','categories.id as id','sous_categories.idcat as idcat','sous_categories.nom as nom',"sous_categories.id as idsousctateg")
  ->get();
  return $resultat;
}
public function AddProductToPanier(Request $request){
    
  $product_panier=Panier_product::create($request->all());
  return response($product_panier,201);

}
}
