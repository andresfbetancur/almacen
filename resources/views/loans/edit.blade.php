@extends('layouts.app')
@section('content')    

    <div class="container text-center ">
        <div class="row">
            <div class="col">
                <h2 class="text-center"><strong> Agregar Novedad Préstamo</strong></h2>
                <form action="{{route('loans.update', $loans->id)}}" method="POST" class="form-group">
                    {!!method_field('PUT')!!}
                    {!!csrf_field()!!}
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><strong>Instructor</strong></label>
                            @foreach ($instructors as $i)
                                @if ($loans->id_instructors == $i->id )
                                    <input type="text" readonly value="{{$i->nombre}}" class="form-control">
                                @endif
                            @endforeach
                        </div>
                        <div class="col">
                            <label class="form-label"><strong>Placa del Equipo</strong></label>
                            @foreach ($laptops as $l)
                                @if ($loans->id_laptops == $l->id )
                                    <input type="text" readonly value="{{$l->placa}}" class="form-control">
                                @endif
                            @endforeach
                        </div>
                    </div><br>
                    <div class="row mt-2 mb-5">
                        <div class="col-6">
                            <label class="form-label"><strong>Descripción de la Novedad</strong></label>
                            <textarea name="descripcion"  cols="64" rows="3">{{$loans->descripcion}}</textarea>
                        </div>
                        <div class="col-6 mt-4">
                            <label class="form-label"><strong>Estado del Préstamo</strong></label>
                            <div class="form-check">
                                <input class="form-check-input" <?php if($loans->is_active == 1) { echo "checked";} ?>  name="is_active" type="checkbox" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                     Activo
                                </label>
                            </div>
                        </div>
                        
                    </div>
                    <div class=" text-center col-12">
                        <a href="{{route("loans.index")}}" class="btn btn-dark">Atrás</a>
                        <button type="submit" class="btn btn-primary">Actualizar!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

