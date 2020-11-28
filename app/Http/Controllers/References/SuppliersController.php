<?php 

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\References\Supplier;

class SuppliersController extends Controller {
    public function GetAllSuppliers(){
        $data = Supplier::GetAllSuppliers();
        $output = [];
        foreach($data as $key=>$d){
            $d->key = $key;
            $d->payloads = json_decode($d->payloads, true);
            $output[] = $d;
        }
        return response()->json($output);
    }

    public function AddNewSupplier(Request $request){
        $input = $request->all();
        Supplier::AddNewSupplier($input);
        return response()->json($input);
    }
}