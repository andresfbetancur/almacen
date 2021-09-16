@extends('layouts.app')
@section('content')    

    <div class="container text-center ">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Agregar Préstamo</h2>
                <form action="{{route('loans.store')}}" method="POST" class="form-group">
                    {!!csrf_field()!!}
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><strong>Instructor</strong></label>
                            <select name="id_instructors" class="form-control form-select">
                                <option value="..." disabled selected>Seleccione un Instructor</option>
                                @foreach ($instructors as $i)
                                    <option value="{{$i->id}}">{{$i->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label"><strong>Placa del Equipo</strong></label>
                            <select name="id_laptops[]" multiple='multiple' id="id_laptops" class="form-control form-select id_laptops">
                                <option value="..." disabled selected>Seleccione la placa sena</option>
                                @foreach ($laptops as $l)
                                    <option value="{{$l->id}}">{{$l->placa}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br>
                    <div class=" text-center col-12">
                        <a href="{{route("loans.index")}}" class="btn btn-dark">Atrás</a>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($){
            $(document).ready(function() {
                $('.id_laptops').select2();
            });
        });
    </script>


@endsection


