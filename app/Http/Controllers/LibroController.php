<?php

namespace App\Http\Controllers;
use App\Libro;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class LibroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lib ['libros']= Libro::paginate(5);

        return view('libros.index',$lib);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* if(!Auth::check()){
            return redirect()->route('libros.index');
        }*/
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'nombre' => ['required', 'string', 'max:255'],
            'autor' => ['required', 'string', 'max:255'],
            'genero' => ['required', 'string', 'max:255'],
            'editorial' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255']
        ];
         $this->validate($request,$rules);
        $libro =new Libro();
        $libro->nombre      =$request->nombre;
        $libro->autor       =$request->autor;
        $libro->genero      =$request->genero;
        $libro->editorial   =$request->editorial;
        $libro->descripcion =$request->descripcion;
        $libro->save();
        return redirect()->route('libros.index')->with('status','Nuevo libro creado  con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro= Libro::findOrFail($id);
        return view('libros.show',[
            'libro'=>$libro
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check()){
            return redirect()->route('libros.index');
        }
        $libro=Libro::findOrFail($id);
    return view ('libros.edit',
    ['libro'=>$libro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $libro=Libro::findOrFail($id);
        $libro->nombre      =$request->nombre;
        $libro->autor       =$request->autor;
        $libro->genero      =$request->genero;
        $libro->editorial   =$request->editorial;
        $libro->descripcion =$request->descripcion;
        $libro->save();
        return redirect()->route('libros.index')->with('status','Libro  Modificado  con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::check()){
            return redirect()->route('libros.index');
        }
        $libro=Libro::findOrFail($id);
        $libro->delete();
        return redirect()->route('libros.index')->with('status','Libro eleminado con exito');

    }
}
