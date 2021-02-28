<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp ['empleados']= Empleado::paginate(2);
        return view('empleados.index',$emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
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
            'nombre' => ['required', 'string', 'max:100'],
            'apellidopaterno' => ['required', 'string', 'max:100'],
            'apellidomaterno' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'string', 'max:100'],
            'foto' => ['required','max:1000', 'mimes:jpeg,png,jpg'],
        ];
         $this->validate($request,$rules);
        $empleado =new Empleado();
        $empleado->nombre          = $request->nombre;
        $empleado->apellidopaterno = $request->apellidopaterno;
        $empleado->apellidomaterno = $request->apellidomaterno;
        $empleado->correo          = $request->correo;
        if($request->hasFile('foto')){
        $empleado->foto            = $request->file('foto')->store('uploads','public');
        }

        $empleado->save();
        return redirect()->route('empleados.index')->with('message','Registro con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $empleado=Empleado::findOrFail($id);
        return view ('empleados.edit',
        compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    $rules=[
        'nombre' => ['required', 'string', 'max:100'],
        'apellidopaterno' => ['required', 'string', 'max:100'],
        'apellidomaterno' => ['required', 'string', 'max:100'],
        'correo' => ['required', 'string', 'max:100'],

    ];
    if($request->hasFile('foto')){
        $rules+=['foto' => 'required','max:10000','mimes:jpg'];
     }
       $this->validate($request,$rules);
        $empleados=request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $empleado=Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->foto );
            $empleados['foto'] = $request->file('foto')->store('uploads','public');
            }

        Empleado::where('id','=',$id)->update($empleados);
        $empleado=Empleado::findOrFail($id);

        return redirect()->route('empleados.index')->with('status','Los datos del empleado se modificaron  con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $empleado=Empleado::findOrFail($id);
        if (Storage::delete('public/'.$empleado->foto )) {
              $empleado->delete();
        }


        return redirect()->route('empleados.index')->with('status','Empleado eleminado con exito');

    }
}
