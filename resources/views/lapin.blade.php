@extends('template')

@section('main')
    <h2 class="text-center">Nos Lapins</h2>
    <div class="my-2 p-2">
        <div class="row">
            <div class="col-2">
                <h4 class="text-underline text-center text-muted"> les Categories ({{ $current_categorie }}) </h4>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('lapin') }}" class="w-100">toutes</a></li>
                    @foreach ($categories as $item)
                        <li class="list-group-item"><a href="?categorie={{ $item }}"
                                class="w-100">{{ $item }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-10">
                <div class="row">
                    @forelse ($lapins as $lapin)
                        <div class="col col-10 col-lg-6 col-md-6 my-2">
                            <div class="card shadow">
                                <div class="card-header d-flex justify-content-between">
                                    <h5 class="card-title"> <span class="badge bg-secondary"> #
                                            {{ $loop->index + 1 }}</span> </h5>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                                        data-target="#lapinModel{{ $lapin->id }}">
                                        <span class="text-sm"></span>
                                        <span class="fa fa-eye"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="lapinModel{{ $lapin->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="#lapinModel{{ $lapin->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="lapinModel{{ $lapin->id }}">Details
                                                        sur le Lapin Numero {{ $loop->index + 1 }}</h5>
                                                    <button type="button" class="btn btn-outline-danger close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"> <span
                                                                class="fa fa-close"></span></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <img src="{{ asset('storage/' . $lapin->photo1) }}" alt="">
                                                        <img src="{{ asset('storage/' . $lapin->photo2) }}" alt="">

                                                    </div>
                                                    <hr>
                                                    <p>
                                                        <span class="badge bg-secondary w-100 p-2 my-2">
                                                            Prix : {{ $lapin->prix }} FCFA
                                                        </span>
                                                    </p>
                                                    <div class="jumbotron-fluid my-2">
                                                        <span class="badge bg-secondary my-2 p-2 d-block">Categorie :
                                                            {{ $lapin->categorie }}</span>
                                                        <p class="badge bg-secondary my-2 p-2  d-block text-light  w-100">
                                                            Race : {{ $lapin->nom }} {{ $lapin->race }}
                                                        </p>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">fermer</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $lapin->photo1) }}" class="card-img "
                                        alt="Image du lapin">
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <div>

                                        <s class="badge bg-danger">{{ $lapin->fake_prix * 2 }} FCFA</s>
                                        <span class="badge bg-secondary text-light">Prix : {{ $lapin->prix }} FCFA</span>
                                    </div>
                                    <a class="btn btn-outline-secondary" href="{{ $lapin->id }}"> <span
                                            class="fa fa-cart-plus"></span> &nbsp; Commander</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card col mt-4 container text-center p-4 mx-4">
                            <h3>Aucun Lapin {{ $current_categorie }} Disponibles</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script></script>
@endpush

@push('styles')
    <style></style>
@endpush
