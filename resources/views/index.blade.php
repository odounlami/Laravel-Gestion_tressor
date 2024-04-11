@extends('welcome')

@section('content')

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">OEUVRE</th>
            <th scope="col">AUTEUR</th>
            <th scope="col">ANNEE</th>
            <th scope="col">ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($oeuvres as $oeuvre)
            <tr>
                <td>{{ $oeuvre->nom }}</td>
                <td>
                    @if ($oeuvre->artiste)
                        {{ $oeuvre->artiste->nom }}
                    @else
                        Aucun artiste associé
                    @endif
                </td>
                <td>
                    @if ($oeuvre->annee)
                        {{ $oeuvre->annee }}
                    @else
                        Non spécifiée
                    @endif
                </td>
                <td>
                    <!-- Formulaire pour la modification -->
                    <form action="{{ route('tresor.edit', $oeuvre->idOeuvre) }}" method="get" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline-info">Modifier</button>
                    </form>

                    <!-- Formulaire pour la suppression avec confirmation -->
                    <form action="{{ route('tresor.supprimer', $oeuvre->idOeuvre) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette œuvre ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
