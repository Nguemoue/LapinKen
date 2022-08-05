@extends('template')


@section('main')
    <div class="row">
        <div class="col-3">
            <ul class="list-group py-2 px-3">
                <span>Categorie ({{$cur_cat??'toutes'}})</span>
                <li class="list-group-item"><a href="?">Toutes</a></li>
                @foreach ($categories as $item)
                <li class="list-group-item"><a href="?categorie={{$item}}">{{$item}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-9 mt-2">
            <div class="row">
                @forelse ($cailles as $caille)
                    <div class="mx-2 shadow col-lg-4 col-md-6 border p-4">
                        <span class="badge bg-warning">{{$caille->categorie}}</span>
                        <div class="single_service">
                            <div class="py-2 text-center">
                                <h5>{{ $caille->race }}</h5>
                            </div>
                            <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                                <div class="service_icon">
                                    <img class="img card-img" src="{{ asset('storage/' . $caille->photo1) }}" alt="">
                                </div>
                            </div>
                            <div class="service_content text-center">
                                <h3>{{ $caille->race }} <span class="badge bg-danger">{{ $caille->prix }}
                                        FCFA</span></h3>
                                <p>
                                    @php
                                        $age = now()->diff($caille->date_naissance);
                                        $ans = $age->y . ' Ans';
                                        $mois = $age->m . ' Mois';
                                        $d = $age->d . ' Jours';
                                    @endphp
                                    Age : {{ $age->y ? $ans : '' }} {{ $age->m ? $mois : '' }} {{ $age->d ? $d : '' }}
                                </p>
                                <a href="#" class="btn btn-secondary"> <span class="fa fa-cart-plus"></span> Commander
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h3 class="text-center">Aucun cailles Pour Cette Categories</h3>
                @endforelse
            </div>
        </div>
    </div>
@endsection
