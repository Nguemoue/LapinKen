@extends('admin.template')

@section('main')
    <h2 class="text-center">Dashboard</h2>
    <div class="container">
        <hr>
        <div class="row mt-2">
            <div class="col">
                <div class="card">
                    <div class="card-header  bg-light">
                        <h4 class="card-title">Mes Informations</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Nom : {{ auth()->user()->name }}
                            <br>
                            Email : {{ auth()->user()->email }}
                            <br>
                            Comptes creer le : {{auth()->user()->created_at->IsoFormat('LL')}}
                            <br>
                            Type de compte : <span class="badge bg-dark p-2">{{auth()->user()->admin?'Administrateur':'utilisateur'}}</span>
                            <br>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header  bg-light">
                        <h5 class="card-title">Modifier Mes Informations</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.password.update') }}" method="POST">
                            <div class="mb-2">
                                <label for="Nom" class="form-label">Nouveau Nom</label>
                                <input type="text" class="form-control" placeholder="nouveau nom">
                            </div>
                            <div>
                                <label for="tel" class="form-label">Nouveau Numero de Telephone</label>
                                <input type="text" class="form-control" placeholder="nouveau Numero de Telephone">
                            </div>
                            <buttton class="btn btn-primary mt-3" type="submit"> <span class="fa fa-edit"></span> Modifier </buttton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Photo de Profil (actuelle)</div>
                    <img class="card-img img-fluid"  src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Photo de Profil">
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Modifier Mon Profil</div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update') }}" method="post">
                            @csrf
                            <div class="my-2">
                                <label for="profile" class="form-label">Choisir la nouvelle photo de profil</label>
                                <input type="file" class="form-control-file border p-1">
                            </div>
                            <button class="btn btn-success" type="submit"> <span class="fa fa-send"></span> Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
