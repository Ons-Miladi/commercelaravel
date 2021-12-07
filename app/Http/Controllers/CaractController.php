<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\caract;
class CaractController extends Controller
{
    public function AddcaractProduit(Request $resquest){
       $caracts=caract::create($resquest->all());
       return response($caracts,201);
    }
    public function deletecaract($idcaract){
        $caract=caract::find($idcaract);
        if(is_null($caract)){
            return response()->json(["message"=>"Error!!"]);
        }
        $caract->delete();
        return response(null,204);
    }
    public function getCaractById($idcarat){
        $caract=caract::find($idcarat);
        if(is_null($caract)){
            return response()->json(["message"=>"not found"]);
        }
        return response()->json($caract,200);
    }
public function updateCaract(Request $request,$idcaract){
    $caract=caract::find($idcaract);
    if(is_null($caract)){
        return response()->json(["message"=>"not found"]);
    }
    $caract->update($request->all());
    return response()->json($caract,201);
}
public function getCaract($idproduct){
    $caract=DB::table("caracts")->where('idproduct','=',$idproduct)->get();
    return response()->json($caract,200);
}

public function getCaracteristiquesByJointure($id){
    $resultat=DB::table('products')->where('products.id',$id)
    ->leftjoin('caracts','products.id','=','caracts.idproduct')
    ->select('caracts.taille as taille','products.id as idproduct','caracts.couleur as couleur','caracts.quantite as quantite','products.image as image',"products.name as name","products.price as price")
    ->get();
    return $resultat;
  }
  
}
