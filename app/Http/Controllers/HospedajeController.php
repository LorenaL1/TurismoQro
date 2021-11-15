<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Hospedaje;

class HospedajeController extends Controller
{
    public function getHospedaje($id, $slug){
    	$hospedaje = Hospedaje::findOrFail($id);
    	$data = ['hospedaje' => $hospedaje];
    	return view('hospedaje.hospedaje_single', $data);
    }
}
