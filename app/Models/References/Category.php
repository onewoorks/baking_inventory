<?php

namespace App\Models\References;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    public static function GetAllCategories(){
        $query = "SELECT * FROM ref_kategori";
        return DB::select(DB::raw($query));
    }

    public static function AddNewCategory($payloads){
        $parent_id = ($payloads['parent_id'] == 0) ? 'NULL' : $payloads['parent_id'];
        $nama_kategori = $payloads['category_name'];
        $query = "INSERT INTO ref_kategori (parent_id, nama_kategori) VALUE ($parent_id, '$nama_kategori')";
        return DB::select(DB::raw($query));
    }

    public static function GetCategoryById($id){
        $query = "SELECT * FROM ref_kategori WHERE id = $id";
        return DB::select(DB::raw($query))[0];
    }
}