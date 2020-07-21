<?php

namespace App\Http\Controllers;

use App\Disease;
use Illuminate\Support\Facades\File;
use App\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $r)
    {
        $plants= Plant::all();
        return view('plants.index',['plants'=> $plants]);
    }
    public function create()
    {
        return view('plants.create');
    }
    public function store(Request $r)
    {
        $inputs = $r->all();
        $plant= new Plant(['name'=> $inputs['name'],
            'description'=> $inputs['description'],
            'enfermedad'=> $inputs['enfermedad'],
            'plaga'=> $inputs['plague'],
            'photo'=> $inputs['imagen']
        ]);

        $plant->save();
        return redirect('/plants');
    }
    public function edit($id)
    {

        $plants = Plant::find($id);
        return view('plants.edit',['plant'=>$plants]);
    }
    public function update($id, Request $r)
    {
        $plants= Plant::find($id);
        $inputs = $r->all();
   $plants -> update(['name'=> $inputs['name'],
            'description => $inputs['description'],
           enfermedad => $inputs['enfermedades'],
           plaga => $inputs['plague'],
           photo => $inputs['imagen'],
        ]);
        
        

        return redirect('/plants');
    }
    public function destroy($id)
    {
        $plants = Plant::find($id);
        //File::delete($plants->photo);
            $plants->delete();
        return redirect('/plants');
    }
   public function search(Request $request)
    {
        $plants = Plant::all();
        $nombre = $request->get('buscador');
        $descripcion = $request->get('descrip');
        $plaga = $request->get('plag');
        $enfermedad = $request->get('enfermeda');;
        $plants= Plant::nombres($nombre)->descripciones($descripcion)->plagas($plaga)->enfermedades($enfermedad)->paginate(5);
        return view('plants.search',['plants'=> $plants]);
    }

}
