@extends('admin.template')

@section('main')
<h3 class="text-center shadow mx-4 p-2 bg-gradient my-3 text-uppercase" style="text-shadow: -1px -1px 1px black">
        Pannel D'administration   {{ auth()->user()->photo }}
    </h3>
    <div class="container">
        <hr>
        <div class="row mt-2">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header  bg-light">
                        <h4 class="card-title">Mes Informations</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Nom : {{ auth()->user()->name }}
                            <br>
                            Email : {{ auth()->user()->email }}
                            <br>
                            Comptes creer le : {{ auth()->user()->created_at->IsoFormat('LL') }}
                            <br>
                            Type de compte : <span
                                class="badge bg-dark p-2">{{ auth()->user()->admin ? 'Administrateur' : 'utilisateur' }}</span>
                            <br>

                        </p>
                    </div>
                    <div class="card-footer">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger"> <span class="fa fa-lock"></span> Se deconnecter </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-header  bg-light">
                        <h5 class="card-title">Modifier Mes Informations</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.password.update') }}" method="POST">
                            <div class="mb-2">
                                <label for="Nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" value="{{auth()->user()->name}}" placeholder="nouveau nom">
                            </div>
                            <div>
                                <label for="tel" class="form-label">Numero de Telephone</label>
                                <input type="text" class="form-control" value="{{auth()->user()->tel}}" placeholder="nouveau Numero de Telephone">
                            </div>
                            <buttton class="btn btn-primary mt-3" type="submit"> <span class="fa fa-edit"></span> Modifier
                            </buttton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">Photo de Profil (actuelle)</div>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage/' . auth()->user()->photo) }}"
                        alt="Photo de Profil" id="profil">
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Modifier Mon Profil</div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="my-2">
                                <label for="profile" class="form-label">Votre Nouvelle Photo de Profil</label>
                                <input type="file" id="file" name="profil" class="form-control border p-1">
                            </div>
                            <button class="btn btn-success" type="submit"> <span class="fa fa-send"></span>
                                Mettre a jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var file = document.querySelector("#file")
        let fr = new FileReader()
        let profil  = document.querySelector("#profil")
        fr.onload = function(data){
            profil.src = data.target.result
        }
        file.addEventListener("change", function(event) {
            console.log('change')
            let files = event.target.files
            fr.readAsDataURL(files[0])
        })
    </script>
@endpush
