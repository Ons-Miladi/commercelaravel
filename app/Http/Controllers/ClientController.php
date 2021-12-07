<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use DB;
class ClientController extends Controller
{
  public function Clientinscription(Request $request){
    $client=new Client();
    $cl=$client::create($request->all());
    return response($cl,201);
  }
    public function UserConnexion(Request $request){
       
        $user=new Client();
      
        $userEmail=$user::where('email',$request->email)->get()->first();
      
        $userPass=$user::where('password',$request->password)->get()->first();
        if($request->email=='onsmiladi7@gmail.com' and $request->password=='onsmiladi'){
          return response() ->json(["user"=>'Administrateur']);
        }
        else if($userEmail and $userPass){
          return response() ->json(["user"=>'Client']);
        }
        else{
          return response()->json(['error'=>'Opps ! Error'],409); 
        }
}


public function joincategsouscateg(){
  $resultat=DB::table('categories')
  ->leftjoin('sous_categories','categories.id','=','sous_categories.idcat')
  ->select('categories.name_categ as name_categ','categories.id as id','sous_categories.idcat as idcat','sous_categories.nom as nom',"sous_categories.id as idsousctateg")
  ->get();
  return $resultat;
}

}
