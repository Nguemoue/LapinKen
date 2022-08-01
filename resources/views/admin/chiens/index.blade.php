@extends('admin.template')

@section('main')
    <h1 class="text-center shadow mx-4 p-2 bg-gradient my-3 text-uppercase">Gestions des chiens</h1>
    <div class="container">
        <div class="text-right mb-4">
            <a href="{{route('admin.chiens.create')}}" class="btn btn-secondary"><span class="fa fa-plus mx-2"> Enregistrez un nouveau </span></a>
        </div>
        <div class="row">
            @forelse ($chiens as $chien)
                <div class="col-6 my-2">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title">chien N <span class="badge bg-dark">{{ $loop->index +1 }}</span></h5>
                            <span>Restant : <span class="badge bg-dark">{{$chien->quantite}}</span> </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6"><img class="img-thumbnail img-fluid" src="{{asset('storage/'.$chien->photo1)}}" alt="phot 1"></div>
                                <div class="col-6"><img class="img-fluid img-thumbnail " src="{{asset('storage/'.$chien->photo2)}}" alt="photo 2"></div>
                            </div>
                            <div class="card-text">
            <h5 class="text-muted my-1">Details</h5>

                                <ul class="list-group">
                                    <li class="list-group-item">Race : {{$chien->race }}</li>
                                    <li class="list-group-item">Fake Prix : {{ $chien->fake_prix }} FCFA</li>
                                    <li class="list-group-item">Prix Normal : {{ $chien->prix }} FCFA</li>
                                    <li class="list-group-item">Categorie : {{$chien->categorie }}</li>
                                    @php
                                        $age = now()->diff($chien->date_naissance);
                                    @endphp
                                    <li class="list-group-item">Age : {{$age->y?$age->y.' ans':'' }} {{$age->m?$age->m." Mois":""}} {{ $age->d }} jours</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-space-between">
                            <a href="{{route('admin.chiens.edit',['chien'=>$chien->id])}}" class="btn btn-primary"><span class="fa fa-edit"></span> Edit</a>
                            &nbsp;
                            <form action="{{route('admin.chiens.destroy',['chien'=>$chien->id])}}"  ><button type="submit" class="btn btn-danger"><span class="fa fa-close"></span> </button></form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center card">
                    <h2>Aucun chien Disponible</h2>
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
    