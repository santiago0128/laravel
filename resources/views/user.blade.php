@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="container">
            <div>
                <h2>Administracion Usuarios</h2>
            </div>
            <div style="padding-bottom: 20px;">
                <button type="button" class="btn btn-primary">Agregar Usuario</button>
            </div>
            <div class="background_section">
                <table class="table container">
                    <thead>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Campañas</th>
                        <th>Ultimo Inicio</th>
                        <th>Estado</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->campanas}}</td>
                            <td>{{$user->email_verified_at}}</td>
                            @if ($user->activo == 1)
                            <td style="color: #28a745;">Conectado</td>
                            @else
                            <td style="color: #dc3545;">Desconectado</td>
                            @endif
                            <td><a href="{{ url('/user').'/'.$user->id }}" class="btn btn-primary">Ver</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$users->links('pagination::bootstrap-5')}}

            </div>
        </div>
    </div>
</div>
@endsection