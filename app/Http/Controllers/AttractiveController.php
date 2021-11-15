<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\Attractive;

class AttractiveController extends Controller
{
    public function getAttractive($id, $slug){
    	$attractive = Attractive::findOrFail($id);
    	//$product = Product::where('id', $id)->where('slug', $slug)->first();
    	$data = ['attractive' => $attractive];
    	return view('attractive.attractive_single', $data);
    }
}
