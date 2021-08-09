@extends('layouts.app')
@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col">
                <br><h2 class="text-center"><a href="{{route("instructors.create")}}" style="right: 350px; position: relative;" class="btn btn-outline-success">+ Agregar</a><strong> Instructores Registrados</strong></h2><br>

                    <table class="table table-striped table-hover text-center ">
                        <thead>
                            <tr class="table-primary">
                                <th style="width: 170px">Documento</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th style="right: 115px; position: absolute;">Opciones</th>
                            </tr>
                        </thead>
                        @foreach ($instructors as $i)
                            <tr>
                                <th>{{$i->documento}}</th>
                                <td>{{$i->nombre}}</td>
                                <td>{{$i->telefono}}</td>
                                <td>{{$i->correo}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-6" style="left: 10px; position: relative;">
                                            <a href="{{route("instructors.edit",$i->id)}}" class="btn btn-outline-primary">Editar</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <form action="{{route('instructors.destroy',$i->id)}}" method="post">
                                                {!! method_field('DELETE') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit" style="right: 50px; position: relative;" class="btn btn-outline-danger">
                                                    <a>Eliminar</a>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$instructors->links()}}
            </div>
        </div>
    </div>


@endsection