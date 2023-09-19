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
                <table id="miTabla" class="table container">
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
                            <td><button class="btn btn-success" disabled>Activo</button></td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
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
                        <img src="{{ asset('images/' . $campain->foto_campana.'') }}" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">{{$campain->nombre_campana}}</p>
                            <a href="{{$campain->ruta_campana}}" class="btn btn-primary">Entrar</a>
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
                    @if (Auth::user()->rol === 1)
                    <hr>
                    <div>
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection