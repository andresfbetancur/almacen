@extends('layouts.app')
@section('content')    

    <div class="container text-center ">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Agregar Laptop</h2>
                <form action="{{route('laptops.store')}}" method="POST">
                    {!!csrf_field()!!}
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><strong>Placa del Equipo</strong></label>
                            <input type="text" name="placa" class="form-control" placeholder="Digita el número de Placa">
                        </div>
                        <div class="col">
                            <label class="form-label"><strong>Serial del Equipo</strong></label>
                            <input type="text" name="serial" class="form-control" placeholder="Digita con Mayúsculas el Serial">
                        </div>
                    </div><br>
                    <div class=" text-center col-12">
                        <a href="{{route("laptops.index")}}" class="btn btn-dark">Atrás</a>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection