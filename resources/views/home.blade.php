@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Bandeja de Inicio') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Usted ya está logueado! ') }} <br>
                    {{ __('Seleccione un de los siguientes botones para ir a una vista.') }}

                </div>
            </div>
        </div>
    </div><br>

        <div class="row text-center">
            <div class="col" style="left: 190px" >
                <div class="card border-primary" style="width: 13rem;">
                    <img src="https://t3.ftcdn.net/jpg/01/26/29/70/240_F_126297099_IL1UpmBC2fZcw3K5b9OpuxNxGKnmT0Yb.jpg" class="card-img-top" >
                    <div class="card-body">
                        <h3 class="card-title">Portátiles</h3>
                        <a href="{{route("laptops.index")}}" class="btn btn-outline-primary">Laptops</a>
                    </div>
                </div>
            </div>
            <div class="col" style="left: 70px">
                <div class="card border-primary" style="width: 13rem;">
                    <img src="https://t4.ftcdn.net/jpg/01/52/30/19/240_F_152301915_QNqTmrddCRNwtEuVQQEiZZKe63V8EpKU.jpg" class="card-img-top" >
                    <div class="card-body">
                        <h3 class="card-title">Instructores</h3>
                        <a href="{{route("instructors.index")}}" class="btn btn-outline-primary">Instructors</a>
                    </div>
                </div>
            </div>
            <div class="col" style="left: -50px">
                <div class="card border-primary" style="width: 13rem;">
                    <img src="https://t3.ftcdn.net/jpg/03/01/68/36/240_F_301683632_rvr2dHkLRiHHD84F9PgFRBJ6t96gS309.jpg" class="card-img-top" >
                    <div class="card-body">
                        <h3 class="card-title">Préstamos</h3>
                        <a href="{{route("loans.index")}}" class="btn btn-outline-primary">Loans</a>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
