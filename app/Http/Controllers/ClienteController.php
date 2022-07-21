<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*RUTA VISTA CLIENTES */
        $clientes = Cliente::all();
        return view('Cliente.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*RUTA VISTA CREAR CLIENTES*/
        return view('Cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*INSERTAR DATOS EN TABLA*/
        $clientes = new Cliente();
        $clientes->id = $request->get('id');
        $clientes->nit = $request->get('nit');
        $clientes->nombre = $request->get('nombre');
        $clientes->apellido = $request->get('apellido');
        $clientes->telefono = $request->get('telefono');
        $clientes->correo = $request->get('correo');
        $clientes->direccion = $request->get('direccion');

        $clientes->save();

        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*EDITAR INFORMACION GUARDADA*/
        $cliente = Cliente::find($id);
        return view('cliente.edit')->with('cliente',$cliente);
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
        /*GUARDAR LO EDITADO*/
        $cliente =  Cliente::find($id);

        $cliente->nit = $request->get('nit');
        $cliente->nombre = $request->get('nombre');
        $cliente->apellido = $request->get('apellido');
        $cliente->telefono = $request->get('telefono');
        $cliente->correo = $request->get('correo');
        $cliente->direccion = $request->get('direccion');

        $cliente->save();

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*ELIMINAR REGISTRO*/
        $cliente = Cliente::find($id);
        $cliente->delete();
        
        return redirect('/clientes');
        
    }
}
