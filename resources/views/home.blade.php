<?php

use Illuminate\Support\Facades\Auth;

$campain = isset($campain) ? $campain : null;
$userId = Auth::user()->id;
$nombreCampana = $campain ? $campain->nombre_campana : '';
$puertocampana = $campain ? $campain->puerto_campana : '';
$nombreCampana = htmlspecialchars($nombreCampana);
$url = "http://127.0.0.1:$puertocampana?idUsuario={$userId}";
?>

@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="container">
            @if (Auth::user()->rol === 1)
            <div class="tittle">
                <h2>Usuarios Activos</h2>
            </div>
            <div class="background_section">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>IdUsuario</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_session as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td style="color: #28a745;">Conectado</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$user_session->links('pagination::bootstrap-5')}}
            </div>
            @endif
            <br>
            <div class="tittle">
                <h2>Campañas</h2>
            </div>
            <div class="row">
                @foreach ($campains as $campain)
                <div class="col-sm-12 col-md-12 col-xl-4 background_section">
                    <div class="card">
                        <img src="{{ asset('images/' . $campain->foto_campana) }}" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">{{$campain->nombre_campana}}</p>
                            <a href="http://127.0.0.1:{{ $campain->puerto_campana }}?idUsuario={{$userId}}" target="_blank" class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-body">
                <div class="author">
                    <div class="row">
                        <div class="col-sm-4 ">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 ">
                            <img class="avatar border-gray" style="width: 150px; height: 150px; padding: 15px; align-items: center; display: flex;" src="{{asset('images/user.png')}}" alt="...">
                        </div>
                        <div class="col-sm-4 ">
                        </div>
                        <hr>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h5 class="title" style="text-align: center;">{{Auth::user()->email}}</h5>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <p class="description" style="text-align: center;"> {{Auth::user()->name}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    function openCampain() {
        window.open("<?php echo $url ?>", "_blank");
    }
</script>
@endsection