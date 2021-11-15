<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category, App\Http\Models\Attractive, App\Http\Models\AGallery;
use Validator, Str, Config, Image;

class AttractiveController extends Controller
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
                $attractives = Attractive::with(['cat', 'getSubcategory'])->where('status', '0')->orderBy('id', 'desc')->paginate(10); 
                break;
            case '1':
                $attractives = Attractive::with(['cat', 'getSubcategory'])->where('status', '1')->orderBy('id', 'desc')->paginate(10);
                break;
            case 'all':
                $attractives = Attractive::with(['cat', 'getSubcategory'])->orderBy('id', 'desc')->paginate(10);
                break;
            case 'trash':
                $attractives = Attractive::with(['cat', 'getSubcategory'])->onlyTrashed()->orderBy('id', 'desc')->paginate(10);
                break;
        }
        
        $data = ['attractives' => $attractives];
    	return view('admin.attractives.home', $data);
    }

    public function getAttractiveAdd(){
        $cats = Category::where('module', '0')->where('module', '0')->where('parent', '0')->pluck('name', 'id');
        $data = ['cats' => $cats];
    	return view('admin.attractives.add', $data);
    }

    public function postAttractiveAdd(Request $request){
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
            

            $attractive = new Attractive;
            $attractive->status = '0';
            $attractive->name = e($request->input('name'));
            $attractive->slug = Str::slug($request->input('name'));
            $attractive->category_id = $request->input('category');
            $attractive->subcategory_id = $request->input('subcategory');
            $attractive->file_path = date('Y-m-d');
            $attractive->image = $filename;
            $attractive->content = e($request->input('content'));
            $attractive->mapa = e($request->input('mapa'));    

            if($attractive->save()):

                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'. $filename);
                endif;

                return redirect('/admin/attractive/'.$attractive->id.'/edit')->with('message', 'Guardado con éxito.')->with(
                'typealert', 'success');
            endif; 
        endif; 
    }

    public function getAttractiveEdit($id){
        $at = Attractive::findOrFail($id);
        $cats = Category::where('module', '0')->where('parent', '0')->pluck('name', 'id');
        $data = ['cats' => $cats, 'at' => $at];
        return view('admin.attractives.edit', $data);

    }

    //actualizar atractivo
     public function postAttractiveEdit($id, Request $request){
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
            
            $attractive = Attractive::findOrFail($id);
            $ipp = $attractive->file_path;
            $ip = $attractive->image;
            $attractive->status = $request->input('status');
            $attractive->name = e($request->input('name'));
            $attractive->category_id = $request->input('category');
            $attractive->subcategory_id = $request->input('subcategory');
            if($request->hasFile('img')):
                $path = '/'.date('Y-m-d'); //2021-03-01. se mantiene por fecha la subida
                $fileExt = trim($request->file('img')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;
                $attractive->file_path = date('Y-m-d');
                $attractive->image = $filename;
            endif;
            $attractive->content = e($request->input('content'));
            $attractive->mapa = e($request->input('mapa'));

            if($attractive->save()):
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
                return back()->with('message', 'Actualizado con éxito.')->with(
                'typealert', 'success');
            endif; 


        endif;

    }

    public function postAttractiveGalleryAdd($id, Request $request){
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
                
                $g = new AGallery;
                $g->attractive_id = $id;
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

     function getAttractiveGalleryDelete($id, $gid){
        $g = AGallery::findOrFail($gid);
        $path = $g->file_path;
        $file = $g->file_name;
        $upload_path = Config::get('filesystems.disks.uploads.root');
        if($g->attractive_id !=$id){
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

    public function postAttractiveSearch(Request $request){
         $rules = [
            'search' => 'required'
        ];

        $messages = [
            'search.required' => 'El campo consulta es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return redirect('/admin/attractives/1')->withErrors($validator)->with('message', 'Se ha producido un error')->with(
                'typealert', 'danger')->withInput();
        else:

            switch ($request->input('filter')):
                case '0':
                    $attractives = Attractive::with(['cat'])->where('name', 'LIKE', '%'.$request->input('search').'%')->where('status', $request->input('status'))->orderBy('id', 'desc')->get();
                    break;
                

            endswitch;

            $data = ['attractives' => $attractives];
        return view('admin.attractives.search', $data);


        endif;
    }

    public function getAttractiveDelete($id){
        $at = Attractive::findOrFail($id);
        if($at->delete()):
            return back()->with('message', 'Atractive enviado a la papelera de reciclaje.')->with('typealert', 'success');
        endif;

    }
    public function getAttractiveRestore($id){
        $at = Attractive::onlyTrashed()->where('id', $id)->first();
        if($at->restore()):
            return redirect('/admin/attractive/'.$at->id.'/edit')->with('message', 'Este atractivo se restauro con éxito.')->with('typealert', 'success');
        endif;

    }

}
