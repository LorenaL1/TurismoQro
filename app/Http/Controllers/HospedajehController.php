<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Hospedaje;

class HospedajehController extends Controller
{
    public function getHospedajeh(){
    	$hospedajesh = Hospedaje::where('status', 1)->OrderBy('id', 'Asc')->get();
        $data = ['hospedajesh' => $hospedajesh];
    	return view('hospedajeh', $data);
    }
}

//3 manzanas calleron del cielo una es par el narrador,la otra para el que escucha y la otra para quien lo vive.