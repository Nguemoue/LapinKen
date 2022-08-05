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
                            <h4 class="card-title mx-1"><span class="badge bg-dark">#{{ $loop->index +1 }}</span></h4>
                            <h4>{{$formation->intitule}}</h4>
                            <h6>{{$formation->prix}} Fcfa</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-12"><img class="img-thumbnail card-img-top img-fluid" src="{{asset('storage/'.$formation->photo)}}" alt="phot 1"></div>
                            <div class="card-text">
                                <h5 class="text-muted my-1">Details</h5>
                            <span class="badge p-2 bg-dark">publie le : {{$formation->created_at->IsoFormat("LL")}}</span>

                                <ul class="list-group my-1">
                                    <li class="list-group-item">Modalite: <br> {{$formation->modalite}} </li>
                                    <li class="list-group-item">Description : <br> {{$formation->description}} </li>
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
