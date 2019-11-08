<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda; 

class AgendaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::paginate(15);
        return view('agenda.index',compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agenda = new Agenda;
        $agenda->nombres = $request['nombres'];
        $agenda->apellidos = $request['apellidos'];
        $agenda->telefono = $request['telefono'];
        $agenda->celular = $request['celular'];
        $agenda->sexo = $request['sexo'];
        $agenda->email = $request['email'];
        $agenda->posicion = $request['posicion'];
        $agenda->departamento = $request['departamento'];
        $agenda->salario = $request['salario'];
        $agenda->fechadenacimiento = $request['fechadenacimiento'];
        
        $agenda->save();
        //return "Guardado Satisfactoriamente";
        return redirect()->route('agenda.index')->with('datos','Registro guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.show',compact('agenda'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.edit',compact('agenda'));
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
        $agenda = Agenda::findOrFail($id);
        $agenda->nombres = $request['nombres'];
        $agenda->apellidos = $request['apellidos'];
        $agenda->telefono = $request['telefono'];
        $agenda->celular = $request['celular'];
        $agenda->sexo = $request['sexo'];
        $agenda->email = $request['email'];
        $agenda->posicion = $request['posicion'];
        $agenda->departamento = $request['departamento'];
        $agenda->salario = $request['salario'];
        $agenda->fechadenacimiento = $request['fechadenacimiento'];   
        $agenda->save();

        return redirect()->route('agenda.index')->with('datos','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        return redirect()->route('agenda.index')->with('datos','Registro eliminado correctamente');
    }

    public function confirm($id)
    {
        $agenda = Agenda::findOrFail($id);

        return view('agenda.confirm',compact('agenda'));
    }
}
