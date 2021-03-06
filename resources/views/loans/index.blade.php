@extends('layouts.app')
@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col">
                <br><h2 class="text-center"><a href="{{route("loans.create")}}" style="right: 360px; position: relative;" class="btn btn-outline-success">+ Agregar</a><strong> Préstamos de Equipos</strong></h2><br>

                    <div class="row">
                        @foreach ($loans as $l)
                        <div class="col-4">
                            <div class="card mb-3">
                                <?php 
                                    if ($l->descripcion != null) {
                                        echo "<h5 class='card-header' style='background: rgb(147, 192, 245)'><strong>{$l->date_loan}</strong></h5>";
                                    }else{
                                        echo "<h5 class='card-header' style='background: rgb(196, 196, 196)'><strong>{$l->date_loan}</strong></h5>";
                                    }
                                ?>
                                <div class="card-body">
                                        <h5 class="card-title">{{$l->nombre}}</h5>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="{{route('loans.show', $l->id)}}" class="btn btn-outline-primary">Detalle</a>
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