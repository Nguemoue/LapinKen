@extends('admin.template')

@section('main')
    <h1 class="text-center shadow mx-4 p-2 bg-gradient my-3 text-uppercase" style="text-shadow: -1px -1px 1px black">Ajout
        D'un Nouveau formation
    </h1>
    <hr>
    <fieldset class="container">
        <div class="row">
            <div class="col col-7">
                <div class="card shadow">
                    <div class="card-header">
                        <legend class="text-center">Formulaire D'enregistrement.</legend>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.formations.store') }}" method="POST" class="row"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3 col-6">
                                <label for="prix">Prix</label>
                                <input type="number" placeholder="le prix de ladite formation" name="prix"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="inititule">Intitule</label>
                                <input type="text" placeholder="intitule de la formation" id="intitule" name="intitule" class="form-control">
                            </div>

                            <div class="form-group mb-3 col-6">
                                <label for="race">Duree (En jours)</label>
                                <input type="text" class="form-control" name="duree" placeholder="duree en jours">
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="categorie">Cibles</label>
                                <select name="categorie" id="cible" class="form-select form-control" >
                                    @foreach ($cibles as $cible)
                                        <option value="{{ $cible }}">{{ $cible }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="modalite">Modalite</label>
                                <textarea name="modalite" id="modalite" class="form-control" placeholder="les modalites sur la formations"></textarea>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="modalite">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="entrez une brieve description de cette formation"></textarea>
                            </div>


                            <div class="form-group mb-3 col-12">
                                <label for="race">Poster de La Formation</label>
                                <input type="file" class="form-control" name="photo" id="file1">
                            </div>
                            <div class="container">
                                <hr>
                                <button type="reset" class="col-3 btn btn-danger"> <span></span> reset</button>
                                <button type="submit" class="col-3 mx-2 btn btn-primary"> <span class="fa fa-plus"></span>
                                    Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-5 border py-2">
                <img src="#" class="img img-fluid img-thumbnail my-2 d-block" alt="Photo  de formation"
                    id="photo1">
            </div>
        </div>
    </fieldset>
    @endsection
    
@push('scripts')
@includeIf("_partials.validation-errors")
<script>
        let file1 = document.getElementById('file1')
        let photo1 = document.getElementById("photo1")
        const fr1 = new FileReader()

        fr1.onload = function(fichier) {
            console.log(fichier)
            photo1.src = fichier.target.result
        }

        file1.addEventListener("change", function(event) {
            let files = event.target.files
            if (files[0] && files.length) {
                fr1.readAsDataURL(files[0])
            }
        })
    </script>
@endpush
