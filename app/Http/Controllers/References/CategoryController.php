<?php 

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\References\Category;

class CategoryController extends Controller {
    public function GetAllCategories(){
        $data = Category::GetAllCategories();
        $output = [];
        foreach($data as $key=>$d){
            $d->key = $key;
            $output[] = $d;
        }
        return response()->json($output);
    }

    public function AddNewCategory(Request $request){
        $input = $request->all();
        Category::AddNewCategory($input);
        return response()->json($input);
    }

    public function GetCategoryById($id){
        $data = Category::GetCategoryById($id);
        return response()->json($data);
    }
}