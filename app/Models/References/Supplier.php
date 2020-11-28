<?php

namespace App\Models\References;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {
    public static function GetAllSuppliers(){
        $query = "SELECT * FROM ref_pembekal";
        return DB::select(DB::raw($query));
    }

    public static function AddNewSupplier($payloads){
        $supplier_name = $payloads['supplier_name'];
        $supplier_payloads = json_encode($payloads);
        $query = "INSERT INTO ref_pembekal (nama_pembekal, payloads) VALUE ('$supplier_name', '$supplier_payloads')";
        return DB::select(DB::raw($query));
    }
}