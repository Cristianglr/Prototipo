@extends('adminlte::page')

@section('title', 'JONASA SA')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
<a href="clientes/create" class="btn btn-success mb-5">CREAR</a>

<table id="clientes" class="table table-striped table-bordered shadow-lg mt-4 " style="width:100%">
    <thead class="bg-primary text-white ">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nit</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Direccion</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->Nit}}</td>
            <td>{{$cliente->Nombre}}</td>
            <td>{{$cliente->Apellido}}</td>
            <td>{{$cliente->Telefono}}</td>
            <td>{{$cliente->Correo}}</td>
            <td>{{$cliente->Direccion}}</td>
            <td>
                <form   action="{{'clientes.destroy', $cliente->id}}" method="post">
                    <a  href="/clientes/{{$cliente->id}}/edit" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#clientes').DataTable({
            "lengthMenu":[[5,10,50,-1],[5,10,50,"All"]]
        });
    });
    </script>
@stop