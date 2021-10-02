@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2 class="text-center"><a href="{{ route('loans.create') }}" style="right: 320px; position: relative;"
                        class="btn btn-outline-success">+ Agregar</a><strong> Préstamos de Equipos</strong> 
                        <a href="{{route('loans.index')}}" class="btn btn-outline-primary" style="left: 320px; position: relative;">Atrás</a>
                    </h2><br>
                @foreach ($name_instructor as $ni)
                    <h4 class="text-center">{{ $ni->nombre }}</h4>
                @endforeach

                <div class="row">
                    @foreach ($loans as $l)
                        <div class="col-3">
                            <div class="card mb-3">

                                @if ($l->placa == $l->id )
                                        <h5 class="card-header"><strong>{{$l->placa}}</strong></h5>
                                    @if ($l->descripcion != null) 
                                        <h5 class="card-header" style="background: rgb(147, 192, 245)"><strong>{{$l->placa}}</strong></h5>
                                    @endif
                                @else
                                    <h5 class="card-header" style="background: rgb(196, 196, 196)"><strong>{{$l->placa}}</strong></h5>
                                @endif

                                <div class="card-body">
                                    @if ($l->is_active == 1)
                                        <p class="card-text" style="color: rgb(5, 168, 14)"><strong>Activo</strong></p>
                                    @else
                                        <p class="card-text" style="color: red"><strong>Inactivo</strong></p>
                                    @endif

                                    <div class="row">
                                        <div class="col-4">
                                            <a href="{{ route('loans.edit', $l->id) }}"
                                                class="btn btn-outline-primary">Editar</a>
                                        </div>
                                        <div class="col-4 ml-2">
                                            <form action="{{ route('loans.destroy', $l->id) }}" method="post">
                                                {!! method_field('DELETE') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <a>Eliminar</a>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


@endsection
