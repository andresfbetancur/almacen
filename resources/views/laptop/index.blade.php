@extends('layouts.app')
@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col">
                <br><h2 class="text-center"><a href="{{route("laptops.create")}}" style="right: 370px; position: relative;" class="btn btn-outline-success">+ Agregar</a><strong> Laptops HP ProBook</strong></h2><br>

                    <table class="table table-striped table-hover text-center ">
                        <thead style="width: 30px">
                            <tr class="table-primary">
                                <th style="width: 200px">ID</th>
                                <th style="width: 250px">PLACA</th>
                                <th style="width: 300px">SERIAL</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        @foreach ($laptops as $l)
                            <tr>
                                <th>{{$l->id}}</th>
                                <td>{{$l->placa}}</td>
                                <td>{{$l->serial}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-6 " style="left: 60px; position: relative;">
                                            <a href="{{route("laptops.edit",$l->id)}}" class="btn btn-outline-primary">Editar</a>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{route('laptops.destroy',$l->id)}}" method="post">
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
                    {{$laptops->links()}}
            </div>
        </div>
    </div>


@endsection