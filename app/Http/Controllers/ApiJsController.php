<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config, Auth;
use App\Http\Models\Attractive, App\Http\Models\Category;

class ApiJsController extends Controller
{
    function getAttractivesSection($section, Request $request){
    	$items_x_page = Config::get('circuito.products_per_page');
		$items_x_page_random = Config::get('circuito.products_per_page_random');
		switch ($section):
			case 'home':
				$attractives = Attractive::where('status', 1)->inRandomOrder()->paginate($items_x_page_random);
				break;

			case 'store':
				$attractives = Attractive::where('status', 1)->OrderBy('id', 'Desc')->paginate($items_x_page);
				break;

			case 'store_category':
				$attractives = $this->getProductsCategory($request->get('object_id'), $items_x_page);
				break;
			
			default:
				$attractives = Attractive::where('status', 1)->inRandomOrder()->paginate($items_x_page_random);
				break;
		endswitch;

		return $attractives;
    }

    function getHospedajesSection($section, Request $request){
    	switch ($section):
			
			case 'hospedajeh':
				$hospedajes = Hospedaje::where('status', 1)->OrderBy('id', 'Desc');
				break;

			
			
			
		endswitch;

		return $hospedajes;
    }
}
