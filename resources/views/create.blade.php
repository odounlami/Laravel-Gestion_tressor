@extends('welcome')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card card-body" style="margin-top: 20px">
            <form action="{{ route('tresor.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" required>
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <label for="annee">Année</label>
                    <input type="text" name="annee" id="annee" class="form-control" required>
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <label for="categorie_id">Catégorie <span class="blue">*</span></label>
                    <select name="categorie_id" id="categorie_id" class="form-control" required>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->idCategorie }}">{{ $categorie->nomCategorie }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <label for="artiste_id">Artiste (optionnel)</label>
                    <select name="artiste_id" id="artiste_id" class="form-control">
                        <option value="">Aucun artiste</option>
                        @foreach ($artistes as $artiste)
                            <option value="{{ $artiste->idArtiste }}">{{ $artiste->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <button type="submit" class="btn btn-info">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
