@extends('template')


@section('main')
<div class=" d-flex justify-content-end my-2 px-5 align-content-end">
    <a href="{{route('contact-us')}}" class="boxed-btn3">Nous Contacter</a>
</div>
    <h4 class="border p-3 shadow mb-4 text-center mx-4">Nos Services / Formations</h4>
    <div class="container-fluid">
        <div class="row">
            @forelse ($formations as $formation)
                <div class="shadow my-2 mx-auto col-lg-5 col-md-6 border p-4">
                    <div class="d-flex justify-content-between">
                        <span class="badge bg-warning">Formations</span>
                        <h5>{{ $formation->intitule }}</h5>
                        <span>Duree: {{ $formation->duree }} Jours</span>
                    </div>
                    <div class="single_service">
                        <div class="py-2 text-center">
                            <h5>Cible : {{ $formation->cible }}</h5>
                        </div>
                        <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                            <div class="service_icon">
                                <img class="img card-img" src="{{ asset('storage/' . $formation->photo) }}" alt="">
                            </div>
                        </div>
                        <div class="service_content text-center">
                            <h3> Prix : <span class="badge bg-danger">{{ $formation->prix }}
                                    FCFA</span></h3>
                            <p>
                                {{ $formation->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">Aucun formations Pour Cette Categories</h3>
            @endforelse
        </div>
    </div>
@endsection
