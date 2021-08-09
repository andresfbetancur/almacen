@extends('layouts.app')
@section('content')    

    <div class="container text-center ">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Agregar Nuevo Instructor</h2>
                <form action="{{route('instructors.store')}}" method="POST">
                    {!!csrf_field()!!}
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><strong>Documento</strong></label>
                            <input type="text" name="documento" class="form-control" placeholder="Digita el número de documento">
                        </div>
                        <div class="col">
                            <label class="form-label"><strong>Nombres y Apellidos</strong></label>
                            <input type="text" name="nombre" class="form-control" placeholder="Escribe nombres y apellidos">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><strong>Número Telefónico</strong></label>
                            <input type="text" name="telefono" class="form-control" placeholder="Digita el número de Telefono">
                        </div>
                        <div class="col">
                            <label class="form-label"><strong>Corrreo Institucional</strong></label>
                            <input type="text" name="correo" class="form-control" placeholder="Escribe el correo institucional">
                        </div>
                    </div><br>
                    <div class="text-center col-12">
                        <a href="{{route("instructors.index")}}" class="btn btn-dark">Atrás</a>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection