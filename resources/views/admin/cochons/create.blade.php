@extends('admin.template')

@section('main')
<h1 class="text-center shadow mx-4 p-2 bg-gradient my-3 text-uppercase" style="text-shadow: -1px -1px 1px black">Ajout D'un Nouveau cochon</h1>
<hr>
    <fieldset class="container">
        <div class="row">
            <div class="col col-7">
                <div class="card shadow">
                    <div class="card-header">
                        <legend class="text-center">Formulaire D'enregistrement.</legend>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.cochons.store') }}" method="POST" class="row" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3 col-6">
                                <label for="prix">Prix</label>
                                <input type="number" name="prix" class="form-control">
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="prix">Faux prix </label>
                                <input name="fake_prix" type="number" class="form-control">
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="Quantite">Quantite</label>
                                <input type="number" name="quantite" class="form-control">
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="race">Sexe</label>
                                <select name="sexe" id="sexe" class="form-select">
                                    <option value="Masculin" selected>Masculin</option>
                                    <option value="Feminin">Feminin</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="race">Date de naissance</label>
                                <input type="date" class="form-control" name="date_naissance">
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="race">Poids</label>
                                <input type="text" class="form-control" name="poids">
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="race">race</label>
                                <input type="text" class="form-control" name="race">
                            </div>
                        
                            
                            <div class="form-group mb-3 col-6">
                                <label for="categorie">categorie</label>
                                <select name="categorie" id="categorie" class="form-select form-control">
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie }}">{{ $categorie }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="race">photo 1</label>
                                <input type="file" class="form-control" name="photo1" id="file1">
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="race">photo 2</label>
                                <input type="file" class="form-control" id="file2" name="photo2">
                            </div>
                            <div class="container">
                                <hr>
                                <button type="reset" class="col-3 btn btn-danger">reset</button>
                            <button type="submit" class="col-3 mx-2 btn btn-success"> <span class="fa fa-plus"></span> Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-5 border py-2">
                <img src="#" class="img img-fluid img-thumbnail my-2 d-block" alt="Photo 1 du cochon" id="photo1">
                <img src="#" class="img img-fluid img-thumbnail my-2 d-block" alt="Photo 2 du cochon" id="photo2">

            </div>
        </div>
    </fieldset>
    @endsection

    @push("scripts")
        <script>
            let file1 = document.getElementById('file1')
            let file2 = document.getElementById('file2')
            let photo1 = document.getElementById("photo1")
            let photo2 = document.getElementById("photo2")
            const fr1 = new FileReader()
            const fr2 = new FileReader()
            
            fr1.onload = function(fichier){
                console.log(fichier)
                photo1.src = fichier.target.result
            }

            file1.addEventListener("change",function(event){
                let files = event.target.files
                if(files[0] && files.length){
                    fr1.readAsDataURL(files[0])
                }
            })

            fr2.onload = function(fichier){
                console.log(fichier)
                photo2.src = fichier.target.result
            }

            file2.addEventListener("change",function(event){
                let files = event.target.files
                if(files[0] && files.length){
                    fr2.readAsDataURL(files[0])
                }
            })

        </script>
    @endpush