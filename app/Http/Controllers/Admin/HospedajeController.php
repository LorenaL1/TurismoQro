<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Hospedaje, App\Http\Models\HGallery;
use Validator, Str, Config, Image;

class HospedajeController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
    	$this->middleware('isadmin');
    }

    public function getHome($status){
    	switch ($status) {
            case '0':
                $hospedajes = Hospedaje::where('status', '0')->orderBy('id', 'desc')->paginate(10); 
                break;
            case '1':
                $hospedajes = Hospedaje::where('status', '1')->orderBy('id', 'desc')->paginate(10);
                break;
            case 'all':
                $hospedajes = Hospedaje::orderBy('id', 'desc')->paginate(10);
                break;
            case 'trash':
                $hospedajes = Hospedaje::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
                break;
        }
    	//$hospedajes = Hospedaje::orderBy('id', 'desc')->paginate(10);
    	$data = ['hospedajes' => $hospedajes];
    	return view('admin.hospedajes.home', $data);
    }

    public function getHospedajeAdd(){
    	return view('admin.hospedajes.add');
    }

    public function postHospedajeAdd(Request $request){
    	$rules = [
            'name' => 'required',
            'img' => 'required',
            'content' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre del atractivo es requerido.',
            'img.required' => 'Seleccione una imagen',
            'img.image' => 'El archivo no es una imagen',
            'content.required' => 'Ingrese una descripción del atractivo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with(
                'typealert', 'danger')->withInput();
        else:

        	$path = '/'.date('Y-m-d'); //2021-03-01. se mantiene por fecha la subida
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));

            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file = $upload_path.'/'.$path.'/'.$filename;


            $hospedaje = new Hospedaje;
            $hospedaje->status = '0';
            $hospedaje->name = e($request->input('name'));
            $hospedaje->slug = Str::slug($request->input('name'));
            $hospedaje->type = '0';
            $hospedaje->name_place = e($request->input('name_place'));
            $hospedaje->mapa = e($request->input('mapa'));
            $hospedaje->phone = $request->input('phone');
            $hospedaje->file_path = date('Y-m-d');
            $hospedaje->image = $filename;
            $hospedaje->content = e($request->input('content'));
            $hospedaje->ubicacion = e($request->input('ubicacion'));   

            if($hospedaje->save()):

            	if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){
                    	$constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'. $filename);
                endif;

                return redirect('/admin/hospedajes/1')->with('message', 'Guardado con éxito.')->with(
                'typealert', 'success');
            endif; 
        endif; 
    }

     public function getHospedajeEdit($id){
        $h = Hospedaje::findOrFail($id);
        $data = ['h' => $h];
        return view('admin.hospedajes.edit', $data);

    }

    public function postHospedajeEdit($id, Request $request){
    	$rules = [
            'name' => 'required',
            'content' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre del atractivo es requerido.',
            'img.image' => 'El archivo no es una imagen',
            'content.required' => 'Ingrese una descripción al atractivo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with(
                'typealert', 'danger')->withInput();
        else:
            
            $hospedaje = Hospedaje::findOrFail($id);
            $ipp = $hospedaje->file_path;
            $ip = $hospedaje->image;
            $hospedaje->status = $request->input('status');
            $hospedaje->name = e($request->input('name'));
            $hospedaje->type = $request->input('type');
            $hospedaje->name_place = e($request->input('name_place'));
            $hospedaje->mapa = e($request->input('mapa'));
            $hospedaje->phone = $request->input('phone');
            if($request->hasFile('img')):
                $path = '/'.date('Y-m-d'); //2021-03-01. se mantiene por fecha la subida
                $fileExt = trim($request->file('img')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;
                $hospedaje->file_path = date('Y-m-d');
                $hospedaje->image = $filename;
            endif;
            $hospedaje->content = e($request->input('content'));
            $hospedaje->ubicacion = e($request->input('ubicacion'));

            if($hospedaje->save()):
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                    unlink($upload_path.'/'.$ipp.'/'.$ip);
                    unlink($upload_path.'/'.$ipp.'/t_'.$ip);
                endif;
                return back()->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
            endif; 


        endif;

    }

    public function postHospedajeGalleryAdd($id, Request $request){
        $rules = [
            'file_image' => 'required',
            
        ];

        $messages = [
            'file_image.required' => 'Seleccione una imagen',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with(
                'typealert', 'danger')->withInput();
        else:
            if($request->hasFile('file_image')):
                $path = '/'.date('Y-m-d'); 
                $fileExt = trim($request->file('file_image')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file_image')->getClientOriginalName()));

                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename; 
                
                $g = new HGallery;
                $g->hospedaje_id = $id;
                $g->file_path = date('Y-m-d');
                $g->file_name = $filename;

                if($g->save()):
                if($request->hasFile('file_image')):
                    $fl = $request->file_image->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(512, 512, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'. $filename);
                endif;
                return back()->with('message', 'Imagen subida con éxito.')->with(
                'typealert', 'success');
            endif; 
            endif;
            

        endif;

    }

    function getHospedajeGalleryDelete($id, $gid){
        $g = HGallery::findOrFail($gid);
        $path = $g->file_path;
        $file = $g->file_name;
        $upload_path = Config::get('filesystems.disks.uploads.root');
        if($g->hospedaje_id !=$id){
            return back()->with('message', 'La imagen nose puede eliminar.')->with(
                'typealert', 'danger');

        }else{
            if($g->delete()):
                unlink($upload_path.'/'.$path.'/'.$file);//opcional elimina el archivo 
                unlink($upload_path.'/'.$path.'/t_'.$file);
                return back()->with('message', 'Imagen borrada con éxito.')->with(
                'typealert', 'success');
            endif;

        }
    }

    public function postHospedajeSearch(Request $request){
         $rules = [
            'search' => 'required'
        ];

        $messages = [
            'search.required' => 'El campo consulta es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return redirect('/admin/hospedajes/1')->withErrors($validator)->with('message', 'Se ha producido un error')->with(
                'typealert', 'danger')->withInput();
        else:

            switch ($request->input('filter')):
                case '0':
                    $hospedajes = Hospedaje::where('name', 'LIKE', '%'.$request->input('search').'%')->where('status', $request->input('status'))->orderBy('id', 'desc')->get();
                    break;
                

            endswitch;

            $data = ['hospedajes' => $hospedajes];
        return view('admin.hospedajes.search', $data);


        endif;
    }

    public function getHospedajeDelete($id){
        $h = Hospedaje::findOrFail($id);
        if($h->delete()):
            return back()->with('message', 'Atractive enviado a la papelera de reciclaje.')->with('typealert', 'success');
        endif;

    }
    public function getHospedajeRestore($id){
        $h = Hospedaje::onlyTrashed()->where('id', $id)->first();
        if($h->restore()):
            return redirect('/admin/hospedaje/'.$h->id.'/edit')->with('message', 'Este atractivo se restauro con éxito.')->with('typealert', 'success');
        endif;

    }
}
