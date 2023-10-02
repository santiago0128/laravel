@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="container">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nombre</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{$user->name}}" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirmar Contraseña</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="" placeholder="Password">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
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
                                <h5 class="title" style="text-align: center;">{{$user->email}}</h5>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <p class="description" style="text-align: center;"> {{$user->name}} </p>
                            </div>


                            <?php for ($i = 0; $i < count($campanas); $i++) {
                                $campanas_user = explode('|', $user->campanas);
                                $isChecked = in_array($campanas[$i]['id'], $campanas_user);
                            ?>
                                <div class="form-check">
                                    <input type="checkbox" onchange="manejocampana(<?= $campanas[$i]['id'] ?>)" class="form-check-input" id="<?php echo $campanas[$i]['id'] ?>" <?php if ($isChecked) echo 'checked'; ?>>
                                    <label class="form-check-label" for="<?php echo $campanas[$i]['id'] ?>"><?= $campanas[$i]['nombre_campana'] ?></label>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    async function manejocampana(idcampana) {
        usuario_id = <?= $user->id ?>;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        data = {

            'idcampana': idcampana,
            'idusuario': usuario_id
        }

       const response = await fetch('/campanastatus',{
            method: 'POST', 
               headers: {
                   'Content-Type': 'application/json', 
                   'X-CSRF-TOKEN': token,
               },
               body: JSON.stringify(data), 
        })
        const movies = await response.json();
        console.log(movies);
           
    }
</script>
@endsection