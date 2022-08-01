@extends('admin.template')

@section('main')
    <h1 class="text-center shadow mx-4 p-2 bg-gradient my-3 text-uppercase">Gestions des formations</h1>
    <div class="container">
        <div class="text-right mb-4">
            <a href="{{route('admin.formations.create')}}" class="btn btn-secondary"><span class="fa fa-plus mx-2"> Enregistrez un nouveau </span></a>
        </div>
        <div class="row">
            @forelse ($formations as $formation)
                <div class="col-6 my-2">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title">formation N <span class="badge bg-dark">{{ $loop->index +1 }}</span></h5>
                            <span>Restant : <span class="badge bg-dark">{{$formation->quantite}}</span> </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6"><img class="img-thumbnail img-fluid" src="{{asset('storage/'.$formation->photo1)}}" alt="phot 1"></div>
                                <div class="col-6"><img class="img-fluid img-thumbnail " src="{{asset('storage/'.$formation->photo2)}}" alt="photo 2"></div>
                            </div>
                            <div class="card-text">
            <h5 class="text-muted my-1">Details</h5>

                                <ul class="list-group">
                                    <li class="list-group-item">Race : {{$formation->race }}</li>
                                    <li class="list-group-item">Fake Prix : {{ $formation->fake_prix }} FCFA</li>
                                    <li class="list-group-item">Prix Normal : {{ $formation->prix }} FCFA</li>
                                    <li class="list-group-item">Categorie : {{$formation->categorie }}</li>
                                    @php
                                        $age = now()->diff($formation->date_naissance);
                                    @endphp
                                    <li class="list-group-item">Age : {{$age->y?$age->y.' ans':'' }} {{$age->m?$age->m." Mois":""}} {{ $age->d }} jours</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-space-between">
                            <a href="{{route('admin.formations.edit',['formation'=>$formation->id])}}" class="btn btn-primary"><span class="fa fa-edit"></span> Edit</a>
                            &nbsp;
                            <form action="{{route('admin.formations.destroy',['formation'=>$formation->id])}}"  ><button type="submit" class="btn btn-danger"><span class="fa fa-close"></span> </button></form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center card">
                    <h2>Aucun formation Disponible</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection
@push("styles")
    <style>
        body{
            font-family: "Open Sans";
        }
    </style>
@endpush
    