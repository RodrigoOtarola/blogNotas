<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nota;

class PageController extends Controller
{
    public function inicio()
    {
        //Para llamar al modelo Nota
        $notas= Nota::paginate(2);
        return view('welcome',compact('notas'));
    }

    public function detalle($id){
        $nota=Nota::findOrFail($id);//Si no encuentra id derivara página 404

        return view('notas.detalle',compact('nota'));
    }

    public function crear(Request $request){
        //return $request->all();

        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;
        $notaNueva->save();

        //Para retornar a la pestaña anterior, en caso que fuera otra ruta ocupar return view
        return back()->with('mensaje','Nota agregada');
    }

    public function editar($id){

        $nota=Nota::findOrFail($id);
        return view('notas.editar',compact('nota'));
    }

    public function update(Request $request, $id){

        $notaUpdate=Nota::findOrFail($id);

        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->descripcion = $request->descripcion;
        $notaUpdate->save();

        return redirect()->route('inicio')->with('mensaje','Nota actualizada');
    }

    public function eliminar($id){
        $notaEliminar=Nota::findOrFail($id);
        $notaEliminar->delete();

        return back()->with('Mensaje','Mensaje eliminar');
    }

    public function fotos(){

        return view('fotos');

    }
    public function blog(){
        return view('blog');
    }

    public function nosotros($nombre = null){
        $equipo=['Ignacio','Juanito','Pedrito'];

        return view('nosotros', compact('equipo','nombre'));//compact funciona como array asociativo
    }
}
